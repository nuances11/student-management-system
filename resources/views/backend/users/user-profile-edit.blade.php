@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

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
                @if (auth()->user()->details->group->slug == "superadmin" || auth()->user()->details->group->slug == "admin")
                    <div class="float-right">
                        <button type="button" data-url="{{ route('users.index') }}" class="btn btn-success mb-1">Back</button>
                    </div>                
                @endif
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
            </div>
            @include('backend.users.user-profile-card')
            <div class="col-md-6 col-sm-6 col-lg-5 col-12 mb-4">
                <div class="card  mb-4">
                    <div class="card-body">
                        <h5 class="mb-4">Edit Profile</h5>

                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @method('PATCH')
                            @csrf
                            @if (auth()->user()->id == $user->id)
                                @if (auth()->user()->details->group->slug == "superadmin" || auth()->user()->details->group->slug == "admin")
                                    <input type="hidden" name="user_groups_id" value="{{ $user->details->user_groups_id }}">
                                @endif
                            @else
                                <label class="form-group has-float-label">
                                    <select class="form-control" name="user_groups_id">
                                        <option value="">Select</option>
                                        
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}" {{ $user->details->user_groups_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                    <span>User Group</span>
                                </label>
                            @endif
                            

                            <label class="form-group has-float-label">
                                <input class="form-control" name="name" value="{{ $user->name }}">
                                <span>Name</span>
                            </label>

                            <label class="form-group has-float-label">
                                <input class="form-control" name="course" value="{{ $user->details->course }}">
                                <span>Course</span>
                            </label>

                            <label class="form-group has-float-label">
                                <input class="form-control" name="major" value="{{ $user->details->major }}">
                                <span>Major</span>
                            </label>

                            <label class="form-group has-float-label">
                                <input class="form-control" name="address" value="{{ $user->details->address }}">
                                <span>Address</span>
                            </label>

                            <label class="form-group has-float-label">
                                <select class="form-control" name="gender">
                                    <option value="">Select</option>
                                    <option value="Male" {{ ($user->details->gender == 'Male') ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ ($user->details->gender == 'Female') ? 'selected' : '' }}>Female</option>
                                </select>
                                <span>Gender</span>
                            </label>

                            <label class="form-group has-float-label">
                                <input class="form-control" name="dob" value="{{ $user->details->dob }}">
                                <span>Date of Birth</span>
                            </label>

                            <button class="btn btn-primary" type="submit">Update</button>
                            <button class="btn btn-default" data-url="{{ url("users/{$user->id}") }}" type="button">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


