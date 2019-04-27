@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h1 class="card-title">Welcome <strong>{{ strtoupper(auth()->user()->name) }} !</strong></h1>
                    <div class="icon-cards-row">
                        <div class="owl-container">
                            <div class="owl-carousel dashboard-numbers">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsmind-Calendar-4"></i>
                                        <p class="card-text mb-0">Current School Year</p>
                                        <p class="lead text-center">{{ $active_year }}</p>
                                    </div>
                                </a>
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsmind-Business-Mens"></i>
                                        <p class="card-text mb-0">Users</p>
                                        <p class="lead text-center">{{ $user_count }}</p>
                                    </div> 
                                </a>
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsmind-Business-Mens"></i>
                                        <p class="card-text mb-0">Students</p>
                                        <p class="lead text-center">{{ $student_count }}</p>
                                    </div> 
                                </a>
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsmind-Books-2"></i>
                                        <p class="card-text mb-0">Enrollments</p>
                                        <p class="lead text-center">{{ $enroll_count }}</p>
                                    </div> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Calendar</h5>
                    <div class="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
