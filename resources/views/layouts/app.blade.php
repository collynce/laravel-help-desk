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
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/>
            </svg>
            <span class="font-semibold text-xl tracking-tight"><a href="{{ url('/') }}">CyHelp</a></span>
        </div>
        <div class="block lg:hidden">
            <button
                class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>
                        Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                @if(auth()->user())
                    <a href="{{route('tickets.create')}}"
                       class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        Create Ticket
                    </a>
                @endif
            </div>
            <div>
                @guest
                    <a href="{{ route('login') }}"
                       class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        {{ __('Login') }}
                    </a>
                    @if (Route::has('register'))
                        <a class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4"
                           href="{{ route('register') }}">{{ __('Register') }}
                        </a>
                    @endif
                @else
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                       class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">{{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </a>
                @endguest
            </div>
        </div>
    </nav>
    <div class="flex justify-between">
        @if(auth()->user())
            <div class="flex-2  w-1/6 h-full ">
                <div class="absolute w-1/6 h-full">
                    <div class="absolute inset-y-0 w-full left-0 bg-gray-600">
                        <ul class="list-reset">
                            <li>
                                <a class="block p-4 text-gray-400   border-purple hover:bg-grey-lighter "
                                   href="{{url('ticket')}}">Dashboard</a>
                            </li>
                            @if (auth()->user()->hasRole('admin'))
                                <li>
                                    <a class="block p-4 text-gray-400   border-purple hover:bg-grey-lighter "
                                       href="{{route('alltickets.index')}}">Tickets</a>
                                </li>
                            @endif
                            <li>
                                <a class="block p-4 text-gray-400  border-purple hover:bg-grey-lighter"
                                   href="{{route('tickets.create')}}">Create Ticket</a>
                            </li>
                            @if (auth()->user()->hasRole('admin'))
                                <li>
                                    <a class="block p-4 text-gray-400  border-purple hover:bg-grey-lighter"
                                       href="{{url('/allroles')}}">User Management</a>
                                </li>
                                <li>
                                    <a class="block p-4 text-gray-400  border-purple hover:bg-grey-lighter"
                                       href="{{route('category.index')}}">Ticket Categories</a>
                                </li>
                                <li>
                                    <a class="block p-4 text-gray-400  border-purple hover:bg-grey-lighter"
                                       href="{{url('/engineer/all')}}">IT Engineers</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="w-10/12 mx-auto px-4 py-2 m-2">
            <div class="flex">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
