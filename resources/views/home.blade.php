@extends('layouts.template')

@section('title', 'AuraTrip')

{{-- @section('exportcss')
    <link rel="stylesheet" href="/css/styles.css">
@endsection --}}

{{-- @section('imagemdobanner')
    <header id="main" class="style_header">
@endsection --}}
    
{{-- @section('banner')

    <div class="container_header">
        <a href="/">
            <img class="logo_img" src="https://res.cloudinary.com/dlsuopwkn/image/upload/v1698457738/samples/animals/auratripicon_white.png" width="30" height="30" alt="logo" />
        </a>
        <ul class="buttons" id="home" style="margin-bottom: 0;">
            <li><a href="/dashboard">Viagens</a></li>
            <li><a href="/events/create">Criar Viagem</a></li>
            <li><a href="/register">Cadastrar</a></li>
            <li><a href="/login">Entrar</a></li>
        </ul>
        <!-- <div class="menucell"><ion-icon name="menu-outline"></ion-icon></div> -->
    </div>
    <h1 class="title_tromso" style="margin-top: 30px;">AuraTrip</h1>

    <div id="search-container" class="col-md-12">
        <form action="/" method="GET" class="formdobotaopesquisa">
            <input type="text" id="search" name="search" class="form-control" placeholder="Busque por uma Viagem - Procurar...">
        </form>
    </div>

@endsection --}}

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
            <p>Não foi possível encontrar nenhuma viagem planejada com: {{$search}}! <a href="/dashboard">Ver todas</a></p>
        @elseif(count($travels) == 0)
            <p>Não há viagens planejadas até o momento. <a href="/events/create">Clique aqui para criar a sua!</a></p>
        @endif
    </div>

    {{-- AutoComplete --}}
        <div class="container">
            <input type="text" id="place-name" placeholder="Nome do lugar">
            <div id="results"></div>
        </div>
    
        <script>
            var input = document.getElementById("place-name");
    
            // Cria um ouvinte de evento para o evento "keyup"
            input.addEventListener("keyup", function() {
    
                // Obtém o texto digitado no campo de pesquisa
                var text = input.value;
    
                // Realiza uma pesquisa de autocompletar com o texto digitado
                var results = new google.maps.places.Autocomplete(input, {
                    types: ["establishment", "geocode"]
                });
    
                // Exibe os resultados da pesquisa de autocompletar
                results.setBounds(new google.maps.LatLngBounds(-90, -180, 90, 180));
                results.addListener("place_changed", function() {
                    var place = results.getPlace();
                    if (place) {
                        // Atualiza o campo de pesquisa com o nome do lugar
                        input.value = place.name;
    
                        // Exibe o endereço do lugar
                        document.getElementById("results").innerHTML = place.formatted_address;
                    }
                });
            });
        </script>

    {{-- findPlaceFromQuery --}}
    <label for="searchInput">Digite o que deseja:</label>
    <input type="text" id="searchInput" placeholder="Digite sua pesquisa">

    <button onclick="searchPlaces()">Buscar Locais</button>

    <ul id="resultsList"></ul>

    <script>let placesService;
        let map;
        
        function initMap() {
            map = new google.maps.Map(document.createElement('div'));
            placesService = new google.maps.places.PlacesService(map);
        }
        
        function searchPlaces() {
            const searchInput = document.getElementById('searchInput').value;
        
            if (searchInput.trim() !== '') {
                const request = {
                    query: searchInput,
                    fields: ['name', 'formatted_address', 'place_id', 'types']
                };
        
                placesService.findPlaceFromQuery(request, displayResults);
            }
        }
        
        function displayResults(results, status) {
            const resultsList = document.getElementById('resultsList');
            resultsList.innerHTML = '';
        
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                results.forEach(place => {
                    const listItem = document.createElement('li');
                    listItem.innerHTML = `<strong>${place.name}</strong> - ${place.formatted_address} (${place.types.join(', ')})`;
                    resultsList.appendChild(listItem);
                });
            } else {
                resultsList.innerHTML = '<li>Nenhum resultado encontrado.</li>';
            }
        }</script>


</div>
@endauth
@endsection