@extends('layouts.template')

@section('title', 'AuraTrip')

@section('exportcss')
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/erro404.css">
@endsection

@section('imagemdobanner')
    <header id="pag_erro" class="style_header">
@endsection

@section('banner')
    <div class="container_header">
        <a href="index.html">
            <img class="logo_img" src="https://res.cloudinary.com/dlsuopwkn/image/upload/v1697427878/samples/animals/auratripicon.png" width="30" height="30" alt="logo" />
        </a>
        <ul class="buttons" id="home" style="margin-bottom: 0;">
            <li><a href="index.html" style="color: #000">Viagens</a></li>
            <li><a href="postar.html" style="color: #000">Criar Viagem</a></li>
            <li><a href="#" style="color: #000">Cadastrar</a></li>
            <li><a href="contato.html" style="color: #000">Entrar</a></li>
        </ul>
        <!-- <div class="menucell"><ion-icon name="menu-outline"></ion-icon></div> -->
    </div>
    <h1 class="title_black" style="margin-top: 30px;  font-size: 110px;">Ops! Erro 403 :/</h1>
    <h2 class="title_black subtitle_404">@extends('layouts.template')

@section('title', 'AuraTrip')

@section('exportcss')
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/erro404.css">
@endsection

@section('imagemdobanner')
    <header id="pag_erro" class="style_header">
@endsection

@section('banner')

    <h1 class="title_black" style="margin-top: 30px;  font-size: 110px;">Ops! Erro 404 :/</h1>
    <h2 class="title_black subtitle_404">Desculpe, você não possui as permissões necessárias para acessar esta página.</h2>
    <div class="botao404">
        <a href="/">
            <button class="menu_principal_link" >Clique aqui para voltar ao Menu Principal</button>
        </a>
    </div>

@endsection

    <div class="botao404">
        <a href="/">
            <button class="menu_principal_link" >Clique aqui para voltar ao Menu Principal</button>
        </a>
    </div>

@endsection

<!-- não sei por que bulufas o Handler está dando errado -->