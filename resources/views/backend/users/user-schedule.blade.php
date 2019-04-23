@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (auth()->user()->details->group->slug == "superadmin" || auth()->user()->details->group->slug == "admin")
                    <a href="{{ route('users.index') }}" class="d-block mb-3 back-link"> <span class="glyph-icon iconsmind-Arrow-OutLeft"></span> Back to list</a>
                @endif
                {{-- <a href="{{ route('users.index') }}" class="d-block mb-3 back-link"> <span class="glyph-icon iconsmind-Arrow-OutLeft"></span> Back to list</a> --}}
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
            <div class="col-md-12 col-sm-12 col-lg-9 col-12 mb-4">
                <div class="card ">
                    <div class="card-body">
                        <table class="table table-bordered" width="100%">
                            <thead>
                                <tr class="text-center" style="background-color: #576a3d; color: #fff">
                                    <td>TIME</td>
                                    <td>DAY</td>
                                    <td>GRADE</td>
                                    <td>SECTION</td>
                                    <td>SUBJECT</td>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($schedules as $sched)
                                    <tr>
                                        <td>{{ $sched->time->hour }}</td>
                                        <td>{{ $sched->day->day }}</td>
                                        <td>{{ $sched->grade->name }}</td>
                                        <td>{{ $sched->section->section }}</td>
                                        <td>{{ $sched->subject->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


