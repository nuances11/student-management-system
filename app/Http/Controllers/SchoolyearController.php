<?php

namespace App\Http\Controllers;

use App\Schoolyear;
use App\User;
use App\UserDetails;
use App\UserGroup;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SchoolyearController extends Controller
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
        return view('backend.schoolyears.index');
    }

    /**
     * Process datatables ajax request for Users DataTable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function schoolyearsDataTable()
    {
        $schoolyear = Schoolyear::query();
        return Datatables::of($schoolyear)
            ->addColumn('action', function ($schoolyear) {
                return '<a href="'.url("/schoolyears/{$schoolyear->id}").'" class="btn btn-secondary btn-xs mb-1">Edit</a>';
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
        return view('backend.schoolyears.schoolyear-form-add');
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
            'year'=>'required|date_format:"Y"|unique:schoolyears',
        ]);

        $schoolyear = new Schoolyear([
            'year' => $request->get('year')
        ]);
        $schoolyear->save();

        return redirect('schoolyears')->with('success', 'Schoolyear has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function show(Schoolyear $schoolyear)
    {
        return view('backend.schoolyears.schoolyear-form-edit', compact('schoolyear'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function edit(Schoolyear $schoolyear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schoolyear $schoolyear)
    {
        //dd($request);
        $request->validate([
            'year'=>'required|date_format:"Y"|unique:schoolyears,year,' . $schoolyear->id,
        ]);

        $schoolyear->year = $request->get('year');
        $schoolyear->is_active = $request->get('is_active');

        Schoolyear::query()->update(['is_active' => 0]);
        $schoolyear->save();

        return redirect("schoolyears")->with('success', 'Schoolyear has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schoolyear $schoolyear)
    {
        //
    }
}
