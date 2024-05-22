@extends('layouts.master')
@section('content')
    <h1>Program Studi</h1>
    <a href="{{route('prodi.create')}}" class="btn btn-success">
        Tambah Prodi
    </a>
    <table class="table table-stiped">
        <thead>
            <tr>
                <th>No</th> <th>Nama Prodi</th> <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prodis as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        <a href="{{ route("prodi.show", $item->id)}}"
                            class="btn btn-warning">
                         Detail
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
