<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .card-table
    {
        font-size: 80%;
        border: 2px solid black;
    }
    .card-table tr td{
        padding:5px;
    }

    .grade-sheet div{
        border-bottom: 1px black;
        border-style: double
    }
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-center">
                <img src="{{ asset('img/deped-logo.png') }}" alt="" width="100">
            </div>
            <div class="col-md-8 text-center">
                <h5 class="mb-0 mt-0">Republika ng Pilipinas</h5>
                <p class="mb-0 mt-0">(Republic of the Philippines)</p>
                <h5 class="mb-0 mt-0">Kagawaran ng Edukasyon</h5>
                <p class="mb-0 mt-0">(Department of Education)</p>
                <h5 class="mb-0 mt-0">Rehiyon 03</h5>
                <p class="mb-0 mt-0">(Region 3)</p>
                <h5 class="mb-0 mt-0">SANGAY NG ZAMBALES</h5>
                <p class="mb-0 mt-0">(DIVISION OF ZAMBALES)</p>
                <h5>SAIN FRANCIS LEARNING CENTER FOUNDATION INC.</h5>
                <h5>PALAGIANG TALAAN SA MABABANG PAARALAN</h5>
                <p class="mb-0 mt-0">(ELEMENTARY SCHOOL PERMANENT RECORD)</p>
            </div>
            <div class="col-md-2 text-center">
                <img src="{{ asset('img/logo.png') }}" alt="" width="100">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-9">

            </div>
            <div class="col-md-3 mt-2">
                LRN : <strong><u>{{ $student->lrn }}</u> </strong>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-5">
                Pangalan (Name) : <strong><u>{{ strtoupper($student->fname . ' ' . $student->mname . ' ' . $student->lname) }}</u> </strong>
            </div>
            <div class="col-md-5">
                Petsa ng Pagpasok (Date of Entrance) : <strong><u>{{ date('m/d/Y', strtotime($student->created_at)) }}</u> </strong>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                Kasarian (Sex) : <strong><u>{{ strtoupper($student->gender) }}</u> </strong>
            </div>
            <div class="col-md-4">
                Petsa ng Kapanganakan : <strong><u>{{ date('m/d/Y', strtotime($student->dob)) }}</u> </strong>
                <span class="d-block">(Date of Birth)</span> 
            </div>
            <div class="col-md-6">
                Pook ng Kapanganakan : <strong><u>Sample Address</u> </strong>
                <span class="d-block text-center">(Place)Bayan/Lalawigan/Lungsod(Town/Province/City)</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Magulang/Tagapag-alaga : 
                <span class="d-block">(Parent/Guardian)</span>
            </div>
            @php
                $guardian_name = 'n/a';
                $guardian_occupation = 'n/a';

                
                if ($student->parent_father !== '') {
                    $guardian_name = $student->parent_father;
                    if ($student->parent_father_occupation !== '') {
                        $guardian_occupation = $student->parent_mother_occupation;
                    }
                }else if ($student->parent_mother  !== '') {
                    $guardian_name = $student->parent_mother;
                    if ($student->parent_mother_occupation !== '') {
                        $guardian_occupation = $student->parent_mother_occupation;
                    }
                    
                }
            @endphp
            <div class="col-md-3 text-center">
                <strong>{{ strtoupper($guardian_name) }} </strong>
                <span class="d-block"  style="border-top:1px solid black">Pangalan(Name)</span>
            </div>
            {{-- <div class="col-md-3 text-center">
                <strong>SAMPLE ADDRESS </strong>
                <span class="d-block"  style="border-top:1px solid black">Tirahan(Address)</span>
            </div> --}}
            
            <div class="col-md-3 text-center">
                <strong>{{ strtoupper($guardian_occupation) }}</strong>
                <span class="d-block"  style="border-top:1px solid black">Hanapbuhay(Occupation)</span>
            </div>
        </div>
        <div class="row text-center mt-3">
            <div class="col-md-12">
                <h5>PAGUNLAD SA MABABANG PAARALAN</h5>
                <p>(ELEMENTARY SCHOOL PROGRESS)</p>
            </div>
        </div>
        {{-- <div class="row mt-3">
            @foreach ($grades as $grade)
                @foreach ($grade_details as $detail)
                    @if ($grade->id == $detail->grade_id)
                        <div class="col-md-6">
                            {{ $grade->name }} School : 
                            <br>
                            School Year : {{ $detail->school_year->year }}
                            <br>
                            <table class="card-table" width="100%" border="1px">
                                    <tr class="text-center" style="font-weight: bolder">
                                        <td rowspan="2">Learning Address</td>
                                        <td colspan="4">Periodic Rating</td>
                                        <td rowspan="2">Final Rating</td>
                                        <td rowspan="2">Remarks</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    @php
                                        $grading_sheet = 11;
                                        $grade_count = 0;
                                    @endphp
                                    @for ($i = 0; $i < $grading_sheet; $i++)
                                        @php
                                            if($detail->grade_id == $grade->id)
                                            $grade_count++;
                                        @endphp
                                        @if ($i < count($grade_count))
                                            @php
                                                $remarks = ($detail->final_rating !== 0 && $detail->final_rating >= 75) ? 'Passed' : 'Failed';
                                            @endphp
                                            <tr>
                                                <td>{{ $detail->subject->name }}</td>
                                                <td>{{ $detail->first_period ? $detail->first_period : 0 }}</td>
                                                <td>{{ $detail->second_period ? $detail->second_period : 0 }}</td>
                                                <td>{{ $detail->third_period ? $detail->third_period : 0 }}</td>
                                                <td>{{ $detail->fourth_period ? $detail->fourth_period : 0 }}</td>
                                                <td><strong>{{ $detail->final_rating ? $detail->final_rating : 0 }}</strong></td>
                                                <td>{{ $remarks }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                        @endif
                                    @endfor
                            </table>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
        @php
            exit;
        @endphp --}}

        <div class="row mt-3 mb-5 grade-sheet">
            {{-- Grade One --}}
            <div class="col-md-6">
                Grade I - School
                <br>
                School Year : <strong>{{ $grade_one[0]->school_year->year }}</strong>
                <br>
                <table class="card-table" width="100%" border="1px">
                    <tr class="text-center" style="font-weight: bolder">
                        <td rowspan="2">Learning Address</td>
                        <td colspan="4">Periodic Rating</td>
                        <td rowspan="2">Final Rating</td>
                        <td rowspan="2">Remarks</td>
                    </tr>
                    <tr class="text-center">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    @php
                        $grading_sheet = 11;
                    @endphp
                    @for ($i = 0; $i < $grading_sheet; $i++)
                        @if ($i < count($grade_one))
                            @php
                                $remarks = ($grade_one[$i]->final_rating !== 0 && $grade_one[$i]->final_rating >= 75) ? 'Passed' : 'Failed';
                            @endphp
                            <tr>
                                <td>{{ $grade_one[$i]->subject->name }}</td>
                                <td>{{ $grade_one[$i]->first_period ? $grade_one[$i]->first_period : 0 }}</td>
                                <td>{{ $grade_one[$i]->second_period ? $grade_one[$i]->second_period : 0 }}</td>
                                <td>{{ $grade_one[$i]->third_period ? $grade_one[$i]->third_period : 0 }}</td>
                                <td>{{ $grade_one[$i]->fourth_period ? $grade_one[$i]->fourth_period : 0 }}</td>
                                <td><strong>{{ $grade_one[$i]->final_rating ? $grade_one[$i]->final_rating : 0 }}</strong></td>
                                <td>{{ $remarks }}</td>
                            </tr>
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> 
                        @endif
                    @endfor
                </table>
                <small>Eligible for Admission to Grade </small>
            </div>

            {{-- Grade Two --}}
            <div class="col-md-6">
                Grade 2 - School
                <br>
                School Year : <strong>{{ $grade_two[0]->school_year->year }}</strong>
                <br>
                <table class="card-table" width="100%" border="1px">
                    <tr class="text-center" style="font-weight: bolder">
                        <td rowspan="2">Learning Address</td>
                        <td colspan="4">Periodic Rating</td>
                        <td rowspan="2">Final Rating</td>
                        <td rowspan="2">Remarks</td>
                    </tr>
                    <tr class="text-center">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    @php
                        $grading_sheet = 11;
                    @endphp
                    @for ($i = 0; $i < $grading_sheet; $i++)
                        @if ($i < count($grade_two))
                            @php
                                $remarks = ($grade_two[$i]->final_rating !== 0 && $grade_two[$i]->final_rating >= 75) ? 'Passed' : 'Failed';
                            @endphp
                            <tr>
                                <td>{{ $grade_two[$i]->subject->name }}</td>
                                <td>{{ $grade_two[$i]->first_period ? $grade_two[$i]->first_period : 0 }}</td>
                                <td>{{ $grade_two[$i]->second_period ? $grade_two[$i]->second_period : 0 }}</td>
                                <td>{{ $grade_two[$i]->third_period ? $grade_two[$i]->third_period : 0 }}</td>
                                <td>{{ $grade_two[$i]->fourth_period ? $grade_two[$i]->fourth_period : 0 }}</td>
                                <td><strong>{{ $grade_two[$i]->final_rating ? $grade_two[$i]->final_rating : 0 }}</strong></td>
                                <td>{{ $remarks }}</td>
                            </tr>
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> 
                        @endif
                    @endfor
                </table>
                <small>Eligible for Admission to Grade </small>
            </div>
            {{-- Grade Three --}}
            <div class="col-md-6">
                Grade 3 - School
                <br>
                School Year : <strong>{{ (isset($grade_three[0])) ? $grade_three[0]->school_year->year : '' }}</strong>
                <br>
                <table class="card-table" width="100%" border="1px">
                    <tr class="text-center" style="font-weight: bolder">
                        <td rowspan="2">Learning Address</td>
                        <td colspan="4">Periodic Rating</td>
                        <td rowspan="2">Final Rating</td>
                        <td rowspan="2">Remarks</td>
                    </tr>
                    <tr class="text-center">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    @php
                        $grading_sheet = 11;
                    @endphp
                    @for ($i = 0; $i < $grading_sheet; $i++)
                        @if ($i < count($grade_three))
                            @php
                                $remarks = ($grade_three[$i]->final_rating !== 0 && $grade_three[$i]->final_rating >= 75) ? 'Passed' : 'Failed';
                            @endphp
                            <tr>
                                <td>{{ $grade_three[$i]->subject->name }}</td>
                                <td>{{ $grade_three[$i]->first_period ? $grade_three[$i]->first_period : 0 }}</td>
                                <td>{{ $grade_three[$i]->second_period ? $grade_three[$i]->second_period : 0 }}</td>
                                <td>{{ $grade_three[$i]->third_period ? $grade_three[$i]->third_period : 0 }}</td>
                                <td>{{ $grade_three[$i]->fourth_period ? $grade_three[$i]->fourth_period : 0 }}</td>
                                <td><strong>{{ $grade_three[$i]->final_rating ? $grade_three[$i]->final_rating : 0 }}</strong></td>
                                <td>{{ $remarks }}</td>
                            </tr>
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> 
                        @endif
                    @endfor
                </table>
                <small>Eligible for Admission to Grade </small>
            </div>
            {{-- Grade Four --}}
            <div class="col-md-6">
                Grade 4 - School
                <br>
                School Year : <strong>{{ (isset($grade_four[0])) ? $grade_four[0]->school_year->year : '' }}</strong>
                <br>
                <table class="card-table" width="100%" border="1px">
                    <tr class="text-center" style="font-weight: bolder">
                        <td rowspan="2">Learning Address</td>
                        <td colspan="4">Periodic Rating</td>
                        <td rowspan="2">Final Rating</td>
                        <td rowspan="2">Remarks</td>
                    </tr>
                    <tr class="text-center">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    @php
                        $grading_sheet = 11;
                    @endphp
                    @for ($i = 0; $i < $grading_sheet; $i++)
                        @if ($i < count($grade_four))
                            @php
                                $remarks = ($grade_four[$i]->final_rating !== 0 && $grade_four[$i]->final_rating >= 75) ? 'Passed' : 'Failed';
                            @endphp
                            <tr>
                                <td>{{ $grade_four[$i]->subject->name }}</td>
                                <td>{{ $grade_four[$i]->first_period ? $grade_four[$i]->first_period : 0 }}</td>
                                <td>{{ $grade_four[$i]->second_period ? $grade_four[$i]->second_period : 0 }}</td>
                                <td>{{ $grade_four[$i]->third_period ? $grade_four[$i]->third_period : 0 }}</td>
                                <td>{{ $grade_four[$i]->fourth_period ? $grade_four[$i]->fourth_period : 0 }}</td>
                                <td><strong>{{ $grade_four[$i]->final_rating ? $grade_four[$i]->final_rating : 0 }}</strong></td>
                                <td>{{ $remarks }}</td>
                            </tr>
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> 
                        @endif
                    @endfor
                </table>
                <small>Eligible for Admission to Grade </small>
            </div>
            {{-- Grade Five --}}
            <div class="col-md-6">
                Grade 5 - School
                <br>
                School Year : <strong>{{ (isset($grade_five[0])) ? $grade_five[0]->school_year->year : '' }}</strong>
                <br>
                <table class="card-table" width="100%" border="1px">
                    <tr class="text-center" style="font-weight: bolder">
                        <td rowspan="2">Learning Address</td>
                        <td colspan="4">Periodic Rating</td>
                        <td rowspan="2">Final Rating</td>
                        <td rowspan="2">Remarks</td>
                    </tr>
                    <tr class="text-center">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    @php
                        $grading_sheet = 11;
                    @endphp
                    @for ($i = 0; $i < $grading_sheet; $i++)
                        @if ($i < count($grade_five))
                            @php
                                $remarks = ($grade_five[$i]->final_rating !== 0 && $grade_five[$i]->final_rating >= 75) ? 'Passed' : 'Failed';
                            @endphp
                            <tr>
                                <td>{{ $grade_five[$i]->subject->name }}</td>
                                <td>{{ $grade_five[$i]->first_period ? $grade_five[$i]->first_period : 0 }}</td>
                                <td>{{ $grade_five[$i]->second_period ? $grade_five[$i]->second_period : 0 }}</td>
                                <td>{{ $grade_five[$i]->third_period ? $grade_five[$i]->third_period : 0 }}</td>
                                <td>{{ $grade_five[$i]->fourth_period ? $grade_five[$i]->fourth_period : 0 }}</td>
                                <td><strong>{{ $grade_five[$i]->final_rating ? $grade_five[$i]->final_rating : 0 }}</strong></td>
                                <td>{{ $remarks }}</td>
                            </tr>
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> 
                        @endif
                    @endfor
                </table>
                <small>Eligible for Admission to Grade </small>
            </div>
            {{-- Grade Six --}}
            <div class="col-md-6">
                    Grade 6 - School
                    <br>
                    School Year : <strong>{{ (isset($grade_six[0])) ? $grade_six[0]->school_year->year : '' }}</strong>
                    <br>
                    <table class="card-table" width="100%" border="1px">
                        <tr class="text-center" style="font-weight: bolder">
                            <td rowspan="2">Learning Address</td>
                            <td colspan="4">Periodic Rating</td>
                            <td rowspan="2">Final Rating</td>
                            <td rowspan="2">Remarks</td>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        @php
                            $grading_sheet = 11;
                        @endphp
                        @for ($i = 0; $i < $grading_sheet; $i++)
                            @if ($i < count($grade_six))
                                @php
                                    $remarks = ($grade_six[$i]->final_rating !== 0 && $grade_six[$i]->final_rating >= 75) ? 'Passed' : 'Failed';
                                @endphp
                                <tr>
                                    <td>{{ $grade_six[$i]->subject->name }}</td>
                                    <td>{{ $grade_six[$i]->first_period ? $grade_six[$i]->first_period : 0 }}</td>
                                    <td>{{ $grade_six[$i]->second_period ? $grade_six[$i]->second_period : 0 }}</td>
                                    <td>{{ $grade_six[$i]->third_period ? $grade_six[$i]->third_period : 0 }}</td>
                                    <td>{{ $grade_six[$i]->fourth_period ? $grade_six[$i]->fourth_period : 0 }}</td>
                                    <td><strong>{{ $grade_six[$i]->final_rating ? $grade_six[$i]->final_rating : 0 }}</strong></td>
                                    <td>{{ $remarks }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr> 
                            @endif
                        @endfor
                    </table>
                    <small>Eligible for Admission to Grade </small>
                </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>