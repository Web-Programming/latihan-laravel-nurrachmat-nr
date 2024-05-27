@extends('layouts.master')
@section('content')
    <h1>Tambah Program Studi</h1>
    @if(session()->has('info'))
        <div class="alert alert-success">
        {{ session()->get('info') }}
        </div>
    @endif
    <form method="POST" action="{{ url('prodi/store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Prodi</label>
            <input name="nama" class="form-control" type="text" required minlength="5" value="{{old('nama')}}" maxlength="20">
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">Foto/logo</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @error('foto')
                <div class="text-danger"> {{ $message }} </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
