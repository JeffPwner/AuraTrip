@extends('layouts.main')

@section('title', 'Viagem')

@section('content')

    <h1>Tela da Viagem - {{$id}}</h1>

    @if ($id != null)
        <p>Exibindo viagem id: {{$id}}</p>
    @endif

@endsection

