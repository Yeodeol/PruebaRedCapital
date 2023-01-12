<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/58f746962c.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Prueba01</title> 
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Prueba RedCapital</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              @auth
                
                @if(auth()->user()->admin == 1)
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="cotizaciones">Cotizaciones</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="usuarios">Usuarios</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="cotizaciones">Cotizaciones</a>
                  </li>
                @endif
              
              @endauth
              
            </ul>
            @auth
                <p class="mr-2" style="margin-bottom:0rem !important;">Bienvenido {{auth()->user()->nombre}}</p>  
                <a class="btn btn-outline-black" href="/logout" type="submit">Log Out</a> 
            @endauth
            @guest
                <a class="btn btn-outline-black" href="/login" type="submit">para ver contenido logeate</a>
            @endguest
          </div>
        </div>
      </nav>
    @yield('contenido')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>