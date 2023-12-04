@extends('layouts.template')

@section('title', 'AuraTrip')

@section('headerpage')
    <header id="main" class="style_header_landingpage">
        <div class="container_header">
            <a href="/">
                <img class="logo_img" src="https://res.cloudinary.com/dlsuopwkn/image/upload/v1698457738/samples/animals/auratripicon_white.png" width="30" height="30" alt="logo" />
            </a>
            <ul class="buttons" id="home" style="margin-bottom: 0;">
                <li><a href="/dashboard">Viagens</a></li>
                <li><a href="/events/create">Criar Viagem</a></li>
                @guest
                  <li><a href="/register">Cadastrar</a></li>
                  <li><a href="/login">Entrar</a></li>
                @endguest
                @auth
                    <li>
                      <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" 
                          class="nav-link"
                          style="color: white"
                          onclick="event.preventDefault();
                          this.closest('form').submit();">
                          Sair
                        </a>
                      </form>
                    </li>
                  @endauth
        </div>
        <h1 class="title_tromso" style="padding-top: 80px; font-size: 130px">Ops! Erro 404 :/</h1>
        <h2 class="subtitle_404">Parece que a página que você está procurando foi movida ou nunca existiu. <br> Certifique-se que digitou o endereço corretamente ou seguiu um link válido.</h2>
        <div class="botao404">
            <a href="/">
                <button class="menu_principal_link" >Clique aqui para voltar ao Menu Principal</button>
            </a>
        </div>

@endsection