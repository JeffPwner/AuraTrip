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
@endsection

@section('content')


<p>Retornar para: <a href="/events/{{$travel->id}}">{{$travel->title}}</a></p>

{{-- API --}}
<div class="col-md-12" id="api-container">
    <h3>Pesquise por locais legais para visitar!</h3>
    <p>Pesquise a vontade lugares nas redondesas!!</p>
    <div>
        <label for="searchInput">Digite o que deseja:</label>
        <input type="text" id="searchInput" placeholder="Digite sua pesquisa">
    
        <button onclick="searchPlaces()">Buscar Locais</button>
    </div>

    <ul id="resultsList"></ul>

    
    <form action="/events/{{$travel->id}}" method="POST" enctype="multipart/form-data" id="addPlaceForm">
        @csrf
    
        <!-- Container para campos dinâmicos do local -->
        <div id="placeDetails"></div>
    
        <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
    
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
    <h3>Roteiro de Viagem:</h3>

    <div class="card-deck">
        @foreach($places as $index => $place)
            <div class="card d-inline-block" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $place['name'] }}</h5>
                    <p class="card-text">{{ $place['formatted_address'] }}</p>
                    <p>data:</p>
                    <p>hora:</p>
                    @if(isset($place['website']))
                        <a href="{{ $place['website'] }}" target="_blank" class="card-link">Website</a>
                    @endif

                </div>
                <div class="card-footer">
                    <!-- Formulário dentro do loop -->
                    <form class="delete-place-form" action="{{ route('places.destroy', ['id' => $placess[$index]->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">Deletar Lugar</button>
                    </form>

                </div>
            </div>

            @if(($index + 1) % 3 == 0)
                </div><div class="card-deck">
            @endif
        @endforeach
    </div>
@endif

@endsection