<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">         
         
           <div class="container">
               <a class="navbar-brand" href="">
                 BLOG
                </a>              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        
        </nav>
        <div class="container">
            <div class="row" style="margin-top:20px;">
                @if(Auth::check())
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{route('users')}}">All Users</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('user.create') }}">Create new user</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('profile') }}">My Profile</a>
                            </li>
                            @endif

                            <li class="list-group-item">
                                <a href="{{route('categories')}}">All Categories</a>
                            </li>                          

                            <li class="list-group-item">
                                <a href="{{route('posts')}}">All posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.trashed')}}">All trashed posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('tags')}}">Tags</a>
                            </li>
                            
                           
                            <li class="list-group-item">
                                <a href="{{ route('category.create') }}">Create new category</a>
                            </li>
                     
                            <li class="list-group-item">
                                <a href="{{ route('post.create') }}">Create new post</a>
                            </li>

                         
                            <li class="list-group-item">
                                <a href="{{ route('tag.create') }}">Create new tag</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{ route('setting') }}">Setting</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                @endif
                <div class="col-lg-8">
                <main class="py-4">
                  @if(session()->has('success_message'))
        <div class="alert alert-success">
        {{session()->get('success_message')}}
        </div>
        @endif
          
        </main>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

  
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/toastr.js') }}" ></script>
    <script>
  @if(Session::has('success_message'))
    toastr.success("{{Session::get('success_message')}}");
  @endif
  @if(Session::has('info_message'))
  //alert('{{Session::get('success_message')}}');
  toastr.info("{{Session::get('info_message')}}");
  @endif
  @if(Session::has('delete_message'))
    toastr.success("{{Session::get('delete_message')}}");
  @endif
</script>

@yield('scripts')

</body>
</html>
