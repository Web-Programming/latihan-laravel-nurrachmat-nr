<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function home(){
        return view("prodi.index");
    }

    public function detail($nama = null){
        echo "Program Studi ". $nama;
    }
}
