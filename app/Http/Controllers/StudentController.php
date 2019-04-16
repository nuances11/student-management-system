<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\StudentClass;
use App\StudentGrade;
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
        $student = Student::query();
        return Datatables::of($student)
            ->editColumn('name', function ($student) {
                $fullname = strtoupper($student->lname) . ', ' . ucfirst($student->fname) . ', ' . ucfirst($student->mname);
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

        $details = $request->all();

        $student->fill($details)->save();

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
            ->editColumn('id', function ($studentClass) {
                return $studentClass->student->id;
            })
            ->editColumn('lrn', function ($studentClass) {
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
        // Get student records by Student ID
        // $student = DB::table('student_grades')
        //             ->where('student_id', $id)
        //             ->groupBy('grade_id')
        //             ->get();
        // dd($student); 
        return view('backend.students.records');
    }
}
