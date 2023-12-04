<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta property="og:locale" content="pt_BR" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://auratrip.com.br/" />
        <meta property="og:title" content="Auratrip - TCC Fatec Rubens Lara" />
        <meta property="og:site_name" content="Auratrip" />
        <meta property="og:description" content="Auratrip - Planejamento de viagens e Informações sobre lugares" />

        <meta property="og:image:type" content="image/jpg" />
        <meta property="og:image:alt" content="Logo Auratrip" />
        <meta property="og:image:width" content="300" />
        <meta property="og:image:height" content="400" />

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Auratrip - TCC Fatec Rubens Lara." />
        <!-- google site verification -->
        <meta name="google-site-verification" content="z_lH9tH0wbjtMz-3Gxh-qzwu25t_HTu6qWTVMIgMeiQ" />
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="icon" href="https://res.cloudinary.com/dlsuopwkn/image/upload/v1697427878/samples/animals/auratripicon.png" />
        <link rel="stylesheet" href="/css/styles.css">

        <script src="/js/scripts.js"></script>
    </head>
    <body>
      <a href="/" class="skip-to-main-content-link">Saltar para o conteúdo principal</a>
          {{-- @yield('imagemdobanner')
          @yield('banner') --}}

          @yield('headerpage')
            {{-- <div class="container_header">
              <a href="/">
                  <img class="logo_img" src="https://res.cloudinary.com/dlsuopwkn/image/upload/v1698457738/samples/animals/auratripicon_white.png" width="30" height="30" alt="logo" />
              </a>
              <ul class="buttons" id="home" style="margin-bottom: 0;">
                  <li><a href="/dashboard">Viagens</a></li>
                  <li><a href="/events/create">Criar Viagem</a></li>
                  @guest
                    <li><a href="/register">Cadastrar</a></li>
                    <li><a href="/login">Entrar</a></li>
                  @endguest --}}
              </ul>
              <!-- <div class="menucell"><ion-icon name="menu-outline"></ion-icon></div> -->
          </div>
          @yield('tituloanimacao')
          @if(request()->is('/'))
            <div id="search-container" class="col-md-12">
                <form action="/" method="GET" class="formdobotaopesquisa">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Busque por uma Viagem - Procurar...">
                </form>
            </div>
          @endif
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
          <div class="container_footer">
            <div class="container_footer_section">
              <p style="color: white; margin-bottom: 10px;">O AuraTrip é uma empresa de planejamento de viagens que vai revolucionar o turismo e te ajudar a fazer o passeio dos sonhos.</p>
              <p>
                <a class="termos" href="/termos">Termos e condições</a>
              </p>
            </div>

            <div class="container_footer_section">
              <a class="termos" href="mailto:guicrispim1000@gmail.com" style="color: white; margin-bottom: 10px;">Entre em contato conosco</a>
              <p class="icons" style="margin-top: 10px;">
                <a title="Github AuraTrip" href="https://github.com/jeffpwner/auratrip" target="_blank"><ion-icon name="logo-github"></ion-icon></a>
                <a title="Instagram AuraTrip" href="https://instagram.com/auratrip_" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a>
                <a title="Behance AuraTrip" href="https://www.behance.net/guilhermecrispim" target="_blank"><ion-icon name="logo-behance"></ion-icon></a>
              </p>
            </div>
          </div>
        </footer>
        <div class="copyright">
            <p>&copy; Auratrip; 2023 - Todos os Direitos Reservados</p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTxF53J3Ji_U1YDmtNtSZwr1eu0_wN69I&libraries=places&callback=initMap">
        </script>  
        <script src="https://kit.fontawesome.com/a612fc3044.js" crossorigin="anonymous">
      </body>
</html>
