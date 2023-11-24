<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Alquimia</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  
  <header>
    <div id="app">
      <menu-barra ></menu-barra>
      <router-view></router-view>
    </div>
    <style>
      body {
        background-color: var(--bs-emphasis-color);
      }
    </style>
    {{-- <nav class="navbar navbar-expand-md sticky-top py-3 navbar-dark" id="mainNav" style="background: var(--bs-emphasis-color);">
      <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><a class="navbar-brand" href="#">
      <img src="../img/LogoAlquimia.svg" alt="" width="250" height="50" class="d-inline-block align-text-top img-fluid">
    </a></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navcol-1">
              <ul class="navbar-nav mx-auto mr-auto">
                  <li class="nav-item"><a class="nav-link active" href="">Inicio</a></li>
                  <li class="nav-item"><a class="nav-link " href="">Acerca de <br>nosotros</a></li>
                  <li class="nav-item"><a class="nav-link" href="">Licenciatura en<br>gastronomia</a></li>
                  <li class="nav-item"><a class="nav-link" href="">Docentes</a></li>
                  <li class="nav-item"><a class="nav-link" href="">Galeria</a></li>
                  <li class="nav-item"><a class="nav-link" href="">Reserva</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('tipoPlatos.index') }}">Tipos de Plato</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('categorias.index') }}">Categorías</a></li>
                </ul>

              @guest
              <a class="btn btn-secondary" role="button" href="{{route('register')}}" style="background-color: #ffffff; color: #000000; border-radius: 10px;">Registrarse</a>
              <a class="btn btn-secondary" role="button" href="{{route('login')}}" style="background-color: #ffffff; color: #000000; border-radius: 10px;">Login</a>
              @endguest

              @auth
              <<form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary" style="background-color: #ffffff; color: #000000; border-radius: 10px;">Logout</button>
            </form>

              @endauth
          </div>
      </div>
  </nav>
  <style>
     #mainNav .btn {
     margin-left: 10px;
     background-color: #ffffff;
     color: #000000;
     border-radius: 10px;
   }
   
   #mainNav .btn:hover {
     box-shadow: 0 0 10px 5px #ffffff;
   }
   
   .nav-item a {
     display: flex; /* Coloca los enlaces en una disposición flexible */
     align-items: center; /* Alinea los enlaces verticalmente en el centro */
     text-align: center; /* Alinea los enlaces horizontalmente en el centro */
   }
  </style>
  </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-weight-bold text-center h3 mb-10">
          @yield('titulo')
        </h2>
        @yield('contenido')
      </main>
     --}}
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>