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
    <section id="main" class="style_header">
    <h1 class="title_tromso" style="padding-top: 80px; font-size: 130px">Ops! Erro 404 :/</h1>
        <h2 class="title_black subtitle_404">Parece que a página que você está procurando foi movida ou nunca existiu. <br> Certifique-se que digitou o endereço corretamente ou seguiu um link válido.</h2>
        <div class="botao404">
            <a href="/">
                <button class="menu_principal_link" >Clique aqui para voltar ao Menu Principal</button>
            </a>
        </div>
    </section>

@endsection