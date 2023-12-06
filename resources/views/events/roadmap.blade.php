@extends('layouts.template')

@section('title', $travel->title)

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
                @auth
                    <li>
                      <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" 
                          class="nav-link"
                          style="color: black"
                          onclick="event.preventDefault();
                          this.closest('form').submit();">
                          Sair
                        </a>
                      </form>
                    </li>
                @endauth
@endsection

@section('content')


<p style="text-align: center"><a href="/events/{{$travel->id}}">Retornar para sua viagem</a></p>

{{-- API --}}
<div class="col-md-12" id="api-container" style="max-width:70%; margin:auto;">
    <h2 style="text-align: center">Pesquise por locais legais para visitar!</h2>
    <p style="text-align: center">Busque lugares novos nas redondesas!!</p>
    <div>
        <input type="text" id="searchInput" class="searchplace" placeholder="Digite o tipo de lugar que deseja procurar">
    
        <button onclick="searchPlaces(); toggleForm()" class="buscarplace">Buscar Locais</button>
    </div>

    <div id="resultsList" class="row" style="display: flex; justify-content: space-evenly;">
    
    </div>

    <form style="margin: 10px;" action="/events/{{$travel->id}}" method="POST" enctype="multipart/form-data" id="addPlaceForm">
        @csrf
    
        <!-- Container para campos dinâmicos do local -->
        <div id="placeDetails"></div>
    
        <input type="submit" class="travel_card_button" style="display: flex; justify-content: center;" value="Adicionar no Roteiro e Salvar">
    </form>

    
    {{-- <form action="/events/{{$travel->id}}" method="POST" enctype="multipart/form-data" id="addPlaceForm">
        @csrf
    
        <!-- Container para campos dinâmicos do local -->
        <div id="placeDetails"></div>
    
        <input type="submit" class="btn btn-primary" value="Salvar">
    </form> --}}
    
</div>

{{-- @if ($places != null && $placess != null)
    <h3>Roteiro de Viagem:</h3>

    @foreach($places as $index => $place)
        <h4>{{ $place['name'] }}</h4>
        <p>{{ $place['formatted_address'] }}</p>
        @if(isset($place['website']))
            <a href="{{ $place['website'] }}" target="_blank">Website</a>
        @endif

        <!-- Formulário dentro do loop -->
        <form class="delete-place-form" action="{{ route('places.destroy', ['id' => $placess[$index]->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete-btn">Deletar Lugar</button>
        </form>

        <hr>
    @endforeach
@endif --}}

@if ($places != null && $placess != null)
    <h3 style="text-align: center">Roteiro de Viagem:</h3>

    <div class="row" style="display: flex; justify-content: space-evenly;">
        @foreach($places as $index => $place)
            <div class="card_trip" style="margin-bottom: 20px">
                <div class="card_body">
                    {{-- <img class="image_card" src="/img/travels/{{$travel->image}}" alt="{{ $travel->title }}"> --}}
                    <h5 class="card_title">{{ $place['name'] }}</h5>
                    <p class="card_text" style="font-weight: 500">{{ $place['formatted_address'] }}</p>
                    {{-- <p>data:</p>
                    <p>hora:</p> --}}
                    <div class="buttons_card">
                        @if(isset($place['website']))
                            <a href="{{ $place['website'] }}" target="_blank" class="edit_card_button">Visitar Site</a>
                        @endif
                            <form class="delete-place-form" action="{{ route('places.destroy', ['id' => $placess[$index]->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete_card_button">Deletar Lugar</button>
                            </form>
                    </div>
                </div>
            </div>

            {{-- @if(($index + 1) % 3 == 0)
                </div><div class="card-deck">
            @endif --}}
        @endforeach
    </div>
@endif

@endsection