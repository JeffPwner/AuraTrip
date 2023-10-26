@extends('layouts.main')

@section('title', 'Viagens')

@section('content')

<div id="travels-container" class="col-md-12">
    
    
    <h2>Todas as Viagens Planejadas</h2>
    <div id="cards-container" class="row">
        @foreach($travels as $travel)
        <div class="card col-md-3">
            <img src="/img/travels/{{$travel->image}}" alt="{{ $travel->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $travel->title }}</h5>
                <p class="card-place">{{$travel->city}}</p>
                <p class="card-date">Início: {{date('d/m/Y', strtotime($travel->startDate))}}</p>
                <p class="card-date">Fim: {{date('d/m/Y', strtotime($travel->endDate))}}</p>
                <a href="#" class="btn btn-info edit-btn">Editar</a>
                <form action="/events/{{$travel->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                </form>
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


@endsection