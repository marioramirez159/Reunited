@extends('layouts.master-without-nav')
@section('title') {{ __("Login") }} @endsection
@section('body')
<body>
@endsection
@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="{{ URL::asset('assets/images/logos/ehospital3.jpeg') }}" height="150px" alt=""/>
                        </div>
                    </div>
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="{{ url('login') }}">
                                    @csrf
                                    @if ($msg = Session::get('error'))
                                        <div class="alert alert-danger">
                                            <span> {{ $msg }} </span>
                                        </div>
                                    @endif
                                    @if ($msg = Session::get('success'))
                                        <div class="alert alert-success">
                                            <span> {{ $msg }} </span>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="username" style="font-size: 1.1em;">{{ __("Usuario") }}</label>
                                        <input name="email" type="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            @if (old('email')) value="{{ old('email') }}" @else value="receptionist@themesbrand.website" @endif id="username" placeholder="Escribe tu usuario"
                                            autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="userpassword"  style="font-size: 1.1em;">{{ __("Contraseña") }}</label>
                                        <input type="password" name="password" id="pass"
                                            class="form-control  @error('password') is-invalid @enderror"
                                            id="userpassword" @if (old('password')) value="{{ old('password') }}" @else value="receptionist@123456" @endif placeholder="Escribe la contraseña">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember"
                                            id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline"  style="font-size: 1.1em;">{{ __("Recordarme") }}</label>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit"  style="font-size: 1.1em;">{{ __("Entrar") }}</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <a href="{{ url('forgot-password') }}" class="text-muted"  style="font-size: 1.1em;"><i
                                                class="mdi mdi-lock mr-1"></i> {{ __("¿Olvido su contraseña?") }}</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        {{--<p>{{ __("Don't have an account ?") }} <a href="{{ url('register') }}"
                                class="font-weight-medium text-primary"> {{ __("Sign Up here") }}</a> </p>--}}
                        <p style="font-size: 1.1em;">© {{ date('Y') }} {{ config('app.name'); }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection
