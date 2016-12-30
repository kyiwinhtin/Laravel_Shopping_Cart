<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('product.index') }}">Shopping Cart</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="{{ route('product.shoppingCart') }}">
            <i class="fa fa-shopping-cart" aria-hidden="true">  Shooping Cart</i>
            <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true">    User Account </i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          @if(Auth::check())

            <li><a href="{{ route('user.profile') }}">User Profile</a></li>
            <li class="divider"></li>
            <li><a href="{{ route('user.logout') }}">Log Out</a></li>


          @else

            <li><a href="{{ route('user.signin') }}">Sign In</a></li>
            <li><a href="{{ route('user.signup') }}">Sing Up</a></li>

          @endif
  
            
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>