@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="mb-2">
                    <h1>Student Grade</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('/subjects') }}">Subjects</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $subject->name }}</li>
                        </ol>
                    </nav>
                </div>
                
                <div class="row">
                    <div class="col-12">
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div><br />
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-5 col-12 mb-4">
                            <div class="card ">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}<br>
                                            @endforeach
                                        </div>
                                    @endif
                                    <form method="POST" id="student-grades-form" action="{{ route('student-grades.store') }}">
                                        @csrf 
                                        <h2 class="mb-0">{{ strtoupper($student->lname) . ', ' . ucfirst($student->fname) }}</h2>
                                        <small class="mb-5">LRN : {{ $student->lrn }}</small>
                                        <hr>
                                        <h3 class="mb-3">{{ $subject->name }}</h3>
                                        <input type="hidden" name="grade_id" value="<?php echo $decrypted['grade_id'];?>">
                                        <input type="hidden" name="section_id" value="<?php echo $decrypted['section_id'];?>">
                                        <input type="hidden" name="subject_id" value="<?php echo $decrypted['subject_id'];?>">
                                        <input type="hidden" name="student_id" value="<?php echo $decrypted['student_id'];?>">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                        <label class="form-group has-float-label">
                                            <input type="number" value="{{ $grade ? $grade->first_period : old('first_period') }}" name="first_period" id="first_period" class="form-control grade_per_period">
                                            <span>First Period</span>
                                        </label>

                                        <label class="form-group has-float-label {{ ($grade && $grade->first_period > 0) ? '' : 'd-none' }}">
                                            <input type="number" value="{{ $grade ? $grade->second_period : '0' }}" name="second_period" id="second_period" class="form-control grade_per_period">
                                            <span>Second Period</span>
                                        </label>

                                        <label class="form-group has-float-label {{ ($grade && $grade->second_period > 0) ? '' : 'd-none' }}">
                                            <input type="number" value="{{ $grade ? $grade->third_period : '0' }}" name="third_period" id="third_period" class="form-control grade_per_period">
                                            <span>Third Period</span>
                                        </label>

                                        <label class="form-group has-float-label {{ ($grade && $grade->third_period > 0) ? '' : 'd-none' }} ">
                                            <input type="number" value="{{ $grade ? $grade->fourth_period : '0' }}" name="fourth_period" id="fourth_period" class="form-control grade_per_period">
                                            <span>Fourth Period</span>
                                        </label>

                                        <hr>
                                        <label class="form-group has-float-label">
                                            <input type="text" value="{{ $grade ? $grade->final_rating : '' }}" readonly name="final_rating" id="final_rating" class="form-control">
                                            <span>Final Rating</span>
                                        </label>
                    
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div> 
                    </div>
            </div>
        </div>
    </div>
@endsection


