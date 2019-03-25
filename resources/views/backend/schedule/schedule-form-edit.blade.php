@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>School Year</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/schoolyears') }}">School Year</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $schoolyear->year}}
                        </li>
                    </ol>
                </nav>
                <div class="float-right">
                    <button type="button" data-url="{{ url('/schoolyears') }}" class="btn btn-success mb-1">Back</button>
                </div>
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

                        <form method="POST" action="{{ route('schoolyears.update', $schoolyear->id) }}">
                            @method('PATCH')
                            @csrf
                            <label class="form-group has-float-label">
                                <input class="form-control" id="year" name="year" value="{{ $schoolyear->year ? $schoolyear->year : '' }}">
                                <span>Year</span>
                            </label>
                            <div class="form-check mb-2 mr-sm-2">
                                <input class="form-check-input" type="checkbox" id="inlineFormCheck" name="is_active" value="1">
                                <label class="form-check-label" for="inlineFormCheck">
                                    Active Year
                                </label>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="javascript:void(0);" id="delete-btn" class="float-right text-red" style="color:red">Delete this schoolyear?</a>
                        </form>
                        <form id="delete-data-form" action="{{ route('schoolyears.destroy', $schoolyear->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


