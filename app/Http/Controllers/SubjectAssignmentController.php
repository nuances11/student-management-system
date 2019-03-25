<?php

namespace App\Http\Controllers;

use App\SubjectAssignment;
use App\User;
use App\UserDetails;
use App\UserGroup;
use App\Grade;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubjectAssignmentController extends Controller
{

    private $active_year;

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
        $data = [];
        $users = User::get();
        $assigns = SubjectAssignment::where('school_year_id', $this->active_year->id)->get();
        if ($assigns) {
            foreach ($assigns as $item) {
                $data[] = $item->subject_id;
            }
        }

        $subjects = DB::table('subjects')
                        ->whereNotIn('id', $data)
                        ->get();
        
        return view('backend.subjects.assign-subject.index', compact('users', 'subjects', 'assigns'));
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
        $request->validate([
            'subject_id'=>'required',
            'user_id' => 'required|integer',
        ]);

        $data = $request->get('subject_id');
        $arr = explode("-", $data, 2);
        $subject = $arr[0];
        $grade = $arr[1];

        $assign = new SubjectAssignment([
            'school_year_id' => $this->active_year->id,
            'grade_id' => $grade,
            'subject_id' => $subject,
            'user_id' => $request->get('user_id')
        ]);
        $assign->save(); 

        return redirect('subject-assign')->with('success', 'Subject has been assigned');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubjectAssignment  $subjectAssignment
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectAssignment $subjectAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubjectAssignment  $subjectAssignment
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectAssignment $subjectAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubjectAssignment  $subjectAssignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectAssignment $subjectAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubjectAssignment  $subjectAssignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectAssignment $subjectAssignment)
    {
        //
    }
}
