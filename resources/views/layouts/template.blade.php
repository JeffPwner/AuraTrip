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
        <title>AuraTrip</title>
        <link rel="icon" href="https://res.cloudinary.com/dlsuopwkn/image/upload/v1697427878/samples/animals/auratripicon.png" />
        @yield('exportcss')

        <script src="/js/scripts.js"></script>
    </head>
    <body>
      <a href="#home" class="skip-to-main-content-link">Saltar para o conteúdo principal</a>
          @yield('imagemdobanner')
          @yield('banner')
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
            <div class="container1">
              <p>footer estruturado mas não estilizado</p>
            </div>

            <div class="container2">
              <p>
                <h2 class="teste">Entre em contato conosco</h1>
              </p>
              <p>
                <a title="Github AuraTrip" href="https://github.com/jeffpwner/auratrip" target="_blank"><ion-icon name="logo-github"></ion-icon></a>
                <a title="Instagram AuraTrip" href="https://instagram.com/auratrip_" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a>
                <a title="Behance AuraTrip" href="https://www.behance.net/guilhermesilva77" target="_blank"><ion-icon name="logo-behance"></ion-icon></a>
                <a title="E-mail AuraTrip" href="mailto:guicrispim1000@gmail.com" target="_blank"><ion-icon name="mail"></ion-icon></a>
              </p>
            </div>
        </footer>
          </div>
        <div class="copyright">
            <p>&copy; Auratrip; 2023 - Todos os Direitos Reservados</p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      </body>
</html>
