@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="mb-2">
                    <h1>Subjects</h1>
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
                
                    @include('backend.subjects.template-parts.subject-assign')


            </div>
        </div>
    </div>
@endsection


