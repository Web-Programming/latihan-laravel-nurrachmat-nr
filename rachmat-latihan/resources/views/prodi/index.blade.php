@extends('layouts.master')
@section('content')
    <h1>Program Studi</h1>
     @if (session()->has('info'))
        <div class="alert alert-success">
        {{ session()->get('info') }}
        </div>
    @endif
    <a href="{{route('prodi.create')}}" class="btn btn-success">
        Tambah Prodi
    </a>
    <table class="table table-stiped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                {{-- <th>Foto</th> --}}
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prodis as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    {{-- <td>
                        @if($item->foto != '')
                            <img src="{{ asset('storage/'.$item->foto) }}" width="100"/>
                        @endif
                    </td> --}}
                    <td>
                        <form action="{{ route('prodi.destroy', ["prodi" => $item->id]) }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <a href="{{ url('/prodi/'.$item->id) }}" class="btn btn-warning">
                                Detail
                            </a>
                            <a href="{{ route('prodi.edit', [$item->id]) }}" class="btn btn-info">
                                Edit
                            </a>
                            <button class="btn btn-danger" type="submit">
                            Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
