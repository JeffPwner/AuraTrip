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
        <header class="style_header">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                  <img src="/img/auratrip-png.png" alt="Auratrip logo">
                </a>
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="/dashboard" class="nav-link">Viagens</a>
                  </li>    
                  <li class="nav-item">
                    <a href="/events/create" class="nav-link">Criar Viagem</a>
                  </li>
                  @auth
                  <li class="nav-item">
                    <form action="/logout" method="POST">
                      @csrf
                      <a href="/logout" 
                        class="nav-link" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Sair
                      </a>
                    </form>
                  </li>
                  @endauth
                  @guest
                  <li class="nav-item">
                    <a href="/login" class="nav-link">Entrar</a>
                  </li>
                  <li class="nav-item">
                    <a href="/register" class="nav-link">Cadastrar</a>
                  </li>    
                  @endguest
                </ul>
              </div>
            </nav>
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
