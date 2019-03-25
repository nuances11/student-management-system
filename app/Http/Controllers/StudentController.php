<?php

namespace App\Http\Controllers;

use App\Student;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
{
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
                return '<a href="'.url("/student/{$student->id}").'" class="btn btn-secondary btn-xs mb-1">Edit</a>';
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
}
