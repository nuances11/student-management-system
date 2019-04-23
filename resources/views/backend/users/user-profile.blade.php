@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (auth()->user()->details->group->slug == "superadmin" || auth()->user()->details->group->slug == "admin")
                    <a href="{{ route('users.index') }}" class="d-block mb-3 back-link"> <span class="glyph-icon iconsmind-Arrow-OutLeft"></span> Back to list</a>
                @endif
                
                <h1>{{ strtoupper($user->name) }}</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/users') }}">Users</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($user->name) }}</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>


            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                @endif
            </div>
            @include('backend.users.user-profile-card')
        </div>
    </div>
@endsection


