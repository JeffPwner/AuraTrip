@extends('layouts.template')

@section('title', 'Viagens')

@section('headerpage')
    <header class="style_header">
        <div class="container_header">
            <a href="/">
                <img class="logo_img" src="https://res.cloudinary.com/dlsuopwkn/image/upload/v1697427878/samples/animals/auratripicon.png" width="30" height="30" alt="logo" />
            </a>
            <ul class="buttons" id="home" style="margin-bottom: 0;">
                <li><a style="color: black" href="/dashboard">Viagens</a></li>
                <li><a style="color: black" href="/events/create">Criar Viagem</a></li>
                @guest
                  <li><a style="color: black" href="/register">Cadastrar</a></li>
                  <li><a style="color: black" href="/login">Entrar</a></li>
                @endguest
@endsection

@section('content')

<div id="search-container" class="style_section">
    <div class="feedback_title">
        <h1>Busque por uma viagem</h1>
    </div>
    <div id="search-container" class="col-md-12">
        <form action="/dashboard" method="GET" class="formdobotaopesquisa">
            <input type="text" id="search" name="search" class="form-control" placeholder="Busque por uma Viagem - Procurar...">
        </form>
    </div>
</div>

<div id="travels-container" class="style_section">
    @if ($search)
        <h2 style="text-align: center">Buscando por: {{$search}}</h2>
    @else
        <h2 style="text-align: center">Todas as Viagens</h2>
    @endif

<div id="travels-container" class="style_section">
    
    <div id="cards-container" class="row" style="margin: 30px; display: flex; justify-content: space-evenly;">
        @foreach($travels as $travel)
        <div class="card_trip">
            <img class="image_card" src="/img/travels/{{$travel->image}}" alt="{{ $travel->title }}">
            <div class="card_body">
                <h5 class="card_title">{{ $travel->title }}</h5>
                <p class="card_place">{{$travel->city}}</p>
                <p class="card_date">Início: {{date('d/m/Y', strtotime($travel->startDate))}}</p>
                <p class="card_date">Fim: {{date('d/m/Y', strtotime($travel->endDate))}}</p>
                <div class="buttons_card">
                    <a href="/events/{{$travel->id}}" class="travel_card_button">Viajar</a>
                    <a href="/events/edit/{{$travel->id}}" class="edit_card_button">Editar</a>
                    <form action="/events/{{$travel->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete_card_button">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @if (count($travels) == 0 && $search)
            <p>Não foi possível encontrar nenhuma viagem planejada com: {{$search}}! <a href="/dashboard">Ver todas</a></p>
        @elseif(count($travels) == 0)
            <p>Não há viagens planejadas até o momento. <a href="/events/create">Clique aqui para criar a sua!</a></p>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Verifique se estamos na página específica onde você não deseja mostrar o formulário
        if (window.location.pathname === '/layouts/template') {
            // Encontre o formulário pelo ID
            var searchForm = document.getElementById('search-container');

            // Verifique se o formulário existe antes de tentar ocultá-lo
            if (searchForm) {
                // Oculte o formulário
                searchForm.style.display = 'none';
            }
        }
    });
</script>


@endsection