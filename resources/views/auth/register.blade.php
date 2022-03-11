@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-x-24">
    <!-- form -->
    <div class="pt-12 w-full">
        <p class="font-semibold text-3xl md:w-1/2 py-10">Become a part of the Luxe Tribes!</p>

        @include('message')

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- file upload widget -->
            <div class="flex items-center space-x-4 border-b pb-8">
                <div class="rounded-full p-6 border">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-lg font-semibold">Add your photo (optional)</p>
                    <p class="text-xs pt-2 pb-1 text-gray-400">Supported formats: jpg, jpeg, png.</p>
                    <input type="file" class="outline-none cursor-pointer font-semibold" value="click to upload">
                </div>
            </div>

            <!-- form fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 pt-6 gap-x-6 gap-y-4">
                <input type="text" placeholder="Full name" class="border rounded-lg col-span-2 md:col-span-1 px-4 py-3 outline-none @error('name') is-invalid @enderror"  name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="date" placeholder="DOB" class="border rounded-lg px-4 col-span-2 md:col-span-1 py-3 outline-none @error('dob') is-invalid @enderror"  name="dob" value="{{ old('dob') }}" required>
                @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="text" placeholder="Username" class="border rounded-lg col-span-2 px-4 py-3 outline-none @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <select class="border rounded-lg col-span-2 md:col-span-1 px-4 py-3 outline-none @error('nationality') is-invalid @enderror"  name="nationality" value="{{ old('nationality') }}" required>
                    <option value="" selected>Select nationality</option>
                    <option value="CND">Canada</option>
                    <option value="GHA">Ghana</option>
                </select>

                @error('nationality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <input type="email" class="border rounded-lg px-4 py-3 col-span-2 md:col-span-1 outline-none  @error('email') is-invalid @enderror"
                    placeholder="Email" name="email" value="{{ old('email') }}" required>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="tel" class="border rounded-lg px-4 py-3 outline-none col-span-2 md:col-span-1 @error('mobile_number') is-invalid @enderror"
                    placeholder="Phone" name="mobile_number" value="{{ old('mobile_number') }}" required>
                
                @error('mobile_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" class="border rounded-lg px-4 py-3 col-span-2 md:col-span-1 outline-none  @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <textarea id="" cols="30" rows="10" placeholder="Tell us about you (optional)"
                    class="col-span-2 border rounded-lg px-4 py-3 outline-none @error('bio') is-invalid @enderror"  name="bio" value="{{ old('bio') }}" required></textarea>

                @error('bio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button class="col-span-2 py-3 bg-[#FBB3C1] rounded-lg font-bold">
                    Create my account
                </button>
            </div>

            <p class="text-gray-400 pt-4 pb-10 font-semibold">Already have an account? <a href="{{ route('login') }}"
                    class="text-gray-800 cursor-pointer">Log in</a></p>
        </form>
    </div>

    <!-- images -->
    <div
        class="hidden md:grid grid-rows-5 w-full h-full grid-cols-3 pt-16 gap-10 grid-flow-col m-10 place-self-end">
        <div></div>
        <div class="row-span-4 z-10 col-span-2 flex items-start justify-end">
            <img src="https://booking.luxetribes.com/images/background/back-4.svg" alt="" />
        </div>
        <div class="row-span-3 z-10 flex flex-col justify-center gap-y-10">
            <img src="https://booking.luxetribes.com/images/background/back-5.svg"
                class="object-cover rounded-lg h-auto w-auto" alt="" />
            <img src="https://booking.luxetribes.com/images/background/back-6.png"
                class="object-cover h-auto w-auto" alt="" />
        </div>
        <div class="absolute right-0 h-full rounded-l-xl bg-gray-200 opacity-50 w-2/5">
        </div>
    </div>

</div>
@endsection
