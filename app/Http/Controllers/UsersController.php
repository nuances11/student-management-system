<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\User;
use App\UserDetails;
use App\UserGroup;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.index');
    }

    /**
     * Process datatables ajax request for Users DataTable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function usersDataTable()
    {
        $user = User::query();
        return Datatables::of($user)
        ->addColumn('action', function ($user) {
            if ($user->id == Auth::user()->id) {
                return '';
            }else{
                return '<a href="'.url("/users/{$user->id}").'" class="btn btn-secondary btn-xs mb-1">View Profile</a>';
            }
            
        })
        ->make(true);
    }

    public function profileImageUpload(Request $request,  $userDetails)
    {
        $details = UserDetails::find($userDetails);
        //return $details;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('img/users/'), $imageName);

        $image = [
          'image' => $imageName,
        ];

        $details->fill($image)->save();

        return redirect("users/{$details->user_id}")->with('success', 'Profile image uploaded');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = DB::table('user_groups')->get();
        return view('backend.users.user-form-add', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'user_group' => 'required|integer',
            'name'=>'required',
            'email'=> 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required_with:password',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required|date_format:Y-m-d',
        ]);
        $user = new User([
            'name' => $request->get('name'),
            'email'=> $request->get('email'),
            'password'=> Hash::make($request->get('password'))
        ]);
        $user->save();

        $details = new UserDetails([
            'user_id' => $user->id,
            'user_groups_id' => $request->get('user_group'),
            'gender' => $request->get('gender'),
            'address'=> $request->get('address'),
            'dob'=> $request->get('dob'),
            'image' => ''
        ]);

        $details->save();

        return redirect('users')->with('success', 'User has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.user-profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $groups = DB::table('user_groups')->get();
        return view('backend.users.user-profile-edit', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_groups_id' => 'required|integer',
            'name'=>'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required|date_format:Y-m-d',
        ]);
        
        $user->name = $request->get('name');

        $details = $request->all();

        $user->details->fill($details)->save();
        $user->save();
        
        return redirect("users/{$user->id}/edit")->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewSchedule($id)
    {
        $user = User::find($id);
        $schedules = Schedule::where('user_id', $id)->where('school_year_id', $this->active_year->id)->get();
        return view('backend.users.user-schedule', compact('user', 'schedules'));
    }
}
