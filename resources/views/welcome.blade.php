<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Banco de Sangre SCZ</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
    
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
    
        <!-- Google Web Fonts -->
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
        
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        
        <!-- Libraries Stylesheet -->
        <link href="{{asset('plantilla/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('plantilla/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('plantilla/css/bootstrap.min.css')}}" rel="stylesheet">
    
        <!-- Template Stylesheet -->
        <link href="{{asset('plantilla/css/style.css')}}" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Sistema Web</span>
                
            </h1>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
               
                <span class="site-heading-lower">BANCO DE SANGRE REGIONAL SANTA CRUZ</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">ACERCA DE NOSOTROS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        {{-- @guest --}}
                        <li class="nav-item px-lg-4"><a href="{{ route('donors.login') }}"><button type="button" class="btn btn-info">Iniciar sesion <i class="fas fa-heartbeat"></i> </button></a> </li>
                        {{-- @endguest --}}
                        {{-- @auth --}}
                        
                        {{-- <li class="nav-item px-lg-4"><a href="{{ route('patients.index', Auth::user()->id) }}"><button type="button" class="btn btn-info">Perfil <i class="fas fa-heartbeat"></i> </button></a> </li> --}}
                        {{-- @endauth --}}
                        {{-- <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('donors.register.view') }}">Registrate como donador</a></li> --}}
                        <li class="nav-item px-lg-4"><a href="{{ route('donors.register.view') }}"><button type="button" class="btn btn-info">Registrate como donador <i class="fas fa-heartbeat"></i> </button></a> </li>

                        {{-- <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products.html">Products</a></li> --}}
                        {{-- <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('plan.index') }}">Planes</a></li> --}}
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section clearfix">
            <div class="container">
                {{-- <center>                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src={{asset("images/phrase.png")}} alt="..." />
                </center> --}}
                
                <div class="intro">
                    <center>                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src={{asset("images/intro1.png")}} alt="..." />
                    </center>
                    <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                        <h1 class="section-heading mb-4">
                            
                            <span class="section-heading-lower">ACERCA DE NOSOTROS</span>
                        </h1>
                        <h2 class="section-heading mb-4">
                            
                            <span class="section-heading-lower">Nuestra Misión</span>
                        </h2>
                        <p class="mb-3">El banco de sangre regional de Santa Cruz tiene como misión fomentar y garantizar la donación voluntaria de sangre, así como garantizar los prestamos a las personas que más lo necesiten.
                            Bridar a la comunidad una opción al alcance de todas las personas que necesiten que se les preste sangre.
                            </p>
                        {{-- <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">LO MEJOR PARA TI!</a></div> --}}
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Nuestra Visión</span>
                            </h2>
                            <p class="mb-0">Crear y sostener un sistema integral de donación de sangre publica, que ofrezca un espacio de desarrollo profesional enfocado en excelencia y calidez en la asistencia a las personas que donan o que necesiten sangre.
                                Ser una institución pública modelo en gestión y asistencia al paciente en la ciudad de Santa Cruz de la Sierra.
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Nuestros valores</span>
            </h2>
            <div class="container"><p class="m-0 small">Realizar nuestro trabajo con la pasión, dedicación y entusiasmo necesario para llevar a cabo nuestra misión.</p></div>
            <div class="container"><p class="m-0 small">Honestidad, para transmitir confianza en todos los ámbitos ajustándonos siempre a la verdad.</p></div>
            <div class="container"><p class="m-0 small">Respeto a nuestros pacientes y su privacidad </p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('plantilla/lib/chart/chart.min.js')}}"></script>
        <script src="{{asset('plantilla/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('plantilla/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('plantilla/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('plantilla/lib/tempusdominus/js/moment.min.js')}}"></script>
        <script src="{{asset('plantilla/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
        <script src="{{asset('plantilla/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    
        <!-- Template Javascript -->
        <script src="{{asset('plantilla/js/main.js')}}"></script>
        {{-- CHATBOT --}}
        {{-- <script>
            window.addEventListener('mouseover', initLandbot, { once: true });
            window.addEventListener('touchstart', initLandbot, { once: true });
            var myLandbot;
            function initLandbot() {
              if (!myLandbot) {
                var s = document.createElement('script');s.type = 'text/javascript';s.async = true;
                s.addEventListener('load', function() {
                  var myLandbot = new Landbot.Livechat({
                    configUrl: 'https://chats.landbot.io/v3/H-961669-UQ6Y3SV4KWI632A8/index.json',
                  });
                });
                s.src = 'https://static.landbot.io/landbot-3/landbot-3.0.0.js';
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
              }
            } 
            </script> --}}
        {{-- END CHATBOT --}}
    </body>
</html>
