@extends('layouts.template')

@section('title', 'Criar Viagem')

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
        <input type="submit" class="btn btn-primary" value="Criar Viagem">
    </form>
</div>

@endsection