<?php

namespace App\Http\Controllers;
use App\Subject;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Student;
use App\StudentGrade;
use App\Grade;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        $grade = Input::get();
        return response()->json(array('grade' => $grade, 'success' => TRUE), 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id = 1)
    {
        $student = Student::find($id);
        $grade_one = StudentGrade::where('student_id', $id)
                            ->where('grade_id', 1)
                            ->get();  
        $grade_two = StudentGrade::where('student_id', $id)
                            ->where('grade_id', 2)
                            ->get();    
        $grade_three = StudentGrade::where('student_id', $id)
                            ->where('grade_id', 3)
                            ->get(); 
        $grade_four = StudentGrade::where('student_id', $id)
                            ->where('grade_id', 4)
                            ->get();          
        $grade_five = StudentGrade::where('student_id', $id)
                            ->where('grade_id', 5)
                            ->get();    
        $grade_six = StudentGrade::where('student_id', $id)
                            ->where('grade_id', 6)
                            ->get();  
        $grades = Grade::all();

        $pdf = PDF::loadView('backend.students.records', compact('grade_one', 'grade_two', 'grade_three', 'grade_four', 'grade_five', 'grade_six', 'grades', 'student'));
  
        return $pdf->download($student->lrn . '-' . strtotime(time()) . '.pdf');
    }
}
