<?php

namespace App\Http\Controllers;

use App\User;
use App\UserGroup;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.user-groups');
    }

    /**
     * Process datatables ajax request for Users Groups DataTable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function usersGroupsDataTable()
    {
        $user_group = UserGroup::select(['name', 'slug', 'id']);
        return Datatables::of($user_group)
        ->addColumn('action', function ($user_group) {
            return '<a href="'.url("/user-groups/{$user_group->slug}/edit").'" class="btn btn-secondary btn-xs mb-1">Edit</a>';
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
        return view('backend.users.user-groups-form-add');
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
            'name'=>'required|unique:user_groups',
            'slug'=> 'required|unique:user_groups',
        ]);
        $user_group = new UserGroup([
            'name' => $request->get('name'),
            'slug'=> $request->get('slug'),
        ]);
        $user_group->save();
        return redirect('user-groups')->with('success', 'User Group Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function show(UserGroup $userGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {   
        $userGroup = new UserGroup;
        $user_group = $userGroup::where('slug', $slug)->first();
        return view('backend.users.user-groups-form-edit', compact('user_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserGroup $userGroup)
    {
        $request->validate([
            'name'=>'required|unique:user_groups,name,' . $userGroup->id,
            'slug'=> 'required|unique:user_groups,slug,' . $userGroup->id,
        ]);

        $userGroup->name = $request->get('name');
        $userGroup->slug = $request->get('slug');
        $userGroup->save();

        return redirect('user-groups')->with('success', 'User Group has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserGroup $userGroup)
    {
        $userGroup->delete();
        return redirect('user-groups')->with('success', 'User Group has been deleted Successfully');
    }
}
