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
                            <li class="breadcrumb-item active" aria-current="page">Assign Subjects</li>
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
                        <div class="col-md-6 col-sm-6 col-lg-3 col-12 mb-4">
                            <div class="card ">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}<br>
                                            @endforeach
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('subject-assign.store') }}">
                                        @csrf 
                                        <h2 class="mb-0">Student Name</h2>
                                        <small class="mb-5">LRN : 1312312312312</small>
                                        <hr>
                                        <label class="form-group has-float-label">
                                            <input type="text" name="first_period" id="first_period" class="form-control">
                                            <span>First Period</span>
                                        </label>

                                        <label class="form-group has-float-label">
                                            <input type="text" name="second_period" id="second_period" class="form-control">
                                            <span>Second Period</span>
                                        </label>

                                        <label class="form-group has-float-label">
                                            <input type="text" name="third_period" id="third_period" class="form-control">
                                            <span>Third Period</span>
                                        </label>

                                        <label class="form-group has-float-label">
                                            <input type="text" name="fourth_period" id="fourth_period" class="form-control">
                                            <span>Fourth Period</span>
                                        </label>

                                        <hr>
                                        <label class="form-group has-float-label">
                                            <input type="text" readonly disabled name="final_rating" id="final_rating" class="form-control">
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


