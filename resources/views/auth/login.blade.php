@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row h-100">
        <div class="col-12 col-md-10 mx-auto my-auto">
            <div class="card auth-card">
                <div class="position-relative image-side ">
                    <a href="{{ url('/') }}">
                        <img width="200px" src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}">
                    </a>
                </div>
                <div class="form-side">
                    <h6 class="mb-4">Login</h6>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                        
                        <label class="form-group has-float-label mb-4">
                            <input class="form-control" name="email" value="{{ old('email') }}" required autofocus />
                            <span>{{ __('E-Mail') }}</span>
                        </label>

                        @if ($errors->has('password'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif

                        <label class="form-group has-float-label mb-4">
                            <input class="form-control" type="password" name="password" required />
                            <span>{{ __('Password') }}</span>
                        </label>
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <a href="#">Forget password?</a> --}}
                            <button class="btn btn-primary btn-lg btn-shadow" type="submit">{{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


