<html>
<head>
    <title>SIM Activation</title>
    <link href="https://cdn.auth0.com/styleguide/4.8.10/index.min.css" rel="stylesheet" />
</head>
<body>

  <header class="site-header">
    <nav role="navigation" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
           <h1 class="navbar-brand"><a href="/"><span>Iristel</span></a></h1>
        </div>
        <div id="navbar-collapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">

            @if(!$isLoggedIn)
            <li><a href="{{ route('login') }}" class="signin-button login">Login</a></li>
            @else
				 <li class="li-docs no-basic"> <h4 style=" margin-top: 20px;">{{ Auth::user()->name }}</h4></li>
            <li class="li-docs no-basic"><a href="{{ route('dump') }}">Dump User</a></li>
           
            <li><a href="{{ route('logout') }}" class="signin-button login">Logout</a></li>
            @endif

          </ul>
        </div>
      </div>
    </nav>
  </header>

<div class="container">

    @yield('content')
</div>
</body>
</html>