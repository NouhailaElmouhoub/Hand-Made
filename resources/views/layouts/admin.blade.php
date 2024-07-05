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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Admin - HAND MADE')</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-white   bg-secondary main-header navbar navbar-expand navbar-white navbar-light">
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
          <a class="nav-link active text-black" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i> </a>

          
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active text-black" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>

          <a class="nav-link active text-black" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>

          @else
          
          <form id="logout" action="{{ route('logout') }}" method="POST">
            
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

  <div class="row g-0">
    <!-- sidebar -->
    <div class="p-3 col fixed text-white nav">
      
      <hr />
      <ul class="nav flex-column">
        <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">- Admin - Home</a></li>
        <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white"><i class="nav-icon fas fa-tag"></i>- Admin - Products</a></li>
        <li><a href="{{ route('admin.assiete.index') }}" class="nav-link text-white">- Admin - assietes</a></li>
        <li><a href="{{ route('admin.bol.index') }}" class="nav-link text-white">- Admin - bols</a></li>
        <li><a href="{{ route('admin.plat.index') }}" class="nav-link text-white">- Admin - plats</a></li>
        <li><a href="{{ route('admin.orders.index')}}" class="nav-link text-white"><i class="nav-icon fas fa-shopping-bag"></i>- Admin - orders</a></li>

        <li><a href="{{ route('users.index') }}" class="nav-link text-white"><i class="nav-icon  fas fa-users"></i>- Admin - users</a></li>
        <li><a href="{{ route('admin.promo.index') }}" class="nav-link text-white"><i class="nav-icon  fa fa-percent" aria-hidden="true"></i>- Admin - promos</a></li>
        <li>
          <a href="{{ route('home.index') }}" class="mt-2 btn  text-white">Go back to the home page</a>
        </li>
      </ul>
    </div>
    <!-- sidebar -->
    <div class="col content-grey">
      <nav class="p-3 shadow text-end">
        <span class="profile-font">Admin</span>
        <img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}">
      </nav>

      <div class="g-0 m-5">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"></a> 
      </small>
    </div>
  </div>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>

</html>
