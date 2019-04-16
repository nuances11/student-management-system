@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @php
                    $grade_param = Request::has('grade');
                    $section_param = Request::has('section');
                @endphp
                <a href="{{ url("schedule?grade={$grade_param}&section={$section_param}") }}" class="d-block mb-3 back-link"> <span class="glyph-icon iconsmind-Arrow-OutLeft"></span> Back to list</a>
                <h1>Schedule</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/schedule') }}">Schedule</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add New Schedule
                        </li>
                    </ol>
                </nav>
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

                        <div class="alert alert-danger" id="schedule-add-form-error" style="display:none"></div>
                        <div class="alert alert-success" id="schedule-add-form-success" style="display:none"></div>
                        {{-- <form method="POST" action="{{ route('schedule.store') }}" id="schedule-add-form"> --}}
                        <form method="POST" action="" id="schedule-add-form">
                            @csrf
                            <input type="hidden" name="grade_id" value="{{ Request::has('grade') }}">
                            <input type="hidden" name="section_id" value="{{ Request::has('section') }}">
                            <label class="form-group has-float-label">
                                <select class="form-control select2-single" id="schedule-user-select" name="user_id">
                                    <option label="&nbsp;">&nbsp;</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <span>User</span>
                            </label>

                            <label class="form-group has-float-label" id="schedule-subject-select-container" style="display:none">
                                <select class="form-control select2-single" id="schedule-subject-select" name="subject_id">
                                    <option label="&nbsp;">&nbsp;</option>
                                </select>
                                <span>Subject</span>
                            </label>

                            <label class="form-group has-float-label" id="schedule-time-select-container" style="display:none">
                                <select class="form-control select2-single" id="schedule-time-select" name="time_id">
                                    <option label="&nbsp;">&nbsp;</option>
                                </select>
                                <span>Time</span>
                            </label>

                            <label class="form-group has-float-label" id="schedule-day-select-container" style="display:none">
                                <select class="form-control select2-multiple" multiple="multiple" id="schedule-day-select" name="day_id[]">
                                    <option label="&nbsp;">&nbsp;</option>
                                </select>
                                <span>Day</span>
                            </label>

                            <button class="btn btn-primary" id="add-schedule-form-submit" style="display:none" type="submit">Add Schedule</button> 
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


