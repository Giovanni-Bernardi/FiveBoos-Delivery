{{-- REGISTER --}}
@extends('layouts.main-layout')

@section('content')

@include('components.header')
<main>
    <div id="login_area">
        <div id="box_login" class="animate__animated animate__zoomInDown animate__delay-1s">
            <div class="left" style="background-image: url(storage/placeholder/register-page.svg)"></div>
            <div class="right">
                <img id="hidden-logo" src="{{asset('/storage/assets/site-logo/loader.svg')}}" alt="">
                {{-- titolo --}}
                <h2>Registrazione</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- name --}}
                    <div class="floating-label">
                        <input type="text" placeholder="Nome" value="{{ old('firstname') }}" class="form-control"
                            name="firstname" required autofocus>
                        <label for="firstname">Nome</label>
                    </div>

                    {{-- cognome --}}
                    <div class="floating-label">
                        <input type="text" placeholder="Cognome" value="{{ old('lastname') }}" class="form-control"
                            name="lastname" required autofocus>
                        <label for="lastname">Cognome</label>
                    </div>

                    {{-- email --}}
                    <div class="floating-label">
                        <input id="email" type="email" placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">Email</label>
                    </div>

                    {{-- password --}}
                    <div class="floating-label">
                        <input id="password" type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                        <label for="password">Password</label>
                    </div>

                    {{-- confirm password--}}
                    <div class="floating-label">
                        <input id="password-confirm" type="password" placeholder="Conferma password"
                            class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <label for="password">Conferma password</label>
                    </div>

                    <button type="submit">REGISTRATI</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection