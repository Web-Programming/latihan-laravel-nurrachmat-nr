<?php

namespace App\Http\Controllers;

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
}
