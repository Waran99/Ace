<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link href="{{asset('bs5/bootstrap.min.css')}}" rel="stylesheet" />
	<script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bs5/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container">
	    <a class="navbar-brand" href="{{url('/')}}">ACE</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	      <div class="navbar-nav ms-auto">
              @if(\Illuminate\Support\Facades\Auth::guard('customer')->user() !== null)
                  <a class="nav-link" href="{{url('profile')}}">My Profile</a>
                  <a class="nav-link" href="{{route('customer.bookings')}}">My Bookings</a>
                  <a class="nav-link" href="{{url('logout')}}">Logout</a>
              @else
                <a class="nav-link" href="{{url('login')}}">Login</a>
                <a class="nav-link" href="{{url('register')}}">Register</a>
              @endif
	      </div>
	    </div>
	  </div>
	</nav>
		<main>
            @livewireStyles
			@yield('content')
		</main>
    @livewireScripts
	</body>
</html>
