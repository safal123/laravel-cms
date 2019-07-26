<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    <div id="app">
        @include('layouts.navbar')
        <main class="py-4">
            @auth
                <div class="container">
                    @include('partials.message')
                    <div class="row">
                            <div class="col-md-3">
                                <ul class="list-group">
                                    @if(auth()->user()->isAdmin())
                                        <li class="list-group-item">
                                            <a href="{{ route('users.index') }}">Users</a>
                                        </li>
                                    @endif
                                    <li class="list-group-item">
                                        <a href="{{ route('posts.index') }}">Posts</a>
                                    </li>
                                    
                                    <li class="list-group-item">
                                        <a href="{{ route('categories.index') }}">Categories</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('tags.index') }}">Tags</a>
                                    </li>
                                </ul>
                                <ul class="list-group mt-4">
                                    <li class="list-group-item">
                                        <a href="{{ route('trashed-post.index') }}">Trashed Post</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                @yield('content')
                            </div>
                        </div>
                </div>
            @else
                @yield('content')
            @endauth
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('.alert').alert();
    </script>
    @yield('scripts')
</body>
</html>
