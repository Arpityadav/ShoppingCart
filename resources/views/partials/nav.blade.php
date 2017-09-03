<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">SHOPPINGCART</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>

  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav ml-auto">

      <li class="nav-item float-right">

        <a class="nav-link" href="/cart"><i class="fa fa-cart-plus" aria-hidden="true"></i>

          Shopping Cart
          @if(request()->session()->has('cart'))

            <span class="badge badge-secondary">

              {{request()->session()->get('cart')->totalQuantity}}

            </span>
          @endif

         <span class="sr-only">(current)</span></a>

      </li>
      <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          <i class="fa fa-user" aria-hidden="true"></i> User Account

        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

          @if(auth()->check())
            <a class="dropdown-item" href="users/{{ auth()->user()->name }}">{{ auth()->user()->name }}</a>
            <a class="dropdown-item" href="/logout">Logout</a>

          @else
            <a class="dropdown-item" href="{{route('login')}}">Login</a>
            <a class="dropdown-item" href="{{ route('signup') }}">Signup</a>

          @endif

        </div>

      </li>
    </ul>
  </div>
</nav>
