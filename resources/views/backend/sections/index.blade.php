@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>Section</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Section</li>
                    </ol>
                </nav>
                <div class="float-right">
                    <button type="button" data-url="{{ route('sections.create') }}" class="btn btn-outline-primary mb-1">Add Section</button>
                </div>
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
                <table class="table table-bordered" id="section-table">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Section</td>
                        <td>Grade</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
@endsection


