<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  
  <title>@yield('title', 'Hand-made')</title>
</head>
<body>
  @if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
  {{ session('error') }}
</div>
@endif

  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-white   bg-secondary py-1">
    <div class="container R">
     
      <a class="navbar-brand" href="{{ route('home.index') }}"><img class="d-block logo"
                    src="{{ asset('img/logo.png') }}"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active text-black" href="{{ route('home.index') }}">Home</a>

          <a class="nav-link active text-black" href="{{ route('product.index') }}">Tous les produits</a>
                    <!-- Dropdown -->
                    <div class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                      </a>
                      <ul class="dropdown-menu bg-dark " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-white" href="{{ route('assiete.index') }}">Assietes</a></li>
                        <li><a class="dropdown-item  text-white" href="{{ route('bol.index') }}">Bols</a></li>
                        <li><a class="dropdown-item  text-white" href="{{ route('plat.index') }}">Plats et Plateux</a></li>
                      </ul>
                    </div>
                    <!-- End of Dropdown -->

                    <a class="nav-link active text-black" href="{{ route('promo.index') }}">Promotions</a>
          {{-- <a class="nav-link active text-black" href="{{ route('home.about') }}">About</a> --}}
          

          
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active text-black" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>

          <a class="nav-link active text-black" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>

          @else
          
          <form id="logout" action="{{ route('logout') }}" method="POST">
            <a class="nav-link active text-black" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i> </a>
            <a role="button" class="nav-link active text-black"
               onclick="document.getElementById('logout').submit();">Logout</a>
               <a class="nav-link active text-black" href="{{ route('admin.home.index') }}">Admin Panel</a>
            @csrf
          </form>
          @endguest
        </div>
      </div>
    </div>
  </nav>

  {{-- <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'Welcome to your Hand-made')</h2>
    </div>
  </header> --}}
  <!-- header -->

  <div style="min-height: calc(100vh - 200px);" class="container my-4">
    @yield('content')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank">
          
        </a> - <b>2024</b>
      </small>
    </div>
  </div>
  <!-- footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>
