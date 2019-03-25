@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="mb-2">
                    <h1>Subjects</h1>
                    <div class="float-sm-right">
                        <button type="button" data-url="{{ route('subjects.create') }}"  class="btn btn-lg btn-outline-primary top-right-button top-right-button-single">
                            Add Subject
                        </button>
                    </div>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Subjects</li>
                        </ol>
                    </nav>
                </div>
                
                    @include('backend.subjects.template-parts.subject-list')

                </div>

            </div>
        </div>
    </div>
@endsection


