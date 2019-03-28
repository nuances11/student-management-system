<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_year_id', 
        'grade_id', 
        'subject_id',
        'user_id', 
        'section_id', 
        'day_id',
        'time_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');  
    }

    public function year()
    {
        return $this->belongsTo('App\Schoolyear');  
    }

    public function grade()
    {
        return $this->belongsTo('App\Grade');  
    }

    public function section()
    {
        return $this->belongsTo('App\Section');  
    }

    public function time()
    {
        return $this->belongsTo('App\Hours','time_id', 'hour_id');
    }

    public function day()
    {
        return $this->belongsTo('App\Day','day_id', 'day_id');
    }
}
