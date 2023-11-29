@extends('layouts.template')

@section('title', 'AuraTrip')

@section('exportcss')
    <link rel="stylesheet" href="/css/styles.css">
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

<section class="style_section">
    <div class="container">
        <div class="container_text">
            <h1>AuraTrip</h1>
            <h2>A melhor plataforma de viagens e informação sobre lugares</h2
            <p> AuraTrip é uma plataforma de viagens e informação sobre lugares </p>
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
                    .flexauthor<div class="name">Eduardo Alves</div>
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