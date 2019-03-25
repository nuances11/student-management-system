@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <h1>User</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/users') }}">Users</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                                Add New User
                        </li>
                    </ol>
                </nav>
                <div class="float-right">
                    <button type="button" data-url="{{ url('/users') }}" class="btn btn-success mb-1">Back</button>
                </div>
                <div class="separator mb-5"></div>

            </div>
        </div>

        <div class="row">
            <div class="col-6">

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4">Add Details</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <h3>Primary Details</h3>

                            <label class="form-group has-float-label">
                                <select class="form-control" name="user_group">
                                    <option value="">Select</option>
                                    @foreach ($groups as $group)
                                        <option {{ (old('user_group') == $group->id ) ? 'selected' : '' }} value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <span>User Group</span>
                            </label>

                            <label class="form-group has-float-label">
                            <input class="form-control" id="name" name="name" value="{{ old('name') }}">
                                <span>Name</span>
                            </label>

                            <label class="form-group has-float-label">
                                <input class="form-control" id="email" name="email" value="{{ old('email') }}">
                                <span>Email</span>
                            </label>

                            <label class="form-group has-float-label">
                                <input class="form-control" type="password" id="password" name="password">
                                <span>Password</span> 
                            </label>

                            <label class="form-group has-float-label">
                                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                                <span>Confirm Password</span>
                            </label>

                            <div class="separator mb-5"></div>

                            <h3>Other Details</h3>

                            <label class="form-group has-float-label">
                                <input class="form-control" name="address" value="{{ old('address') }}">
                                <span>Address</span>
                            </label>

                            <label class="form-group has-float-label">
                                <select class="form-control" name="gender">
                                    <option value="">Select</option>
                                    <option value="Male" {{ (old('gender') == 'Male') ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ (old('gender') == 'Female') ? 'selected' : '' }}>Female</option>
                                </select>
                                <span>Gender</span>
                            </label>

                            <label class="form-group has-float-label">
                                <input class="form-control" name="dob" value="{{ old('dob') }}" placeholder="i.e. 1970-01-01">
                                <span>Date of Birth</span>
                            </label>

                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


