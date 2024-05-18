{{-- @include('layouts.header') --}}
@extends('layouts.master')

{{-- @section('title', 'Universitas MDP') --}}
@section('content')
    <h1>Fakultas</h1>
    <li>{{ $ilkom }}</li>
    <li>{{ $feb }}</li>
@endsection

{{--@include('layouts.footer') --}}
