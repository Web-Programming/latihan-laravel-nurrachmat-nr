@extends('layouts.master')
@section('content')
    <h1>Program Studi</h1>

    <table class="table table-bordered table-stiped">
        <tbody>
             <tr>
                <td>Kode Prodi</td>
                <td>{{ $prodi->id }}</td>
            </tr>
            <tr>
                <td>Nama Prodi</td>
                <td>{{ $prodi->nama }}</td>
            </tr>
        </tbody>
    </table>
@endsection
