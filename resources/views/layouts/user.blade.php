<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>



    </style>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css"
    rel="stylesheet"
    />
    </head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
          <div class="container">
            <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarExample01"
              aria-controls="navbarExample01"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse text-center justify-content-end" id="navbarExample01">
              <ul class="navbar-nav ml-auto mb-lg-0 text-center">
                @if (auth()->check())
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('user.show',Auth::id()) }}">My Account</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('checkout.index') }}">Checkout</a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link text-info" href="{{ route('register') }}">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-info" href="{{ route('login') }}">Login</a>
                  </li>
                @endif

              </ul>
            </div>
          </div>
        </nav>

      </header>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <a class="navbar-brand" href="/">
                <h1 class="text-info h-auto"><span class="text-black font-weight-bold ">E</span>commerce</h1>
               </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>




          <ul class="navbar-nav">
            <!-- Dropdown -->
            <li class="nav-item dropdown">

              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

              </ul>

            </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">products</a>
              </li>

          </ul>





        </ul>
        <ul>

        </ul>

      </div>

      <div class="d-flex align-items-center">
        <!-- Icon -->



        <!-- Notifications -->
        <li class="nav-item mr-4" type="none" >
  <a class="text-reset me-3 " href="{{ route('cart.index') }}">
          <i class="fas fa-shopping-cart">
            <span class="badge bg-primary">

                {{ count(App\Models\Cart::where('user_id',Auth::id())->get()) }}</i>

            </span>
        </a>


    </li>


        @if (auth()->check())

        <div class="dropdown" >
            <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{route('user.show',Auth::id())}}">Profile</a>
              <a class="dropdown-item" href="{{ route('dashboard.index') }}">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>

            </div>
          </div>


        @else
        <li class="nav-item mr-4" type="none" >
            <a href="{{ route('login') }}" class="btn btn-primary"></i>LogIn</a>
           </li>
           @endif
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->




@yield('content')

<footer class="bg-light text-center text-lg-start mt-5">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">Mohammad Jibreel </a>
    </div>
  </footer>


<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
</body>
</html>
