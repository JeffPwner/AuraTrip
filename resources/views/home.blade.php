@extends('layouts.template')

@section('title', 'AuraTrip')

@section('exportcss')
    <link rel="stylesheet" href="/css/styles.css">
@endsection


    
@section('header')

    <header>
        <div class="container_header">
            <a class="logo_header" href="index.html">
                <img class="logo_img" src="https://res.cloudinary.com/dlsuopwkn/image/upload/v1698457738/samples/animals/auratripicon_white.png" width="30" height="30" alt="logo" />
            </a>
            <ul class="buttons_header" id="home" style="margin-bottom: 0;">
                <li><a href="index.html">Viagens</a></li>
                <li><a href="postar.html">Criar Viagem</a></li>
                <li><a href="#">Cadastrar</a></li>
                <li><a href="contato.html">Entrar</a></li>
            </ul>
            <!-- <div class="menucell"><ion-icon name="menu-outline"></ion-icon></div> -->
        </div>
    </header>

@endsection

@section('banner')
    <section id="main" class="style_header">
        <h1 class="title_tromso" style="padding-top: 80px;">AuraTrip</h1>

        <div id="search-container" class="col-md-12">
            <form action="/" method="GET" class="formdobotaopesquisa">
                <input type="text" id="search" name="search" class="form-control" placeholder="Busque por uma Viagem - Procurar...">
            </form>
        </div>
    </section>
@endsection

@section('content')

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