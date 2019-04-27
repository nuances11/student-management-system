<?php

namespace App\Http\Controllers;

use App\Subject;
use App\User;
use App\UserDetails;
use App\UserGroup;
use App\Grade;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubjectController extends Controller
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
        return view('backend.subjects.index');
    }

    /**
     * Process datatables ajax request for Users DataTable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function subjectsDataTable()
    {
        $subject = Subject::query();
        return Datatables::of($subject)
            ->editColumn('grade_id', function ($subject) {
                return optional($subject->grade)->name;
            })
            ->addColumn('action', function ($subject) {
                return '<a href="'.url("/subjects/{$subject->id}").'" class="btn btn-secondary btn-xs mb-1">Edit</a>';
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
        $grades = DB::table('grades')->get();
        return view('backend.subjects.subject-form-add', compact('grades'));
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
            'name'=>'required|unique:grades',
            'grade_id' => 'required|integer',
        ]);

        $subject = new Subject([
            'name' => $request->get('name'),
            'grade_id' => $request->get('grade_id'),
        ]);
        $subject->save();

        return redirect('subjects')->with('success', 'Subject has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $grades = DB::table('grades')->get();
        return view('backend.subjects.subject-form-edit', compact('subject', 'grades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name'=>'required|unique:subjects,name,' . $subject->id,
            'grade_id' => 'required|integer',
        ]);

        // $subject->name = $request->get('name');
        $details = $request->all();

        $subject->fill($details)->save();

        return redirect("subjects")->with('success', 'Subject has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
