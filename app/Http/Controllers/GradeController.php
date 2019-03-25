<?php

namespace App\Http\Controllers;

use App\Grade;
use App\User;
use App\UserDetails;
use App\UserGroup;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.grades.index');
    }

    /**
     * Process datatables ajax request for Users DataTable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gradesDataTable()
    {
        $grade = Grade::query();
        return Datatables::of($grade)
            ->addColumn('action', function ($grade) {
                return '<a href="'.url("/grades/{$grade->id}").'" class="btn btn-secondary btn-xs mb-1">Edit</a>';
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
        return view('backend.grades.grade-form-add');
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
        ]);

        $grade = new Grade([
            'name' => $request->get('name')
        ]);
        $grade->save();

        return redirect('grades')->with('success', 'Grade has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        return view('backend.grades.grade-form-edit', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name'=>'required|unique:grades',
        ]);

        $grade->name = $request->get('name');

        $grade->save();

        return redirect("grades")->with('success', 'Grade has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
