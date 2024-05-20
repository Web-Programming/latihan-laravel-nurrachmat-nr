@extends('layouts.master')
@section('content')
    <h1>Program Studi</h1>
    <table class="table table-stiped">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Prodi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allmahasiswaprodi as $item)
                <tr>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->nama_mahasiswa }}</td>
                    <td>{{ $item->nama_prodi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
