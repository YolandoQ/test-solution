<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Solução :upd8">
    <meta name="author" content="Yolando da Silva Queiroz">
    <title>:upd8</title>
    <link rel="shortcut icon" href="{{asset('img/logo_upd8.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('css/templatemo-festava-live.css')}}" rel="stylesheet">
    <link href="{{asset('css/application.css')}}" rel="stylesheet">
</head>

<body>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.sticky.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/application.js')}}"></script>
    
    <div class="spinner" style="display: none">
        <div class="spinner-inner"></div>
    </div>

    <div id="backdrop" class="">

        <main>
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
                <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="4000">
                  <div class="toast-header">
                    <strong class="me-auto"></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">
                  </div>
                </div>
              </div>
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('img/logo_upd8.png')}}" alt=":upd8" height="70px">
                        </a>
                        <a href="ticket.html" class="btn custom-btn d-lg-none ms-auto me-4">Contato</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="#"></a>
                                </li>
                            </ul>
                            <a href="/" class="btn custom-btn d-lg-block d-none">Home</a>
                        </div>
                    </div>
                </nav>
            @yield('content')
        </main>
        <footer class="site-footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h2 class="text-white mb-lg-0">Yolando Queiroz</h2>
                        </div>
                        <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
                            <ul class="social-icon d-flex justify-content-lg-end">
                                <li class="social-icon-item">
                                    <a href="https://api.whatsapp.com/send/?phone=85992427085&text=Ol%C3%A1,%20Yolando,%20aceitamos%20a%20sua%20solu%C3%A7%C3%A3o!&type=phone_number&app_absent=0" class="social-icon-link" target="_blank">
                                        <span class="bi-whatsapp"></span>
                                    </a>
                                </li>
                                <li class="social-icon-item">
                                    <a href="https://www.linkedin.com/in/yolando-queiroz-887b08224/" class="social-icon-link" target="_blank">
                                        <span class="bi-linkedin"></span>
                                    </a>
                                </li>
                                <li class="social-icon-item">
                                    <a href="https://github.com/YolandoQ" class="social-icon-link" target="_blank">
                                        <span class="bi-github"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </footer>
    </div>
</body>
</html>