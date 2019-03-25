@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row h-100">
        <div class="col-12 col-md-10 mx-auto my-auto">
            <div class="card auth-card">
                <div class="position-relative image-side ">

                    <p class=" text-white h2">Lorem Ipsum</p>

                    <p class="white mb-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
                <div class="form-side">
                    <a href="{{ url('/') }}">
                        <img width="100%" src="{{ asset('img/placeholder/logo-placeholder.png') }}" alt="{{ config('app.name', 'Laravel') }}">
                    </a>
                    <h6 class="mb-4">Login</h6>
                    <form>
                        <label class="form-group has-float-label mb-4">
                            <input class="form-control" />
                            <span>E-mail</span>
                        </label>

                        <label class="form-group has-float-label mb-4">
                            <input class="form-control" type="password" placeholder="" />
                            <span>Password</span>
                        </label>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#">Forget password?</a>
                            <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection