@extends('layouts.main')

@section('title', 'AuraTrip')
    
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque por uma Viagem</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
@auth
<div id="travels-container" class="col-md-12">
    @if ($search)
        <h2>Buscando por: {{$search}}</h2>
    @else
        <h2>Todas as Viagens</h2>
    @endif
    
    
    <p class="subtitle">Veja as viagens planejadas!</p>
    <div id="cards-container" class="row">
        @foreach($travels as $travel)
        <div class="card col-md-3">
            <img src="/img/travels/{{$travel->image}}" alt="{{ $travel->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $travel->title }}</h5>
                <p class="card-place">{{$travel->city}}</p>
                <p class="card-date">Início: {{date('d/m/Y', strtotime($travel->startDate))}}</p>
                <p class="card-date">Fim: {{date('d/m/Y', strtotime($travel->endDate))}}</p>
                <a href="/events/{{$travel->id}}" class="btn btn-primary">Viajar</a>
            </div>
        </div>
        @endforeach
        @if (count($travels) == 0 && $search)
            <p>Não foi possível encontrar nenhuma viagem planejada com: {{$search}}! <a href="/">Ver todas</a></p>
        @elseif(count($travels) == 0)
            <p>Não há viagens planejadas até o momento.</p>
        @endif
    </div>
</div>
@endauth
@endsection