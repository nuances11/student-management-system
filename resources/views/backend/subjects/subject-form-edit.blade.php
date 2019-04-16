@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('subjects.index') }}" class="d-block mb-3 back-link"> <span class="glyph-icon iconsmind-Arrow-OutLeft"></span> Back to list</a>
                <h1>Subjects</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/subjects') }}">Subjects</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $subject->name }}
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
                        <h5 class="mb-4">Update Details</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br />
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('subjects.update', $subject->id) }}">
                            @method('PATCH')
                            @csrf
                            <label class="form-group has-float-label">
                                <input class="form-control" id="name" name="name" value="{{ $subject->name ? $subject->name : '' }}">
                                <span>Name</span>
                            </label>

                            <label class="form-group has-float-label">
                                <select class="form-control" name="grade_id">
                                    <option value="">Select</option>
                                    @foreach ($grades as $grade)
                                        <option {{ $subject->grade_id == $grade->id ? 'selected' : '' }} value="{{ $grade->id }}">{{ ucfirst($grade->name) }}</option>
                                    @endforeach
                                </select>
                                <span>Grade</span>
                            </label>

                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="javascript:void(0);" id="delete-btn" class="float-right text-red" style="color:red">Delete this subject?</a>
                        </form>
                        <form id="delete-data-form" action="{{ route('subjects.destroy', $subject->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


