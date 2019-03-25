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
                        <li class="breadcrumb-item">
                            <a href="{{ url('/sections') }}">Sections</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add New Section
                        </li>
                    </ol>
                </nav>
                <div class="float-right">
                    <button type="button" data-url="{{ url('/sections') }}" class="btn btn-success mb-1">Back</button>
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
                        <form method="POST" action="{{ route('sections.store') }}">
                            @csrf
                            <label class="form-group has-float-label">
                                <input class="form-control" id="section" name="section" value="{{ old('section') }}">
                                <span>Section</span>
                            </label>
                            <label class="form-group has-float-label">
                                <select class="form-control" name="grade_id">
                                    <option value="">Select</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ ucfirst($grade->name) }}</option>
                                    @endforeach
                                </select>
                                <span>Grade</span>
                            </label>

                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


