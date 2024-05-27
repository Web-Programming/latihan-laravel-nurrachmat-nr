<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use DB;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(){
        $prodi = Prodi::all();
        return view ('prodi.index', ['prodis' => $prodi]);
    }

    public function show($id){
        $prodi = Prodi::find($id);
        return view ('prodi.show', ['prodi' => $prodi]);
    }

    public function create(){
        return view("prodi.create");
    }

    public function store(Request $request){
        //dump($request);
        //echo $request->nama;
        /*$validateData = $request->validate(
            [
                'nama' => 'required|min:5|max:20',
                'foto' => 'required|file|mimes:png|extensions:png|max:5000'
            ],
        );*/
        $this->validate($request,
            [
                'nama' => 'required|min:5|max:20',
                'foto' => 'required|file|mimes:png|max:5000'
            ],
            [
                'required' => 'Kolom :attribute harus diisi',
                'min' => 'Kolom :attribute harus diisi minimal :min karakter',
                'mimes' => 'File yang diperbolehkan hanya png'
            ]
        );

        //menyipkan namafile
        $ext = $request->foto->getClientOriginalExtension(); //jpg/png
        $nama_file = "foto-".time().".".$ext; //foto-121521425.png
        $path = $request->foto->storeAs('public', $nama_file);

        //dump($validatData);
        //echo $validatData['nama'];

        $prodi = new Prodi();
        //$prodi->nama = $validateData['nama'];
        $prodi->nama = $request->nama;
        $prodi->foto = $nama_file;
        $prodi->save();

        $request->session()->flash('info', "Data prodi $prodi->nama berhasil disimpan");
        return redirect()->route('prodi.create');
    }

    public function home(){
        return view("prodi.index");
    }

    public function detail($nama = null){
        echo "Program Studi ". $nama;
    }

    public function allJoinFacade(){
        $result  =  DB::select('select mahasiswas.*, prodis.nama as nama_prodi
            from prodis, mahasiswas
            where prodis.id = mahasiswas.prodi_id'
        );
        return view('prodi.index', ['allmahasiswaprodi' => $result]);
    }

    public function allJoinElq(){
        $prodis = Prodi::with("mahasiswas")->get();
        // foreach($prodis as $prodi){
        //     echo "<h3>{$prodi->nama}</h3>";
        //     echo "<hr/>Mahasiswa :  ";
        //     foreach($prodi->mahasiswas as $mhs){
        //         echo $mhs->nama_mahasiswa .", ";
        //     }
        //     echo "<hr/>";
        // }

        return $prodis;
    }


    public function edit(Prodi $prodi){
        return view("prodi.edit", ['prodi' => $prodi]);
    }

    public function update(Prodi $prodi, Request $request) {
        //dump($request);
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20'
        ]);

        Prodi::where("id", $prodi->id)->update($validateData);
        $request->session()->flash('info', "Data prodi $prodi->nama berhasil diupdate");
        return redirect()->route('prodi.index');
    }

    public function destroy(Prodi $prodi) {
        //Prodi::where("id", $prodi->id)->delete();
        $prodi->delete();
        return redirect()->route('prodi.index')
            ->with('info', "Data prodi berhasil dihapus");
    }


}
