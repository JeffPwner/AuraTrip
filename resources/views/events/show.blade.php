@extends('layouts.template')

@section('title', $travel->title)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/travels/{{$travel->image}}" class="img-fluid" alt="{{$travel->title}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$travel->title}}</h1>
            <p class="event-city">{{$travel->city}}</p>
            <p class="description">{{$travel->description}}</p>
            <p>Data de início: {{date('d/m/Y', strtotime($travel->startDate))}}</p>
            <p>Data de término: {{date('d/m/Y', strtotime($travel->endDate))}}</p>
            <!-- Exemplo de como exibir as informações na sua view -->

            {{-- @foreach($places as $place)
                <h2>{{ $place['name'] }}</h2>
                <p>{{ $place['formatted_address'] }}</p>
                @if(isset($place['website']))
                    <a href="{{ $place['website'] }}" target="_blank">Website</a>
                @endif
            @endforeach --}}
            <h3>Local que deseja visitar:</h3>
            <p>{{$places['name']}}</p>
            <p>{{ $places['formatted_address'] }}
            @if(isset($places['website']))
                <a href="{{ $places['website'] }}" target="_blank">Website</a>
            @endif
            <a href="/events/edit/{{$travel->id}}" class="btn btn-info edit-btn">Editar</a>
            <form action="/events/{{$travel->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
            </form>
        </div>
    </div>
    
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
            @method('PUT')
        
            <!-- Container para campos dinâmicos do local -->
            <div id="placeDetails"></div>
        
            <input type="submit" class="btn btn-primary" value="Salvar">
        </form>
        

        

        

    </div>
</div>



@endsection