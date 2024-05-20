<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use DB;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
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
