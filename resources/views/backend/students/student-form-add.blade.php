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
                                <div class="form-group col-md-3">
                                    <label class="form-group has-float-label">
                                        <select class="form-control" name="status">
                                            <option value="">Select</option>
                                            <option value="new" {{ (old('status') == 'new') ? 'selected' : '' }}>New</option>
                                            <option value="old" {{ (old('status') == 'old') ? 'selected' : '' }}>Old</option>
                                            <option value="transfer" {{ (old('status') == 'transfer') ? 'selected' : '' }}>Transferee</option>
                                        </select>
                                        <span>Status</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-group has-float-label">
                                        <select class="form-control" name="is_aeta">
                                            <option value="">Select</option>
                                            <option value="1" {{ (old('is_aeta') == '1') ? 'selected' : '' }}>Aeta</option>
                                            <option value="0" {{ (old('is_aeta') == '0') ? 'selected' : '' }}>Not Aeta</option>
                                        </select>
                                        <span>Ethnic Group</span>
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
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_father" name="parent_father" value="{{ old('parent_father') }}">
                                        <span>Father's Name</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_father_age" name="parent_father_age" value="{{ old('parent_father_age') }}">
                                        <span>Father's Age</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_father_occupation" name="parent_father_occupation" value="{{ old('parent_father_occupation') }}">
                                        <span>Father's Occupation</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_mother" name="parent_mother" value="{{ old('parent_mother') }}">
                                        <span>Mother's Name</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_mother_age" name="parent_mother_age" value="{{ old('parent_mother_age') }}">
                                        <span>Mother's Age</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_mother_occupation" name="parent_mother_occupation" value="{{ old('parent_mother_occupation') }}">
                                        <span>Mother's Occupation</span>
                                    </label>
                                </div>
                            </div>
                            
                            <h3>Brothers/Sisters <button type="button" id="add_siblings_entry" class="btn btn-xs btn-default">Add Entry</button></h3> 
                            <div class="row" id="siblings_entry">
                                <div class="container single-entry">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="form-group has-float-label">
                                                <input class="form-control" id="siblings" name="siblings[]">
                                                <span>Siblings</span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-group has-float-label">
                                                <input class="form-control" id="siblings_age" name="siblings_age[]">
                                                <span>Age</span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-group has-float-label">
                                                <input class="form-control" id="siblings_details" name="siblings_details[]">
                                                <span>Other Details</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h3>Pangarap</h3>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-group has-float-label">
                                        <textarea class="form-control" id="goals" name="goals" cols="30" rows="10"></textarea>
                                        <span>Isalaysay</span>
                                    </label>
                                </div>
                            </div>
                            <h4>Requirements</h4>
                            <div class="row ml-2">
                                
                                <div class="custom-control custom-checkbox mb-3 mr-3">
                                    <input type="checkbox" class="custom-control-input" id="has_card" name="has_card">
                                    <label class="custom-control-label" for="has_card">Card/Form 137</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3 mr-3">
                                    <input type="checkbox" class="custom-control-input" id="has_bc" name="has_bc">
                                    <label class="custom-control-label" for="has_bc">Birth Certificate</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3 mr-3">
                                    <input type="checkbox" class="custom-control-input" id="has_others" name="has_others">
                                    <label class="custom-control-label" for="has_others">Others</label>
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


