{{-- PAG LOGIN --}}

@extends('layouts.main-layout')

@section('content')

@include('components.header')
<main>
    <div id="login_area">
        <div id="box_login" class="animate__animated animate__zoomInDown animate__delay-1s">
            <div class="left" style="background-image: url(storage/placeholder/login-page.svg)">
            </div>

            <div class="right">
                <img id="hidden-logo" src="{{asset('/storage/assets/site-logo/loader.svg')}}" alt="">
                <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="floating-label">
                        {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                            }}</label> --}}
                        <input id="email" type="email" placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        <label for="email">Email</label>
                    </div>

                    <div class="floating-label">
                        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                            }}</label> --}}
                        <input id="password" type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        <label for="password">Password</label>
                    </div>
                    <button type="submit">ACCEDI</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection