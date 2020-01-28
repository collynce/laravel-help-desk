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
                <a href="{{route('tickets.create')}}"
                   class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Create Ticket
                </a>
                <a href="{{route('tickets.index')}}"
                   class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    My Tickets
                </a>
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
                    FAQs
                </a>
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
    <div class="mt-2 mb-3 ml-5">
        <ul class="flex items-center justify-between flex-wrap p-3">
            <li class="flex-1 mr-2">
                <a class="text-center block border border-blue-500 rounded py-2 px-4  hover:bg-blue-700"
                   href="{{url('ticket')}}">My Tickets</a>
            </li>
            <li class="flex-1 mr-2">
                <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4"
                   href="#">Closed Tickets</a>
            </li>
            <li class="flex-1 mr-2">
                <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4"
                   href="{{route('tickets.create')}}">Create Ticket</a>
            </li>
        </ul>
    </div>
{{--    <div class="w-full h-full border shadow">--}}
{{--        <div class="flex">--}}
{{--            <div class="bg-blue-500 h-100 text-purple-lighter w-1/5 pb-6 hidden md:block">--}}
{{--                <div class="flex items-center mb-6 px-4">--}}
{{--                    <span class="bg-green rounded-full block w-2 h-2 mr-2"></span>--}}
{{--                    <span class="text-purple-lightest">Olivia</span>--}}
{{--                </div>--}}

{{--                <div class="px-4 mb-2 font-sans">Channels</div>--}}
{{--                <div class="bg-teal-dark mb-6 py-1 px-4 text-white font-semi-bold "><span class="pr-1 text-grey-light">#</span> general</div>--}}

{{--                <div class="px-4 mb-3 font-sans">Direct Messages</div>--}}

{{--                <div class="flex items-center mb-3 px-4">--}}
{{--                    <span class="bg-green rounded-full block w-2 h-2 mr-2"></span>--}}
{{--                    <span class="text-purple-lightest">Olivia Dunham <i class="text-grey text-sm">(me)</i></span>--}}
{{--                </div>--}}


{{--                <div class="flex items-center mb-3 px-4">--}}
{{--                    <span class="bg-green rounded-full block w-2 h-2 mr-2"></span>--}}
{{--                    <span class="text-purple-lightest">Adam Bishop</span>--}}
{{--                </div>--}}

{{--                <div class="flex items-center px-4 mb-6">--}}
{{--                    <span class="border rounded-full block w-2 h-2 mr-2"></span>--}}
{{--                    <span class="text-purple-lightest">killgt</span>--}}
{{--                </div>--}}


{{--                <div class="px-4 mb-3 font-sans">Applications</div>--}}

{{--            </div>--}}
{{--            <div class="w-full flex flex-col h-full">--}}
{{--                --}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="flex">
        @yield('content')
    </div>
</div>
</body>
</html>
