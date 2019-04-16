<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\SubjectAssignment;
use App\Section;
use App\User;
use App\UserDetails;
use App\UserGroup;
use App\Grade;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class ScheduleController extends Controller
{
    private $active_year;

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
        $schedule = [];
        $getHours = $this->getHours();
        $getDays = $this->getDays();
        $grades = Grade::all();
        $schedule_data = Schedule::where('school_year_id', $this->active_year->id);

        if(Input::get('grade')){
            $schedule_data->where('grade_id', Input::get('grade'));
        }

        if(Input::get('section')){
            $schedule_data->where('section_id', Input::get('section'));
        }

        $schedules = $schedule_data->get();

        return view('backend.schedule.index', compact('getHours', 'schedules', 'grades'));
    }

    public function getSection()
    {
        $grade = Input::get('id');
        $_section = Section::where('grade_id', $grade)->get();
        return response()->json(array('section' => $_section, 'success' => TRUE), 200);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function getDays()
    {
        $days = [
            '0' => 'Monday',
            '1' => 'Tuesday',
            '2' => 'Wednesday',
            '3' => 'Thursday',
            '4' => 'Friday'
        ];

        return $days;
    }

    public function getHours()
    {
        $hours = [
            '0' => '8:00AM - 9:00AM',
            '1' => '9:00AM - 10:00AM',
            '2' => '10:00AM - 11:00AM',
            '3' => '11:00AM - 12:00NN',
            '4' => '1:00PM - 2:00PM',
            '5' => '2:00PM - 3:00PM',
            '6' => '3:00PM - 4:00PM',
            '7' => '4:00PM - 5:00PM',
        ];

        return $hours;
    }

    public function getAvailableSubject(Request $request)
    {
        $data = array();
        $grade = $request->get('grade_id');
        $section = $request->get('section_id');
        $user = $request->get('user_id');

        $user_subjects = SubjectAssignment::where('user_id', $user)
                                    ->where('grade_id', $grade)
                                    ->get();

        if ($user_subjects) {
            foreach ($user_subjects as $item) {
                $data[] = $item->subject_id;
            }
        }

        $subjects = DB::table('subjects')
                        ->whereIn('id', $data)
                        ->get();

        return response()->json(array('subject' => $subjects, 'success' => TRUE), 200);
    }

    public function getAvailableTime(Request $request)
    {
        $grade = $request->get('grade_id');
        $section = $request->get('section_id');
        $user = $request->get('user_id');
        $subject = $request->get('subject_id');
        $data = array();

        
        //DB::enableQueryLog();
        $schedules = Schedule::where('school_year_id', $this->active_year->id)
                            // ->where('grade_id', $grade)
                            // ->where('section_id', $section)
                            ->where('user_id', $user)
                            ->where('subject_id', $subject)
                            ->get();

        if ($schedules) {
            foreach ($schedules as $item) {
                $data[] = $item->time_id;
            }
        }

        $hours = $this->getHours();

        if ($data) {
            foreach ($data as $k => $v) {
                unset($hours[$v]);
            }
        }

        return response()->json(array('time' => $hours, 'success' => TRUE), 200);
    }

    public function getAvailableDay(Request $request)
    {
        $grade = $request->get('grade_id');
        $section = $request->get('section_id');
        $user = $request->get('user_id');
        $subject = $request->get('subject_id');
        $time = $request->get('time_id');
        $data = array();

        
        //DB::enableQueryLog();
        $schedules = Schedule::where('school_year_id', $this->active_year->id)
                            // ->where('grade_id', $grade)
                            // ->where('section_id', $section)
                            ->where('user_id', $user)
                            ->where('subject_id', $subject)
                            ->where('time_id', $time)
                            ->get();

        //dd($schedules);

        if ($schedules) {
            foreach ($schedules as $item) {
                $data[] = $item->day_id;
            }
        }

        $days = $this->getDays();

        if ($data) {
            foreach ($data as $k => $v) {
                unset($days[$v]);
            }
        }

        return response()->json(array('day' => $days, 'success' => TRUE), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('backend.schedule.schedule-form-add', compact('users'));
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
            'subject_id'=>'required|integer',
            'user_id' => 'required|integer',
            'grade_id' => 'required|integer',
            'section_id' => 'required|integer',
            'time_id' => 'required|integer',
            'day_id' => 'required|array',
            'day_id.*' => "required|string|distinct",
        ]);

        // $request->validate([
        //     'subject_id'=>'required|integer',
        //     'user_id' => 'required|integer',
        //     'grade_id' => 'required|integer',
        //     'section_id' => 'required|integer',
        //     'time_id' => 'required|integer',
        //     'day_id' => 'required|integer',
        // ]);

        if ($validator->fails())
        {

            $data = array('errors' =>  $validator->errors()->toArray(), 'success' => FALSE);                
            return response()->json($data);

        }

        foreach ($request->get('day_id') as $key => $value) {
            $schedule = new Schedule([
                'school_year_id' => $this->active_year->id,
                'section_id' => $request->get('section_id'),
                'grade_id' => $request->get('grade_id'),
                'subject_id' => $request->get('subject_id'),
                'user_id' => $request->get('user_id'),
                'day_id' => $value,
                'time_id' => $request->get('time_id'),
            ]);
            $schedule->save();
        }

        // $schedule = $request->all();
        // $schedule->save();

        //Schedule::create($request->all());

        return response()->json(array('message' => 'Schedule Saved', 'success' => TRUE), 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
