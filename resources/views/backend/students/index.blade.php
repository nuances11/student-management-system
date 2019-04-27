@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>Stuents</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Students</li>
                    </ol>
                </nav>
                <div class="float-right">
                    <button type="button" data-url="{{ url('student/create') }}" class="btn btn-outline-primary mb-1">Add Student</button>
                </div>
                <div class="separator mb-5"></div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <table class="table table-bordered" id="students-table">
                    <thead>
                        <tr>
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


