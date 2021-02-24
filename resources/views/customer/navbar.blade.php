<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Tireshop</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{route('index')}}" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="{{route('winter')}}">Winter</a>
                <a class="dropdown-item" href="{{route('temporaryspares')}}">Temporary Spares</a>
                <a class="dropdown-item" href="{{route('trailer')}}">Trailer</a>
                <a class="dropdown-item" href="{{route('atvutv')}}">Atv/Utv</a>
                <a class="dropdown-item" href="{{route('lawngarden')}}">Lawn & Garden</a>								
              </div>
            </li>
            @if(session('logged') == true)
            <li class="nav-item active"><a href="{{route('Recommender')}}" class="nav-link">What's Hot</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="{{route('EditProfile')}}">Edit Profile</a>
                <a class="dropdown-item" href="{{route('ChangePasswordView')}}">Change Password</a>
                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
               							
              </div>
            </li>
            @else
	          <li class="nav-item"><a href="{{route('LoginCustomer')}}" class="nav-link">login</a></li>
            @endif
	          <li class="nav-item cta cta-colored"><a href="{{route('CartPreview')}}" class="nav-link"><span class="icon-shopping_cart"></span>[@if(empty(session('order')))0 @else{{count(session('order'))}}@endif]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>