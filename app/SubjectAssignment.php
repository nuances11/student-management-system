<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectAssignment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_year_id', 'grade_id', 'subject_id', 'user_id'
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
}
