@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>User Groups</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/users') }}">Users</a>
                        </li>
                        <li class="breadcrumb-item">
                                <a href="{{ url('/users-groups') }}">User Groups</a>
                            </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $user_group->name }}
                        </li>
                    </ol>
                </nav>
                <div class="float-right">
                    <button type="button" data-url="{{ url('/users-groups') }}" class="btn btn-success mb-1">Back</button>
                </div>
                <div class="separator mb-5"></div>

            </div>
        </div>

        <div class="row">
            <div class="col-6">

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4">Update Details</h5>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br />
                                @endforeach
                        </div>
                        @endif

                        <form method="POST" action="{{ route('user-groups.update', $user_group->id) }}">
                            @method('PATCH')
                            
                            @csrf
                            <label class="form-group has-float-label">
                            <input class="form-control" id="name" name="name" value="{{ $user_group->name ? $user_group->name : '' }}">
                                <span>Name</span>
                            </label>

                            <label class="form-group has-float-label">
                                <input class="form-control" id="slug" name="slug" value="{{ $user_group->slug ? $user_group->slug : '' }}">
                                <span>Slug</span>
                            </label>

                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="javascript:void(0);" id="delete-btn" class="float-right text-red" style="color:red">Delete this user group?</a>
                        </form>
                        <form id="delete-data-form" action="{{ route('user-groups.destroy', $user_group->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


