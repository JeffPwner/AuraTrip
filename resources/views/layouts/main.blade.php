<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        {{-- Fonte do Google --}}
            <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        {{-- CSS Bootstrap --}}
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        {{-- CSS da aplicação --}}
            <link rel="stylesheet" href="/css/styles.css">

        <script src="/js/scripts.js"></script>
    </head>
    <body>
      <a href="#home" class="skip-to-main-content-link">Saltar para o conteúdo principal</a>
        <header id="main" class="style_header">
          <div class="container_header">
          <a href="index.html">
              <img class="logo_img" src="https://res.cloudinary.com/dlsuopwkn/image/upload/v1697427878/samples/animals/auratripicon.png" width="30" height="30" alt="logo" />
          </a>
          <ul class="buttons" id="home" style="margin-bottom: 0;">
              <li><a href="index.html">Viagens</a></li>
              <li><a href="postar.html">Criar Viagem</a></li>
              <li><a href="#">Cadastrar</a></li>
              <li><a href="contato.html">Entrar</a></li>
          </ul>
          <!-- <div class="menucell"><ion-icon name="menu-outline"></ion-icon></div> -->
          </div>
          <h1 class="title_tromso" style="margin-top: 30px;">AuraTrip</h1>
        </header>
        <main>
          <div class="container-fluid">
            <div class="row">
              @if (session('msg'))
                <p class="msg">{{session('msg')}}</p>
              @endif
              @yield('content')
            </div>
          </div>
        </main>
        <footer>
            <p>AuraTrip Company &copy; 2023</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
