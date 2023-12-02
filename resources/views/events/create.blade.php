@extends('layouts.template')

@section('title', 'Criar Viagem')

@section('content')

<div id="event-create-container" class="feedback_title">
    <h1>Organize sua viagem!</h1>
    <form id="formulario" class="container_form" action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form_group" sty>
            <label for="title">Imagem da Viagem:</label> <br>
            <input type="file" id="image" name="image" class="form-control-file"v style="font-weight: 500;">
        </div>
        <div class="form_group">
            <label for="title">Viagem:</label>
            <input type="text" id="title" name="title" placeholder="Título da Viagem">
        </div>
        <div class="form_group">
            <label for="title">Cidade:</label>
            <input type="text" id="city" name="city" placeholder="Cidade">
        </div>
        <div class="form_group">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description" placeholder="Descrição" class="form-control"></textarea>
        </div>
        <div class="form_group">
            <label for="startDate">Data de Inicio:</label>
            <input type="date" id="startDate" name="startDate">
        </div>
        <div class="form_group">
            <label for="endDate">Data de Término:</label>
            <input type="date" id="endDate" name="endDate">
        </div>
        <div class="form_group">
            <label for="budget">Orçamento:</label>
            <input type="money" id="budget" name="budget">
        </div>
        <div class="form_group">
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
</div>

@endsection