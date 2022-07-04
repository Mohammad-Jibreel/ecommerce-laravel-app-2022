<x-app-layout>
    <x-slot name="header">
        <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link " href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.show',Auth::id())}}">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('order.index')}}">Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('address.show',Auth::id()) }}" tabindex="-1">Address</a>
            </li>
          </ul>
    </x-slot>


    @yield('content')


    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<div class="d-flex align-items-start">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</x-app-layout>
