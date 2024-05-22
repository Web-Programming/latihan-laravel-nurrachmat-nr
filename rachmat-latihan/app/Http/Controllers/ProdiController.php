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
        $validateData = $request->validate(
            ['nama' => 'required|min:5|max:20']
        );

        //dump($validatData);
        //echo $validatData['nama'];

        $prodi = new Prodi();
        $prodi->nama = $validateData['nama'];
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


}
