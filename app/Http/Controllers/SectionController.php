<?php

namespace App\Http\Controllers;

use App\Section;
use App\User;
use App\UserDetails;
use App\UserGroup;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SectionController extends Controller
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
        return view('backend.sections.index');
    }

    /**
     * Process datatables ajax request for Sections DataTable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sectionsDataTable()
    {
        $section = Section::query();
        return Datatables::of($section)
            ->editColumn('grade', function ($section) {
                return $section->grade->name;
            })
            ->addColumn('action', function ($section) {
                return '<a href="'.url("/sections/{$section->id}").'" class="btn btn-secondary btn-xs mb-1">Edit</a>';
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
        return view('backend.sections.section-form-add', compact('grades'));
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
            'section'=>'required|unique:sections',
            'grade_id' => 'required|integer',
        ]);

        $section = new Section([
            'section' => $request->get('section'),
            'grade_id' => $request->get('grade_id'),
        ]);
        $section->save();

        return redirect('sections')->with('success', 'Section has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        $grades = DB::table('grades')->get();
        return view('backend.sections.section-form-edit', compact('section', 'grades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'section'=>'required|unique:sections,section,' . $section->id,
            'grade_id' => 'required|integer',
        ]);

        $details = $request->all();

        $section->fill($details)->save();

        return redirect("sections")->with('success', 'Section has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }

    public function getSections()
    {
        $grade = Input::get('grade');
        $sections = Section::where('grade_id', $grade)->get();
        $data = [];
        if ($sections) {
            foreach ($sections as $section) {
                $data[] = array(
                    'id' => $section->id,
                    'name' => $section->section,
                );
            }
        }

        return response()->json(array('sections' => $data, 'success' => TRUE), 200);
    }
}
