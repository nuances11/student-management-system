@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <h1>Schedule</h1>
                @if (Request::has('grade') && Request::has('section'))
                    <div class="float-md-right text-zero">
                        <button type="button" class="btn btn-outline-primary btn-lg mr-1" data-url="{{ url('/schedule/create?grade=' . Request::has('grade') . '&section=' . Request::has('section')) }}">ADD NEW</button>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="form-group has-top-label">
                            <select class="form-control select2-single" id="gradeSelected">
                                <option value="">Select grade</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                            <span>GRADE</span>
                        </label>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-group has-top-label">
                            <select class="form-control select2-single" id="sectionSelected">
                                <option value="">Sample grade</option>
                            </select>
                            <span>SECTION</span>
                        </label>
                    </div>
                    <div class="form-group col-md-4">
                        <button class="btn btn-primary" id="schedule-filter-submit" type="submit">Submit form</button>
                    </div>
                </div>
            </div>

            <div class="separator mb-5"></div>

            <table width="100%" class="table table-primary table-bordered text-center table-schedule">
                <thead>
                    <tr>
                        <td>TIME</td>
                        <td>Monday</td>
                        <td>Tuesday</td>
                        <td>Wednesday</td>
                        <td>Thursday</td>
                        <td>Friday</td>
                    </tr>
                </thead>
                <tbody>
                    
                    @if (Request::has('grade') && Request::has('section'))
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($getHours as $key => $value)
                            
                            <tr>
                                <td>{{ $value }}</td>
                                <td>
                                    @foreach ($schedules as $sched)
                                        @if ($sched->day_id == 0 && $sched->time_id == $key)
                                            <strong>
                                                {{ strtoupper($sched->subject->name) }}
                                            </strong>
                                            <p class="text-small text-muted">
                                                {{ $sched->user->name }}
                                            </p>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($schedules as $sched)
                                        @if ($sched->day_id == 1 && $sched->time_id == $key)
                                            <strong>
                                                {{ strtoupper($sched->subject->name) }}
                                            </strong>
                                            <p class="text-small text-muted">
                                                {{ $sched->user->name }}
                                            </p>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($schedules as $sched)
                                        @if ($sched->day_id == 2 && $sched->time_id == $key)
                                            <strong>
                                                {{ strtoupper($sched->subject->name) }}
                                            </strong>
                                            <p class="text-small text-muted">
                                                {{ $sched->user->name }}
                                            </p>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($schedules as $sched)
                                        @if ($sched->day_id == 3 && $sched->time_id == $key)
                                            <strong>
                                                {{ strtoupper($sched->subject->name) }}
                                            </strong>
                                            <p class="text-small text-muted">
                                                {{ $sched->user->name }}
                                            </p>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($schedules as $sched)
                                        @if ($sched->day_id == 4 && $sched->time_id == $key)
                                            <strong>
                                                {{ strtoupper($sched->subject->name) }}
                                            </strong>
                                            <p class="text-small text-muted">
                                                {{ $sched->user->name }}
                                            </p>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        @php
                            $i++;
                        @endphp
                    @else
                        <tr>
                            <td colspan="6">
                                NO SCHEDUL AVAILABLE
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection


