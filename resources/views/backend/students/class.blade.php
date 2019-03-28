@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>Student Class</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Student Class</li>
                    </ol>
                </nav>
                <div class="float-right">
                    <button type="button" data-url="{{ url('student/create') }}" class="btn btn-outline-primary mb-1">Add Student</button>
                </div>
                <div class="separator mb-5"></div>

            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Add Student to Class</h5>

                            <form action="">
                                <label class="form-group has-float-label" id="student-class-grade-select">
                                    <select class="form-control select2-single">
                                        <option label="&nbsp;">&nbsp;</option>
                                    </select>
                                    <span>Grade</span>
                                </label>
                                <label class="form-group has-float-label" id="student-class-section-select">
                                    <select class="form-control select2-single" disabled>
                                        <option label="&nbsp;">&nbsp;</option>
                                    </select>
                                    <span>Section</span>
                                </label>
                                <label class="form-group has-float-label" id="student-class-student-select">
                                    <select class="form-control select2-single">
                                        <option label="&nbsp;">&nbsp;</option>
                                        <option label="&nbsp;">Add New</option>
                                    </select>
                                    <span>Student</span>
                                </label>
                                <button class="btn btn-primary" type="submit">Add Student</button>
                            </form>
                        </div>
                </div>
            </div>
            <div class="col-8">

                <table class="table table-bordered" id="students-table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>LRN</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
@endsection


