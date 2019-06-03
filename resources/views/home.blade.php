@extends('layouts.app')

@section('content')

@if(Auth::user()->tipoUsuario == 'CLIENTE')
    @include('usuarioCliente.cliente')
@else
    @include('userAdmin.admin')
@endif

@endsection
