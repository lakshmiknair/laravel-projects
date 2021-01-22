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
            
            <div class="row">
               
                     <div class="col-lg-4" >

                   <div  style="margin-top:60px;">
        <a   type="submit" class="btn btn-primary" href="{{route('discussions.create')}}">Creat a new discussion</a>
        </div>
        <div class="card"  style="margin-top:20px;margin-bottom:20px;">
            <div class="card-body" >
                     <ul class="list-group">
                      
                            <li class="list-group-item">
                                <a href="/forum">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=me">My Discussions</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=solved">Answered Discussion</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=unsolved">Unanswered Discussions</a>
                            </li>
                        </ul>
</div></div>
        @if(Auth::check())
        @if(Auth::user()->admin)
                    <div class="card"  style="margin-top:20px;margin-bottom:20px;">
            <div class="card-body" >
                     <ul class="list-group">
                      
                            <li class="list-group-item">
                                <a href="/channels">All Channels</a>
                            </li>
                            
                        </ul>
</div></div>
@endif
@endif

<div class="card">
<div class="card-header">Channels</div>
            <div class="card-body">
                        <ul class="list-group">
                         @foreach($channels as $channel)
                            <li class="list-group-item">
                                <a href="{{route('channel',['slug'=>$channel->slug])}}">{{$channel->title}}</a>
                            </li>
                            @endforeach
                        </ul>

                        </div></div>

                    </div>
              
                <div class="col-lg-8">
                    <main class="py-4" id="sessionId">
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
