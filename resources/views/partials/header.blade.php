<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <li><a class="nav-link active" href="{{ url('/blog') }}">Home</a></li>
      <li><a class="nav-link" href="{{ url('/blog/about') }}">About</a></li>
      <li><a class="nav-link" href="{{ url('/blog/contact') }}">Contact</a></li>
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown ml-auto">
                <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                </ul>
            </li>
        @endif
    </nav>
  </div>
</div>

<div class="blog-header">
  <div class="container">
    <h1 class="blog-title">The Bootstrap Blog</h1>
    <p class="lead blog-description">
    	<a href="{{ url('/blog/posts/create') }}" class="btn btn-outline-info" title="">Create Post</a>
    </p>
  </div>
</div>