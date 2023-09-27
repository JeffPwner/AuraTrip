@extends('layouts.main')

@section('title', 'Viagens')

@section('content')

    <h1>tela de Viagens</h1>

    @if ($busca != '')
        <p>o usuário está buscando por: {{$busca}}</p>
    @endif

@endsection