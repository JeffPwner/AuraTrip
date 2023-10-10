@extends('layouts.main')

@section('title', 'Criar Viagem')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Organize sua viagem!</h1>
    <form action="/events" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Viagem:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título da Viagem">
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade">
        </div>
        <div class="form-group">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description" placeholder="Descrição" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
</div>

@endsection