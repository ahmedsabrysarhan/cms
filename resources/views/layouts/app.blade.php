<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CMS') }}</title>
    @include('layouts.style')
    
    
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

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

    @auth
        <div class="container">
            <div class="row">
                {{-- Sidebar --}}
                <div class="col-md-3 py-4">
                    {{-- @include('layouts.sidebar') --}}
                    @section('sidebar')
                    <ul class="list-group">
                        {{-- Users --}}
                        @if (auth()->user()->isAdmin())
                        <li class="list-group-item">
                            <a href="{{ route('users.index') }}">Users</a>
                        </li>
                        @endif
                        {{-- Categories --}}
                        <li class="list-group-item">
                            <a href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        {{-- Posts --}}
                        <li class="list-group-item">
                            <a href="{{ route('posts.index') }}">Posts</a>
                        </li>
                        {{-- Trashed Posts --}}
                        @if (auth()->user()->isAdmin())
                        <li class="list-group-item">
                            <a href="{{ route('posts.trashed') }}">Trashed Posts</a>
                        </li>
                        @endif
                        {{-- Tags --}}
                        <li class="list-group-item">
                            <a href="{{route('tags.index')}}">Tags</a>
                        </li>
                        {{-- Profile --}}
                        <li class="list-group-item">
                            <a href="{{route('users.editProfile' , Auth()->user()->id)}}">Profile</a>
                        </li>
                      </ul>
                    @show
                </div>
                {{-- Content --}}
                <div class="col-md-9">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    @else
        <div>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    @endauth

        

        
    </div>


    <!-- Scripts -->
    @include('layouts.script')

</body>
</html>
