@extends('layouts.template')

@section('title', $travel->title)

@section('content')

<form class="container_form" action="/events/update/{{$travel->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div id="image-container" class="form_group">
                    <img src="/img/travels/{{$travel->image}}" class="img-fluid" alt="{{$travel->title}}">
                    <label for="title">Imagem da Viagem:</label><br>
                    <input type="file" style="font-weight: 500;" id="image" name="image" class="form-control-file">
                </div>
                <div id="info-container" class="form_group">
                    <h1>Editando: {{$travel->title}}</h1>
                    <label for="title">Viagem:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título da Viagem" value="{{$travel->title}}">
                    {{-- <p class="event-city">{{$travel->city}}</p> --}}
                    <label for="title">Cidade:</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" value="{{$travel->city}}">
                    {{-- <p class="description">{{$travel->description}}</p> --}}
                    <label for="title">Descrição:</label>
                    <textarea name="description" id="description" placeholder="Descrição" class="form-control">{{$travel->description}}</textarea>
                    {{-- <p>Data de início: {{date('d/m/Y', strtotime($travel->startDate))}}</p>
                    <p>Data de término: {{date('d/m/Y', strtotime($travel->endDate))}}</p> --}}
                    <label for="startDate">Data de Inicio:</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" value="{{\Carbon\Carbon::parse($travel->startDate)->format('Y-m-d')}}">
                    <label for="endDate">Data de Término:</label>
                    <input type="date" class="form-control" id="endDate" name="endDate" value="{{\Carbon\Carbon::parse($travel->endDate)->format('Y-m-d')}}">
                    {{-- <a href="/events/edit/{{$travel->id}}" class="btn btn-info edit-btn">Confirmar</a> --}}
                </div>
            </div>
        </div>
    <input type="submit" class="btn btn-primary" value="Confirmar">
</form>
<form action="/events/update/{{$travel->id}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
</form>

@endsection