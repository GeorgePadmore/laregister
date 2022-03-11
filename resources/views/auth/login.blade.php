@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-x-24">
    <!-- form -->
    <div class="pt-12 w-full">
        <p class="font-semibold text-3xl md:w-1/2 py-10">Welcome Back!</p>

        @include('message')

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- form fields -->

            <div class="grid grid-cols-1 pt-6 gap-x-6 gap-y-4">
                <input type="text" placeholder="Username" class="border rounded-lg px-4 py-3 outline-none @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                @error('username')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" placeholder="Password" class="border rounded-lg px-4 py-3 outline-none @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button class="py-3 bg-[#FBB3C1] rounded-lg font-bold">
                    Login
                </button>
            </div>

            <p class="text-gray-400 py-4 font-semibold">Don't have an account? <a href="{{ route('register') }}" class="text-gray-800 cursor-pointer">Register</a></p>
            <p class="text-gray-400 font-semibold">Forgot Password? <a href="#" class="text-gray-800 cursor-pointer">Reset Password</a></p>
        </form>
    </div>

    <!-- images -->
    <div class="hidden md:grid grid-rows-4 w-full h-full grid-cols-3 pt-16 gap-10 grid-flow-col m-10 place-self-end">
        <div></div>
        <div class="row-span-3 z-10 col-span-2 flex items-start justify-end">
            <img src="https://booking.luxetribes.com/images/background/back-8.jpeg" class="rounded-xl" alt="" />
        </div>
        <div class="row-span-3 z-10 flex flex-col justify-center gap-y-10">
            <img src="https://booking.luxetribes.com/images/background/back-7.png" class="object-cover rounded-lg h-auto w-auto rounded-lg" alt="" />
            <img src="https://booking.luxetribes.com/images/background/back-6.jpeg" class="object-cover h-auto w-auto rounded-xl" alt="" />
        </div>
        <div class="absolute right-0 h-full rounded-l-xl bg-gray-200 opacity-50 w-2/5">
        </div>
    </div>

</div>
@endsection
