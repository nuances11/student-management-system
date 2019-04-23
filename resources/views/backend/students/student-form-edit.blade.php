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
                                Student Details
                        </li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4">Update Details</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                        <div class="alert alert-danger" id="student-edit-form-error" style="display:none"></div>
                        <div class="alert alert-success" id="student-edit-form-success" style="display:none"></div>
                        <form method="POST" action="{{ route('student.update', $student->id) }}" id="student-edit-form">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-group has-float-label">
                                    <input class="form-control" id="lrn" name="lrn" value="{{ $student->lrn }}">
                                        <span>LRN</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-group has-float-label">
                                        <select class="form-control" name="status">
                                            <option value="">Select</option>
                                            <option value="new" {{ ($student->status == 'new') ? 'selected' : '' }}>New</option>
                                            <option value="old" {{ ($student->status == 'old') ? 'selected' : '' }}>Old</option>
                                            <option value="transfer" {{ ($student->status == 'transfer') ? 'selected' : '' }}>Transferee</option>
                                        </select>
                                        <span>Status</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-group has-float-label">
                                        <select class="form-control" name="is_aeta">
                                            <option value="">Select</option>
                                            <option value="1" {{ ($student->is_aeta == '1') ? 'selected' : '' }}>Aeta</option>
                                            <option value="0" {{ ($student->is_aeta == '0') ? 'selected' : '' }}>Not Aeta</option>
                                        </select>
                                        <span>Ethnic Group</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                    <input class="form-control" id="lname" name="lname" value="{{ $student->lname }}">
                                        <span>Last Name</span>
                                    </label>
                                </div>
    
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                    <input class="form-control" id="fname" name="fname" value="{{ $student->fname }}">
                                        <span>First Name</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                    <input class="form-control" id="mname" name="mname" value="{{ $student->mname }}">
                                        <span>Middle Name</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-group has-float-label">
                                        <select class="form-control" name="gender">
                                            <option value="">Select</option>
                                            <option value="m" {{ ($student->gender == 'm') ? 'selected' : '' }}>Male</option>
                                            <option value="f" {{ ($student->gender == 'f') ? 'selected' : '' }}>Female</option>
                                        </select>
                                        <span>Gender</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" name="dob" value="{{ $student->dob }}">
                                        <span>Date of Birth</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="mother_tounge" name="mother_tounge" value="{{ $student->mother_tounge }}">
                                        <span>Mother Tounge</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="ethnic_group" name="ethnic_group" value="{{ $student->ethnic_group }}">
                                        <span>Ethnic Group</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="religion" name="religion" value="{{ $student->religion }}">
                                        <span>Religion</span>
                                    </label>
                                </div>
                            </div>

                            <h3>Address</h3>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="address_street" name="address_street" value="{{ $student->address_street }}">
                                        <span>House#/Street/Sitio/Purok</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="address_barangay" name="address_barangay" value="{{ $student->address_barangay }}">
                                        <span>Barangay</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="address_municipality" name="address_municipality" value="{{ $student->address_municipality }}">
                                        <span>Municipality/City</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="address_province" name="address_province" value="{{ $student->address_province }}">
                                        <span>Province</span>
                                    </label>
                                </div>
                            </div>

                            <h3>Parents</h3>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_father" name="parent_father" value="{{ $student->parent_father }}">
                                        <span>Father's Name</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_father_age" name="parent_father_age" value="{{ $student->parent_father_age }}">
                                        <span>Father's Age</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_father_occupation" name="parent_father_occupation" value="{{ $student->parent_father_occupation }}">
                                        <span>Father's Occupation</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_mother" name="parent_mother" value="{{ $student->parent_mother }}">
                                        <span>Mother's Name</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_mother_age" name="parent_mother_age" value="{{ $student->parent_mother_age }}">
                                        <span>Mother's Age</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" id="parent_mother_occupation" name="parent_mother_occupation" value="{{ $student->parent_mother_occupation }}">
                                        <span>Mother's Occupation</span>
                                    </label>
                                </div>
                            </div>
                            @php
                                $siblings = unserialize($student->siblings);
                                $siblings_age = unserialize($student->siblings_age);
                                $siblings_details = unserialize($student->siblings_details);
                            @endphp

                            <h3>Brothers/Sisters <button type="button" id="add_siblings_entry" class="btn btn-xs btn-default">Add Entry</button></h3> 
                            <div class="row" id="siblings_entry">
                                        @if (isset($siblings))
                                            @for ($i = 0; $i < count($siblings); $i++)
                                                @if ($i > 0)
                                                    <div class="container single-entry">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                    <span style="font-size:60%;display:block;"><button id="remove-entry" class="btn btn-xs btn-danger">Remove Entry</button></span>
                                                                </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="form-group has-float-label">
                                                                    <input class="form-control" id="siblings" name="siblings[]" value="{{ $siblings[$i] }}">
                                                                    <span>Siblings</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="form-group has-float-label">
                                                                    <input class="form-control" id="siblings_age" name="siblings_age[]" value="{{ $siblings_age[$i] }}">
                                                                    <span>Age</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="form-group has-float-label">
                                                                    <input class="form-control" id="siblings_details" name="siblings_details[]" value="{{ $siblings_details[$i] }}">
                                                                    <span>Other Details</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="container single-entry">
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label class="form-group has-float-label">
                                                                    <input class="form-control" id="siblings" name="siblings[]" value="{{ $siblings[$i] }}">
                                                                    <span>Siblings</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="form-group has-float-label">
                                                                    <input class="form-control" id="siblings_age" name="siblings_age[]" value="{{ $siblings_age[$i] }}">
                                                                    <span>Age</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="form-group has-float-label">
                                                                    <input class="form-control" id="siblings_details" name="siblings_details[]" value="{{ $siblings_details[$i] }}">
                                                                    <span>Other Details</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <h3>Pangarap</h3>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-group has-float-label">
                                        <textarea class="form-control" id="goals" name="goals" cols="30" rows="10">{{ $student->goals }}</textarea>
                                        <span>Isalaysay</span>
                                    </label>
                                </div>
                            </div>
                            <h4>Requirements</h4>
                            <div class="row ml-2">
                                
                                <div class="custom-control custom-checkbox mb-3 mr-3">
                                    <input type="checkbox" class="custom-control-input" value="1" {{ ($student->has_card == 1) ? 'checked' : '' }} id="has_card" name="has_card">
                                    <label class="custom-control-label" for="has_card">Card/Form 137</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3 mr-3">
                                    <input type="checkbox" class="custom-control-input" value="1" {{ ($student->has_bc == 1) ? 'checked' : '' }} id="has_bc" name="has_bc">
                                    <label class="custom-control-label" for="has_bc">Birth Certificate</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3 mr-3">
                                    <input type="checkbox" class="custom-control-input" value="1" {{ ($student->has_others == 1) ? 'checked' : '' }} id="has_others" name="has_others">
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


