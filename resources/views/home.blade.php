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

<section class="style_section">
    <div class="container">
        <div class="container_text">
            <h1>AuraTrip</h1>
            <h2>A melhor plataforma de viagens e informação sobre lugares</h2
            <p> O AuraTrip é um sistema de planejamento de viagens que ajudam as pessoas a organizar suas jornadas ao redor do mundo de maneira mais eficiente e estruturada. </p>
        </div>
        <div class="container_image">
            <img alt="Illustration AuraTrip" src="https://res.cloudinary.com/dlsuopwkn/image/upload/v1697498376/samples/animals/illustration1_home.png">
        </div>
    </div>
</section>
<section class="style_section">
    <div class="feedbacks">
        <div class="feedback_title">
            <h1>Depoimentos dos Clientes</h1>
        </div>
        <div class="cards">
            <div class="card1">
                <div class="pessoa">
                    <img src="https://media.licdn.com/dms/image/D4D03AQEUdQKvGEyHmg/profile-displayphoto-shrink_800_800/0/1685980450696?e=2147483647&v=beta&t=iweCH-NqI1ZM53KSy1iXfHHHzJN63r603Hw0xKM6Wr4" alt="Pessoa do primeiro depoimento">
                    <div class="name">Eduardo Alves</div>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p>
                    O AuraTrip é uma ótima ferramenta que ajuda você a economizar tempo e também te livra de dores de cabeça quando você está planejando ir a algum lugar, é uma ótima economia de tempo na hora da viagem para planejá-la com mais eficiência.
                    </p>
                </div>
            </div>
            <div class="card2">
            <div class="pessoa">
                    <img src="https://media.licdn.com/dms/image/C4E03AQEzzn23-0KJeg/profile-displayphoto-shrink_800_800/0/1649955364051?e=2147483647&v=beta&t=yCcwgsQc7eXabtj66F4fscwqebdddV0XKdgbYee8h9U" alt="Pessoa do segundo depoimento">
                    <div class="name">Tarcísio Leite</div>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p>
                    O AuraTrip me forneceu muitas opções incríveis para eu planejar minha próxima viagem completamente. Eu consegui organizar informações detalhadas em uma interface amigável e incrível. Isso é simplesmente excelente. Adorei a maneira como esses caras estão facilitando a tarefa difícil de organizar uma viagem.
                    </p>
                </div>
            </div>
            <div class="card3">
            <div class="pessoa">
                    <img src="https://media.licdn.com/dms/image/C4D03AQFSNvN2WJt66w/profile-displayphoto-shrink_400_400/0/1661190185188?e=2147483647&v=beta&t=ns2eFsJcS-MDjJIisEc7I-PQb-9CPgUjfsMlVyN8KVo" alt="Pessoa do terceiro depoimento">
                    <div class="name">André Bueno</div>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p>
                    Adoro viajar, mas odeio planejar e muitas vezes faço reservas de última hora. Este aplicativo me ajuda a montar rapidamente uma agenda para minha viagem, eliminando grande parte do cansaço das decisões que assola o planejamento da viagem. Tenho usado em viagens de fim de semana com amigos, ou mesmo quando tenho tempo livre em viagem de trabalho.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@auth
<div id="travels-container" class="col-md-12">
    @if ($search)
        <h2>Buscando por: {{$search}}</h2>
    @else
        {{-- <h2>Todas as Viagens</h2> --}}
    @endif
    
    
    {{-- <p class="subtitle">Veja as viagens planejadas!</p>
    <div id="cards-container" class="row">
        @foreach($travels as $travel)
        <div class="card col-md-3">
            <img src="/img/travels/{{$travel->image}}" alt="{{ $travel->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $travel->title }}</h5>
                <p class="card-place">{{$travel->city}}</p>
                <p class="card-date">Início: {{date('d/m/Y', strtotime($travel->startDate))}}</p>
                <p class="card-date">Fim: {{date('d/m/Y', strtotime($travel->endDate))}}</p>
                <p>Orçamento: R${{$travel->budget}}</p>
                <a href="/events/{{$travel->id}}" class="btn btn-primary">Viajar</a>
            </div>
        </div>
        @endforeach
        @if (count($travels) == 0 && $search)
            <p>Não foi possível encontrar nenhuma viagem planejada com: {{$search}}! <a href="/dashboard">Ver todas</a></p>
        @elseif(count($travels) == 0)
            <p>Não há viagens planejadas até o momento. <a href="/events/create">Clique aqui para criar a sua!</a></p>
        @endif
    </div> --}}


    {{-- AutoComplete
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
        </script> --}}

    {{-- findPlaceFromQuery
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
        }

    </script> --}}
  
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTxF53J3Ji_U1YDmtNtSZwr1eu0_wN69I&libraries=places"></script> --}}

  {{-- <script>
    let placesService;
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

            placesService.textSearch(request, displayResults);
        }
    }

    function displayResults(results, status) {
        const resultsList = document.getElementById('resultsList');
        resultsList.innerHTML = '';

        if (status === google.maps.places.PlacesServiceStatus.OK) {
            results.forEach(place => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `<strong>${place.name}</strong> - ${place.formatted_address} (${place.types.join(', ')})`;

                const detailsButton = document.createElement('button');
                detailsButton.textContent = 'Detalhes';
                detailsButton.addEventListener('click', () => {
                    displayPlaceDetails(place.place_id);
                });

                listItem.appendChild(detailsButton);
                resultsList.appendChild(listItem);
            });
        } else {
            resultsList.innerHTML = '<li>Nenhum resultado encontrado.</li>';
        }
    }

    function displayPlaceDetails(placeId) {
        const placeDetailsRequest = {
            placeId,
            fields: ['name', 'formatted_address', 'website', 'photos']
        };

        placesService.getDetails(placeDetailsRequest, async (place, status) => {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                const detailsContainer = document.getElementById('placeDetails');
                detailsContainer.innerHTML = '';

                const nameElement = document.createElement('h2');
                nameElement.textContent = place.name;
                detailsContainer.appendChild(nameElement);

                const addressElement = document.createElement('p');
                addressElement.textContent = place.formatted_address;
                detailsContainer.appendChild(addressElement);

                if (place.website) {
                    const websiteElement = document.createElement('a');
                    websiteElement.href = place.website;
                    websiteElement.textContent = 'Website: ' + place.website;
                    detailsContainer.appendChild(websiteElement);
                }

                if (place.photos && place.photos.length > 0) {
                    place.photos.forEach(photo => {
                        if (photo && photo.hasOwnProperty('getUrl')) {
                            const photoUrl = photo.getUrl({ maxWidth: 300, maxHeight: 300 });

                            const photoElement = document.createElement('img');
                            photoElement.src = photoUrl;
                            detailsContainer.appendChild(photoElement);
                        } else {
                            console.error('Erro: Objeto de foto inválido na resposta da API.');
                        }
                    });
                } else {
                    console.error('Erro: Nenhuma foto encontrada para este lugar.');
                }
            }
        });
    }

    // initMap();
</script> --}}


{{-- <div class="mdc-top-app-bar">
    <div class="mdc-top-app-bar__row">
        <span class="mdc-top-app-bar__title">Pesquisa de lugares no Google Maps</span>
    </div>
</div>

<div>
    <label for="searchInput">Digite o que deseja:</label>
    <input type="text" id="searchInput" placeholder="Digite sua pesquisa">

    <button onclick="searchPlaces()">Buscar Locais</button>
</div>

<ul id="resultsList"></ul>

<div id="placeDetails"></div> --}}

{{-- <script>
    initMap();
</script> --}}

</div>
@endauth
@endsection