<?php

namespace App\Http\Controllers;

use App\StudentGrade;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentGradeController extends Controller
{

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->active_year = DB::table('schoolyears')
                        ->where('is_active', 1)
                        ->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);

        $request->validate([
            'subject_id'=>'required',
            'user_id' => 'required|integer',
            'grade_id' => 'required|integer',
            'section_id' => 'required|integer',
            'first_period' => 'required|numeric|between:50,100'
        ]);

        $first_period = $request->get('first_period');
        $second_period = $request->get('second_period');
        $third_period = $request->get('third_period');
        $fourth_period = $request->get('fourth_period');
        
        if (isset($first_period)) {
            $request->validate([
                'first_period' => 'numeric|between:50,100',
            ]);
        }

        if (!empty($second_period) && $second_period > 0) {
            $request->validate([
                'second_period' => 'numeric|between:50,100|required_with:first_period',
            ]);
        }

        if (!empty($third_period) && $third_period > 0) {
            $request->validate([
                'third_period' => 'numeric|between:50,100|required_with:first_period,second_period',
            ]);
        }

        if (!empty($fourth_period) && $fourth_period > 0) {
            $request->validate([
                'fourth_period' => 'numeric|between:50,100|required_with:first_period,second_period,third_period',
            ]);
        }

        $details = $request->all();

        $studentGrade = StudentGrade::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            //'user_id'   => Auth::user()->id,
            'school_year_id' => $this->active_year->id,
            'grade_id' => $request->get('grade_id'),
            'section_id' => $request->get('section_id'),
            'student_id' => $request->get('student_id'),
            'subject_id' => $request->get('subject_id')
        ], $details);

        return redirect()->back()->with('success', 'Student grade has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentGrade  $studentGrade
     * @return \Illuminate\Http\Response
     */
    public function show(StudentGrade $studentGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentGrade  $studentGrade
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentGrade $studentGrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentGrade  $studentGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentGrade $studentGrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentGrade  $studentGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentGrade $studentGrade)
    {
        //
    }
}
