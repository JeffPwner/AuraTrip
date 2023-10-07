@extends('layouts.main')

@section('title', 'AuraTrip')
    
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque por uma Viagem</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="travels-container" class="col-md-12">
    <h2>Todas as Viagens</h2>
    <p class="subtitle">Veja as viagens planejadas!</p>
    <div id="cards-container" class="row">
        @foreach($travels as $travel)
        <div class="card col-md-3">
            <img src="/img/auratrip.jpg" alt="{{ $travel->title }}">
            <div class="card-body">
                <p class="card-date">10/09/2020</p>
                <h5 class="card-title">{{ $travel->title }}</h5>
                <p class="card-place">X Local</p>
                <a href="#" class="btn btn-primary">Viajar</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
    
@endsection