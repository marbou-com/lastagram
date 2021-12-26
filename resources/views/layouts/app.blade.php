<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <script src="https://www.gstatic.com/charts/loader.js"></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div>
            @auth
                @include('layouts._header')
            @endauth
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        @auth
                            @foreach($users as $user)
                            <div class="c-post-block" style="height: auto;">
                                <div class="post">
                                    <div class="name">
                                        <a href="{{ route('users.show', ['user'=>$user->id]) }}">
                                            <img src="{{ asset('storage/images/img/'.$user->logo_url) }}" class="profile-img" style="width: 10%;"/>
                                            <p>
                                                {{ $user->name }}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endauth
                    </div>
                    @yield('content')
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
