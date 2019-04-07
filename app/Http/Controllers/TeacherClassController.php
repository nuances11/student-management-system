<?php

namespace App\Http\Controllers;

use App\TeacherClass;
use App\Subject;
use App\Section;
use App\Student;
use App\Schedule;
use App\StudentClass;
use App\SubjectAssignment;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Input;

class TeacherClassController extends Controller
{

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
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
        return view('backend.users.class.index');
    }

    /**
     * Process datatables ajax request for Sections DataTable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userClassDataTable()
    {
        $schedule = Schedule::where('school_year_id', $this->active_year->id)
                        ->where('user_id', Auth::user()->id)
                        ->groupBy('grade_id', 'section_id')
                        ->get();
        return Datatables::of($schedule)
            ->editColumn('grade', function ($schedule) {
                return $schedule->grade->name;
            })
            ->editColumn('section', function ($schedule) {
                return $schedule->section->section;
            })
            ->addColumn('action', function ($schedule) {
                $data = array(
                    'user_id' => Auth::user()->id,
                    'grade_id' => $schedule->grade_id,
                    'section_id' => $schedule->section_id,
                );

                $data = Crypt::encrypt($data);
                return '<a href="' .url("/view-class?data={$data}") . '" class="btn btn-secondary btn-xs mb-1">View</a>';
            })
            ->make(true);
    }

    public function viewClass()
    {
        return view('backend.users.class.subjects');
    }

    public function userSubjectDataTable()
    {
        $data = Input::get('data');
        $decrypted = '';
        $subj = [];

        if ($data) {
            try {
                $decrypted = Crypt::decrypt($data);
            } catch (DecryptException $e) {
                //
            }
        }

        $schedules = Schedule::where('school_year_id', $this->active_year->id)
                        ->where('user_id', Auth::user()->id)
                        ->groupBy('grade_id', 'section_id')
                        ->get();
        
        $subjects = SubjectAssignment::where('school_year_id', $this->active_year->id)
                        ->where('user_id', Auth::user()->id)
                        ->where('grade_id', $decrypted['grade_id'])
                        ->get();

        if ($subjects) {
            foreach ($subjects as $item) {
                $subj[] = $item->subject_id;
            }
        }

        $userSubjects = Subject::where('grade_id', $decrypted['grade_id'])
                        ->whereIn('id', $subj)
                        ->get();

        return Datatables::of($userSubjects)
            ->editColumn('subject', function ($userSubjects) {
                return $userSubjects->name;
            })
            ->addColumn('action', function ($userSubjects) use ($decrypted) {
                $data = array(
                    'user_id' => Auth::user()->id,
                    'grade_id' => $decrypted['grade_id'],
                    'section_id' => $decrypted['section_id'],
                    'subject_id' => $userSubjects->id
                );

                $data = Crypt::encrypt($data);
                return '<a href="' .url("/view-students?data={$data}") . '" class="btn btn-secondary btn-xs mb-1">View</a>';
            })
            ->make(true);
    }

    public function viewStudents()
    {
        return view('backend.users.class.students');
    }

    public function userStudentsDataTable()
    {
        $data = Input::get('data');
        $decrypted = '';
        $stud = [];

        if ($data) {
            try {
                $decrypted = Crypt::decrypt($data);
            } catch (DecryptException $e) {
                //
            }
        }

        $students = StudentClass::where('grade_id', $decrypted['grade_id'])
                    ->where('section_id', $decrypted['section_id'])
                    ->where('school_year_id', $this->active_year->id)
                    ->get();

        if ($students) {
            foreach ($students as $item) {
                $stud[] = $item->student_id;
            }
        }

        $userStudents = Student::whereIn('id', $stud)
                        ->get();

        return Datatables::of($userStudents)
                ->editColumn('lrn', function ($userStudents) {
                    return $userStudents->lrn;
                })
                ->editColumn('name', function ($userStudents) {
                    return $userStudents->fname . ' ' . $userStudents->lname;
                })
                ->addColumn('action', function ($userStudents) use ($decrypted) {
                    $data = array(
                        'user_id' => Auth::user()->id,
                        'grade_id' => $decrypted['grade_id'],
                        'section_id' => $decrypted['section_id'],
                        'subject_id' => $decrypted['subject_id'],
                        'student_id' => $userStudents->id
                    );
    
                    $data = Crypt::encrypt($data);
                    return '<a href="' .url("/view-grades?data={$data}") . '" class="btn btn-secondary btn-xs mb-1">View Grades</a>';
                })
                ->make(true);
    }

    public function viewGrades()
    {
        $data = Input::get('data');
        $decrypted = '';
        $stud = [];

        if ($data) {
            try {
                $decrypted = Crypt::decrypt($data);
            } catch (DecryptException $e) {
                //
            }
        }

        return view('backend.users.class.student-grade');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeacherClass  $teacherClass
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherClass $teacherClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherClass  $teacherClass
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherClass $teacherClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherClass  $teacherClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherClass $teacherClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherClass  $teacherClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherClass $teacherClass)
    {
        //
    }
}

