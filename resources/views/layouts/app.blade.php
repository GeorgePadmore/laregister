<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Luxe Tribes') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="mx-8 lg:mx-20">
    <div id="app">
        <div class="hidden px-8 md:px-16 pb-12 md:text-xs lg:text-base pt-8 font-semibold md:flex items-center justify-between">
        <p class="cursor-pointer hover:text-[#FBB3C1] duration-300">Group Trips</p>
        <p class="cursor-pointer hover:text-[#FBB3C1] duration-300">Private Trips</p>
        <p class="cursor-pointer hover:text-[#FBB3C1] duration-300">Past trips & reviews</p>
        <p class="text-3xl pb-2 cursor-pointer">Luxe Tribes</p>
        <p class="cursor-pointer hover:text-[#FBB3C1] duration-300">About Us</p>
        <p class="cursor-pointer hover:text-[#FBB3C1] duration-300">FAQs</p>
        <p class="cursor-pointer hover:text-[#FBB3C1] duration-300">Blog</p>
        <p class="cursor-pointer hover:text-[#FBB3C1] duration-300">Contact Us</p>
        <button
            class="border rounded-lg hover:border-[#FBB3C1] hover:bg-[#FBB3C1] p-2 border-gray-800 hover:text-white duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>


        @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}"
                    class="flex items-center space-x-2 border border-gray-800 rounded-lg py-2 px-4 hover:border-[#FBB3C1] hover:bg-[#FBB3C1] hover:text-white duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 font-bold" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <p>{{ __('Login') }}</p>
                </a>
            @endif

            @if (Route::has('register'))
                
                <a href="{{ route('register') }}"
                    class="flex items-center space-x-2 border border-gray-800 rounded-lg py-2 px-4 hover:border-[#FBB3C1] hover:bg-[#FBB3C1] hover:text-white duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 font-bold" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <p>{{ __('Register') }}</p>
                </a>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
       
    </div>

    <main class="py-4">        
        @yield('content')
    </main>
    
</body>
</html>
