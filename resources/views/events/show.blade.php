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
<div class="col-md-10 offset-md-1 separar">
    <div class="row">
        <div class="container_form" style="max-width: 50%">
            <div id="image-container" class="col-md-6" style="width: 100%">
                <img src="/img/travels/{{$travel->image}}" class="img-fluid" alt="{{$travel->title}}">
            </div>
            <div id="info-container" class="col-md-6" style="width: 100%">
                <h1 style="margin: 10px; font-weight:500;">{{$travel->title}}</h1>
                <p class="event-city" style="font-weight:400;"><strong>Cidade: </strong> {{$travel->city}}</p>
                <p class="description" style="font-weight:400;"><strong>Descrição: </strong> {{$travel->description}}</p>
                <div class="datas_card" style="font-weight:400;">
                    <p style="font-weight:400;"><strong>Data de início: </strong>{{date('d/m/Y', strtotime($travel->startDate))}}</p>
                    <p style="font-weight:400;"><strong>Data de término: </strong> {{date('d/m/Y', strtotime($travel->endDate))}}</p>
                </div>
                <p style="font-weight:400;"><strong>Orçamento:</strong> R${{$travel->budget}}</p>
                <!-- Exemplo de como exibir as informações na sua view -->
    
                {{-- @foreach($places as $place)
                    <h2>{{ $place['name'] }}</h2>
                    <p>{{ $place['formatted_address'] }}</p>
                    @if(isset($place['website']))
                        <a href="{{ $place['website'] }}" target="_blank">Website</a>
                    @endif
                @endforeach --}}
    
                {{-- <a href="/events/edit/{{$travel->id}}" class="btn btn-info edit-btn">Editar</a>
                <form action="/events/{{$travel->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                </form> --}}
            </div>
        </div>
    </div>
    
    {{-- API --}}
    <div class="col-md-12" id="api-container">
        @if ($places != null)
            <h2 style="text-align: center">Roteiro de Viagem:</h2>
            @foreach($places as $place)
                <h4>{{ $place['name'] }}</h4>
                <p>{{ $place['formatted_address'] }}</p>
                @if(isset($place['website']))
                    <a href="{{ $place['website'] }}" target="_blank">Website</a>
                @endif
                {{-- <form action="/events" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="travel_id" value="{{ $travel->id }}">
                    <input type="hidden" name="place_id" value="{{ $places->pluck('id')->first() }}">
                    <button type="submit" class="btn btn-danger delete-btn">Deletar Lugar</button>
                </form> --}}
                <hr>
            @endforeach
            <a href="/events/roadmap/{{$travel->id}}" class="manageroadmapbutton">Gerenciar roteiro</a>
        @endif

        <h2 style="text-align: center">Pesquise por locais legais para visitar!</h2>
        <p style="text-align: center">Busque lugares novos nas redondesas!!</p>
        <div>
            <input type="text" id="searchInput" class="searchplace" placeholder="Digite o tipo de lugar que deseja procurar">
        
            <button onclick="searchPlaces()" class="buscarplace">Buscar Locais</button>
        </div>

        <div id="resultsList" class="row" style="margin-bottom: 30px; display: flex; justify-content: space-evenly;">
    
        </div>

        
        <form action="/events/{{$travel->id}}" method="POST" enctype="multipart/form-data" id="addPlaceForm">
            @csrf
        
            <!-- Container para campos dinâmicos do local -->
            <div id="placeDetails"></div>
        
            <input type="submit" class="travel_card_button" style="display: flex; justify-content: center;" value="Salvar">
        </form>
    </div>
</div>



@endsection