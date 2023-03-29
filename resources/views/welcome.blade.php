<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">

                </div>
                <div class="col-md-3">

                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar Session</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registro</a>
                                    @endif
                                @endauth
                            </div>
                        @endif



                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>FERRETERIA</h2>
                    <br>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{URL::asset('img/portada1.jpg')}}" class="d-block w-100" alt="...">

                          </div>
                          <div class="carousel-item">
                            <img src="{{URL::asset('img/portada2.jpeg')}}" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="{{URL::asset('img/portada3.png')}}" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </button>
                      </div>
                </div>
            </div>
        </div>
<br>
<br>
        <div class="container  text-center">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="border-radius:5px; background-color: rgb(206, 206, 206)" >
                        <div style="margin: 2%" >
                            <h3> Misión</h3>
                        <p>

Proporcionar soluciones para la construcción, preparación y mejoramiento del entorno, con su servicio a tiempo y un equipo comprometido.
                        </p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="border-radius:5px; background-color: rgb(206, 206, 206)">
                        <div style="margin: 2%">
                            <h3> Visión</h3>
                        <p>

Ser líderes en el mercado de ferretería, construcción y decoración, ofreciendo un servicio rápido y eficiente basado en la innovación continúa y con la gente más especializada.
                        </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

<br>
<br>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" >
                    <h2>Marcas con las que trabajamos</h2>
                </div>
                <br>
                <br>

            </div>
        </div>
<br>
<br>
        <div class="container">
            <div class="row">
                <div class="col-md-4" >
                    <img  src="{{URL::asset('img/logo1.png')}}" style="width: 30vh" alt="...">
                </div>
                <div class="col-md-4">
                    <img   src="{{URL::asset('img/logo4.png')}}" style="width: 30vh" alt="...">
                </div>
                <div class="col-md-4">
                    <img   src="{{URL::asset('img/logo3.png')}}" style="width: 30vh" alt="...">
                </div>


            </div>
            <br>
            <div class="row">
                <div class="col-md-4" >
                    <img   src="{{URL::asset('img/logo2.png')}}" style="width: 30vh" alt="...">
                </div>
                <div class="col-md-4">
                    <img   src="{{URL::asset('img/logo5.png')}}" style="width: 30vh" alt="...">
                </div>
                <div class="col-md-4">
                    <img   src="{{URL::asset('img/logo6.png')}}" style="width: 30vh" alt="...">
                </div>


            </div>
        </div>

        <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-4">
              <!-- Section: Social media -->
              <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fab fa-facebook-f"></i
                ></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fab fa-twitter"></i
                ></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fab fa-google"></i
                ></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fab fa-instagram"></i
                ></a>




              </section>
              <!-- Section: Social media -->


              <!-- Section: Form -->



            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <!-- <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2020 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div> -->
            <!-- Copyright -->
          </footer>

    </body>
</html>
