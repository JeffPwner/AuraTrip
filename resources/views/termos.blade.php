@extends('layouts.template')

@section('title', 'AuraTrip')

@section('exportcss')
    <link rel="stylesheet" href="/css/termos.css">
@endsection

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
@endsection

@section('content')

    <h1 class="comecotermos">AuraTrip - Termos e Condições</h1>

    <div class="container_termos">
        <strong><p>Coleta e Uso de Informações</p></strong>
        <p>Ao utilizar a AuraTrip, coletamos as seguintes informações:</p> <br>
        <p>
            <ul>
                <li>Número de dias de estadia: para sugestões adequadas à duração da estadia.</li>
                <li>Destino desejado: para recomendações personalizadas de viagem.</li>
                <li>Orçamento: para recomendações econômicas.</li>
                <li>Tipo de viagem (casal ou família): para atender às suas necessidades.</li>
            </ul>
        </p> 
        <br>
        <p>As informações são usadas exclusivamente para fornecer recomendações de viagem personalizadas, sem compartilhá-las com terceiros.</p>
    </div>

    <div class="container_termos">
        <strong><p>Segurança de Dados</p></strong>
        <p>Priorizamos a segurança dos dados com criptografia e servidores seguros.</p>
    </div>

    <div class="container_termos">
        <strong><p>Retenção de dados</p></strong>
        <p>Mantemos suas informações apenas o tempo necessário para oferecer recomendações de viagem, excluindo-as quando não são mais necessárias.</p>
    </div>

    <div class="container_termos">
        <strong><p>Uso do Local</p></strong>
        <p>Usamos informações de localização para entender a origem dos usuários, oferecer cupons baseados na paridade do poder de compra e fornecer assistência quando estão em seus destinos de viagem planejados, respeitando as leis de privacidade.</p>
    </div>

    <div class="container_termos">
        <strong><p>Isenção de Responsabilidade</p></strong>
        <p>As recomendações da AuraTrip são apenas informativas, sem garantia de precisão, integridade ou confiabilidade. Os usuários são responsáveis por suas decisões e riscos durante a viagem.</p>
    </div>

    <div class="container_termos">
        <strong><p>Seus Direitos</p></strong>
        <p>Você tem o direito de acessar, modificar ou excluir suas informações pessoais, entrando em contato conosco.</p>
    </div>

    <div class="container_termos">
        <strong><p>Alterações a esta Política</p></strong>
        <p>Podemos atualizar esta Política de Privacidade e notificaremos as alterações no site. O uso contínuo da AuraTrip após as mudanças implica aceitação dos novos termos.</p>
    </div>

@endsection
