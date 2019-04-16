@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('student.index') }}" class="d-block mb-3 back-link"> <span class="glyph-icon iconsmind-Arrow-OutLeft"></span> Back to list</a>
                <h1>Student</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/student') }}">Students</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                                Add New Student
                        </li>
                    </ol>
                </nav>
                <div class="float-right">
                    <button type="button" data-url="{{ url('/student') }}" class="btn btn-success mb-1">Back</button>
                </div>
                <div class="separator mb-5"></div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">

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
                        <div class="alert alert-danger" id="student-add-form-error" style="display:none"></div>
                        <div class="alert alert-success" id="student-add-form-success" style="display:none"></div>
                        <form method="POST" action="{{ route('student.store') }}" id="student-add-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-group has-float-label">
                                    <input class="form-control" id="lrn" name="lrn" value="{{ old('lrn') }}">
                                        <span>LRN</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                    <input class="form-control" id="lname" name="lname" value="{{ old('lname') }}">
                                        <span>Last Name</span>
                                    </label>
                                </div>
    
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                    <input class="form-control" id="fname" name="fname" value="{{ old('fname') }}">
                                        <span>First Name</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                    <input class="form-control" id="mname" name="mname" value="{{ old('mname') }}">
                                        <span>Middle Name</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-group has-float-label">
                                        <select class="form-control" name="gender">
                                            <option value="">Select</option>
                                            <option value="m" {{ (old('gender') == 'Male') ? 'selected' : '' }}>Male</option>
                                            <option value="f" {{ (old('gender') == 'Female') ? 'selected' : '' }}>Female</option>
                                        </select>
                                        <span>Gender</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" name="dob" value="{{ old('dob') }}">
                                        <span>Date of Birth</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="mother_tounge" name="mother_tounge" value="{{ old('mother_tounge') }}">
                                        <span>Mother Tounge</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="ethnic_group" name="ethnic_group" value="{{ old('ethnic_group') }}">
                                        <span>Ethnic Group</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="religion" name="religion" value="{{ old('religion') }}">
                                        <span>Religion</span>
                                    </label>
                                </div>
                            </div>

                            <h3>Address</h3>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="address_street" name="address_street" value="{{ old('address_street') }}">
                                        <span>House#/Street/Sitio/Purok</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="address_barangay" name="address_barangay" value="{{ old('address_barangay') }}">
                                        <span>Barangay</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="address_municipality" name="address_municipality" value="{{ old('address_municipality') }}">
                                        <span>Municipality/City</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="address_province" name="address_province" value="{{ old('address_province') }}">
                                        <span>Province</span>
                                    </label>
                                </div>
                            </div>

                            <h3>Parents</h3>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_father" name="parent_father" value="{{ old('parent_father') }}">
                                        <span>Father's Name</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-7">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_mother" name="parent_mother" value="{{ old('parent_mother') }}">
                                        <span>Mother's Name</span>
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


