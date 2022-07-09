
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.1/assets/img/favicons/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Dashboard Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-light flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-info font-weight-bold p-3" href="/">Ecommerce</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
          {{-- <a class="nav-link" href="{{ route('admin.logout') }}">Sign out</a> --}}
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.dashobard.index')}}">
                    <i class="fa-solid fa-d pr-0.4"></i>ashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.category.index')}}">
                    <i class="fa-solid fa-c pr-0.4"></i>ategroies
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.subcategeory.index')}}">
                    <i class="fa-solid fa-s"></i>ubategroies
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.product.index')}}">
                    Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.order.index') }}">
                    <i class="fa-solid fa-o pr-0.4"></i>rders
                </a>
              </li>



              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.customer.index') }}">
                    <i class="fa-solid fa-users"></i>
                  Customers
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.admin.index') }}">
                    <i class="fa-solid fa-users"></i>
                  Admins
                </a>
              </li>



            </ul>



          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



          <h2 class="text-info font-weight-bold mt-2 p-2 text-center">@yield('title')</h2>

          <div class="table-responsive">

            @yield('content')
          </div>
        </main>
      </div>
    </div>



    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
