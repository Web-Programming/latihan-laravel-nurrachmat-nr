<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{

    public function insert(){
        $result = DB::insert("INSERT INTO mahasiswas (npm, nama_mahasiswa, tempat_lahir,tanggal_lahir, alamat,created_at) VALUES (?, ?, ?, ?, ?, ?)",
        ['20000001', 'NUr Rachmat', 'Jakarta', '2020-04-01', 'Jl.Rajawali', now()]
        );
        dump($result);
    }

    public function update2(){
        $result = DB::insert("UPDATE mahasiswas SET nama_mahasiswa = ?, updated_at = ? WHERE
        id = 1",
        ['Rachmat Nur', now()]
        );
        dump($result);
    }

    public function delete(){
        $result = DB::delete("DELETE FROM mahasiswas WHERE id = ?",[1]);
        dump($result);
    }

    public function select(){
        $result = DB::select("SELECT * FROM mahasiswas");

        $result = DB::select("SELECT * FROM mahasiswas WHERE npm = ?", ['2000000']);
        dump($result);
    }

    //QUERY BUILDER

    public function insertQb(){
        $result = DB::table('mahasiswas')->insert(
            [
                'npm' => '20000002',
                'nama_mahasiswa' => 'John Doe',
                'tanggal_lahir' => '2002-05-01',
                'tempat_lahir' => 'Palembang',
                'alamat' => 'Jl. Jend Sudirman',
                'created_at' => now()
            ]
        );
        dump($result);
    }

    public function updateQb(){
        $result = DB::table('mahasiswas')
        ->where("npm", '20000002')
        ->update(
            [
               'nama_mahasiswa' => 'John Doe',
               'alamat' => 'Jl. Jend Sudirman',
               'updated_at' => '2022-06-01'
            ]
        );
        dump($result);
    }

    public function deleteQb(){
        $result = DB::table('mahasiswas')
                ->where("npm", '20000001')
                ->delete();
        dump($result);
    }

    public function selectQb(){
        $result = DB::table('mahasiswas')
                //->where("npm", '20000002')
                ->get(); //menghasilkan list

        /*$result = DB::table('mahasiswas')
                ->where("npm", '20000001')
                ->first();*/ //menghasilkan 1 record (first record)
        dump($result);
    }



    //Eloquent ORM
    public function insertElq(){
        $mhs = new Mahasiswa();
        $mhs->npm = '20000003';
        $mhs->nama_mahasiswa = 'Jane Doe';
        $mhs->tanggal_lahir = '2002-02-02';
        $mhs->tempat_lahir = 'Padang';
        $mhs->alamat = 'Jl. Padang Selasa';
        $mhs->prodi_id = 1;
        $mhs->save(); //insert into .....

        dump($mhs);

    }

    public function updateElq(){
        //$mhs = Mahasiswa::find(5);
        $mhs = Mahasiswa::where('npm', '20000003')->first();
        $mhs->nama_mahasiswa = 'Jane Doe 2';
        $mhs->save(); //insert into .....

        dump($mhs);

    }

    public function deleteElq(){
        $mhs = Mahasiswa::find(5)->delete();
        //$mhs = Mahasiswa::where('npm', '20000003')->first()->delete();
        dump($mhs);
    }

    public function selectElq(){
        //$mhs = Mahasiswa::all(); // select * from mahasisswas
        //$mhs = Mahasiswa::select(['npm','nama_mahasiswa'])->get();
        //$mhs = Mahasiswa::where('npm', '20000003')->first();
        $mhs = Mahasiswa::find(5);
        dump($mhs);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mhs = Mahasiswa::all();
        return view("mahasiswa.index", ['listmahasiswa' =>$mhs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }


    public function allJoinElq(){
        $mahasiswa = Mahasiswa::get();

        return $mahasiswa;
    }
}
