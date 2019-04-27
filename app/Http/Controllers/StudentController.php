<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\StudentClass;
use App\StudentGrade;
use App\Grade;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
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
        return view('backend.students.index'); 
    }

    /**
     * Process datatables ajax request for Students DataTable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function studentsDataTable()
    {
        $student = Student::select(DB::raw(
            "lrn,
            id,
            CONCAT(lname, ', ', fname) as name"
        ))->get();
        return Datatables::of($student)
            ->editColumn('name', function ($student) {
                //$fullname = strtoupper($student->lname) . ', ' . ucfirst($student->fname) . ', ' . ucfirst($student->mname);
                $fullname = $student->name;
                return $fullname;
            })
            ->addColumn('action', function ($student) {
                $editBtn = '<a href="'.url("/student/{$student->id}").'" class="btn btn-secondary btn-xs mb-1">Edit</a>';
                $gradesBtn = '<a href="'.url("/student/records/{$student->id}").'" class="btn btn-primary btn-xs mb-1">View Record</a>';
                return $editBtn . ' ' . $gradesBtn;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.students.student-form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lrn'=>'required|numeric|unique:students|digits:12',
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'gender' => 'required',
            'dob' => 'required|date_format:Y-m-d',
            'mother_tounge' => "required",
            'ethnic_group' => "required",
            'religion' => "required",
            'address_street' => "required",
            'address_barangay' => "required",
            'address_municipality' => "required",
            'address_province' => "required",
            'parent_father' => "required",
            'parent_mother' => "required",
        ]);

        if ($validator->fails())
        {

            $data = array('errors' =>  $validator->errors()->toArray(), 'success' => FALSE);                
            return response()->json($data);

        }

        // $student = $request->all();
        // $student->save();

        $details = $request->all();
        $siblings = serialize($request->input('siblings'));
        $siblings_age = serialize($request->input('siblings_age'));
        $siblings_details = serialize($request->input('siblings_details'));

        $request->merge([
            'siblings' => $siblings,
            'siblings_age' => $siblings_age,
            'siblings_details' => $siblings_details,
        ]);

        Student::create($request->all());

        return response()->json(array('message' => 'Student Saved', 'success' => TRUE), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('backend.students.student-form-edit', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'lrn'=>'required|numeric|digits:12|unique:students,lrn,' . $student->id,
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'gender' => 'required',
            'dob' => 'required|date_format:Y-m-d',
            'mother_tounge' => "required",
            'ethnic_group' => "required",
            'religion' => "required",
            'address_street' => "required",
            'address_barangay' => "required",
            'address_municipality' => "required",
            'address_province' => "required",
            'parent_father' => "required",
            'parent_mother' => "required",
        ]);

        if ($validator->fails())
        {

            $data = array('errors' =>  $validator->errors()->toArray(), 'success' => FALSE);                
            return response()->json($data);

        }

        // $details = $request->all();
        $details = $request->all();
        $siblings = serialize($request->input('siblings'));
        $siblings_age = serialize($request->input('siblings_age'));
        $siblings_details = serialize($request->input('siblings_details'));
        $has_card = '';
        $has_bc = '';
        $has_others = '';

        if ($request->input('has_card')) {
            $has_card = $request->input('has_card');
        }

        if ($request->input('has_bc')) {
            $has_bc = $request->input('has_bc');
        }

        if ($request->input('has_others')) {
            $has_others = $request->input('has_others');
        }

        $request->merge([
            'siblings' => $siblings,
            'siblings_age' => $siblings_age,
            'siblings_details' => $siblings_details,
            'has_card' => $has_card,
            'has_bc' => $has_bc,
            'has_others' => $has_others,
        ]);


        $student->fill($request->all())->save();

        return response()->json(array('message' => 'Student Updated', 'success' => TRUE), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function addStudentClass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'grade' => 'integer|required',
            'section' => 'integer|required',
            'student' => 'integer|required',
        ]);

        if ($validator->fails())
        {

            $data = array('errors' =>  $validator->errors()->toArray(), 'success' => FALSE);                
            return response()->json($data);

        }


        $student_class = new StudentClass([
            'school_year_id' => $this->active_year->id,
            'student_id'=> $request->get('student'),
            'grade_id'=> $request->get('grade'),
            'section_id'=> $request->get('section'),
        ]);
        $student_class->save();

        return response()->json(array('message' => 'Student Added', 'success' => TRUE), 200);
    }

    public function studentClass()
    {
        return view('backend.students.class');
    }

    public function getStudents()
    {
        $students = Student::all();
        $data = [];
        if ($students) {
            foreach ($students as $student) {
                $data[] = array(
                    'id' => $student->id,
                    'name' => $student->fname . ' ' . $student->lname,
                );
            }
        }

        return response()->json(array('student' => $data, 'success' => TRUE), 200);
    }

    /**
     * Process datatables ajax request for Students Classes DataTable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function studentsClasses()
    {
        $student = Student::query();
        return Datatables::of($student)
            ->editColumn('name', function ($student) {
                $fullname = strtoupper($student->lname) . ', ' . ucfirst($student->fname) . ', ' . ucfirst($student->mname);
                return $fullname;
            })
            ->addColumn('action', function ($student) {
                return '<a href="'.url("/student/{$student->id}").'" class="btn btn-secondary btn-xs mb-1">Edit</a>';
            })
            ->make(true);
    }

    public function getStudentsPerClass()
    {
        $grade = Input::get('grade');
        $section = Input::get('section');
        $data = array();
        $studentClass = StudentClass::where('school_year_id', $this->active_year->id)
                            ->where('grade_id', $grade)
                            ->where('section_id', $section)
                            ->get();
        if ($studentClass) {
            foreach ($studentClass as $item) {
                $data[] = $item->student_id;
            }
        }

        $students = DB::table('students')
                        ->whereNotIn('id', $data)
                        ->get();
        $stud = [];
        if ($students) {
            foreach ($students as $student) {
                $stud[] = array(
                    'id' => $student->id,
                    'name' => $student->fname . ' ' . $student->lname,
                );
            }
        }

        return response()->json(array('students' => $stud, 'success' => TRUE), 200);
    }

    public function studentClassDataTable(Request $request)
    {
        // $grade = Input::get('grade');
        // $section = Input::get('section');

        $studentClass = StudentClass::query();
        // if($grade) $studentClass->where('grade_id', $grade);
        // if($section) $studentClass->where('section_id', $section);
        // $studentClass = $studentClass->get();

        // dd($studentClass);
        
        return Datatables::of($studentClass)
            ->filter(function ($query) use ($request) {
                if ($request->has('grade')) {
                    $query->where('grade_id', $request->get('grade'));
                }

                if ($request->has('section')) {
                    $query->where('section_id', $request->get('section'));
                }
            })
            ->addColumn('lrn', function ($studentClass) {
                return $studentClass->student->lrn;
            })
            ->editColumn('name', function ($studentClass) {
                $fullname = strtoupper($studentClass->student->lname) . ', ' . ucfirst($studentClass->student->fname) . ', ' . ucfirst($studentClass->student->mname);
                return $fullname;
            })
            ->addColumn('action', function ($studentClass) {
                return '<a href="'.url("/student/{$studentClass->student->id}").'" class="btn btn-secondary btn-xs mb-1">Edit</a><a data-id="'.$studentClass->id.'" href="javascript:void(0);" class="btn btn-danger btn-xs mb-1 ml-1 remove-student">Remove Student</a>';
            })
            ->make(true);
    }

    public function showRecords($id)
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
        return view('backend.students.records', compact('grade_one', 'grade_two', 'grade_three', 'grade_four', 'grade_five', 'grade_six', 'grades', 'student'));
    }

    public function printRecords($id)
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
        return view('backend.students.records-print', compact('grade_one', 'grade_two', 'grade_three', 'grade_four', 'grade_five', 'grade_six', 'grades', 'student'));
    }
}
