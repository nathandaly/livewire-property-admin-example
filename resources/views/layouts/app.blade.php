<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}{{ !empty($pageTitle) ? ' - ' . $pageTitle : '' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('header-scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark-indigo shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img width="100" src="{{ asset('img/twindig-logo-fc-rev.svg') }}" alt="Twindig">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="mr-auto navbar-nav">
                        @auth
                            @can('view users')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
                            </li>
                            @endcan

                            @canany(['view developers', 'view developer-regions', 'view developments'])
                            <li class="nav-item dropdown">
                                <a id="developerDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Developers') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="developerDropdown">
                                    @can('view developers')<a class="dropdown-item" href="{{ route('developers.index') }}">{{ __('Developers') }}</a>@endcan
                                    @can('view developer-regions')<a class="dropdown-item" href="{{ route('developer-regions.index') }}">{{ __('Developer Regions') }}</a>@endcan
                                    @can('view developments')<a class="dropdown-item" href="{{ route('developments.index') }}">{{ __('Developments') }}</a>@endcan
                                </div>
                            </li>
                            @endcanany
                            @canany(['view agents', 'view branches'])
                            <li class="nav-item dropdown">
                                <a id="agentDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Agents') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="agentDropdown">
                                    @can('view agents')<a class="dropdown-item" href="{{ route('agents.index') }}">{{ __('Agents') }}</a>@endcan
                                    @can('view branches')<a class="dropdown-item" href="{{ route('branches.index') }}">{{ __('Branches') }}</a>@endcan
                                </div>
                            </li>
                            @endcanany
                            @can('view pages')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pages.index') }}">{{ __('Pages') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('articles.index') }}">{{ __('Articles') }}</a>
                            </li>
                            @endcan
                            @can('view properties')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('properties.overview') }}">{{ __('Properties') }}</a>
                            </li>
                            @endcan
                            @can('view reports')
                            <li class="nav-item dropdown">
                                <a id="agentDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Reports') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="agentDropdown">
                                    @can('view reports')<a class="dropdown-item" href="{{ route('reports.profile-completeness') }}">{{ __('Profile Completeness Report') }}</a>@endcan
                                    @can('view reports')<a class="dropdown-item" href="{{ route('reports.recently-created-properties') }}">{{ __('Recently Created Properties') }}</a>@endcan
                                    @can('view reports')<a class="dropdown-item" href="{{ route('stats.overview') }}">{{ __('The Codling Report') }}</a>@endcan
                                </div>
                            </li>
                            @endcan
                            @canany(['view roles', 'view permissions'])
                                <li class="nav-item dropdown">
                                    <a id="developerDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Roles & Permissions') }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="developerDropdown">
                                        @can('view roles')<a class="dropdown-item" href="{{ route('roles.index') }}">{{ __('Roles') }}</a>@endcan
                                        @can('view permissions')<a class="dropdown-item" href="{{ route('permissions.index') }}">{{ __('Permissions') }}</a>@endcan
                                    </div>
                                </li>
                            @endcanany
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->businessUserAccounts->count())
                                    <a class="dropdown-item" href="{{ route('account.selection') }}">Change Account</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            @yield('content')
        </main>
    </div>
</body>
</html>
