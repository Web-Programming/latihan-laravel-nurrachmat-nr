{{-- @include('layouts.header') --}}
@extends('layouts.master')


@section('content')
    <h1>Data Mahasiwa</h1>
    <table class="table">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        @foreach ($listmahasiswa as $item)
            <tr>
                <td>{{$item->npm}}</td>
                <td>{{$item->nama_mahasiswa}}</td>
                <td>{{$item->alamat}}</td>
            </tr>
        @endforeach
    </table>
@endsection

{{--@include('layouts.footer') --}}
