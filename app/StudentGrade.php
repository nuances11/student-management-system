<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_year_id',
        'student_id',
        'grade_id',
        'section_id',
        'subject_id',
        'user_id',
        'first_period',
        'second_period',
        'third_period',
        'fourth_period',
        'final_rating',
    ];

    public function grade()
    {
        return $this->belongsTo('App\Grade', 'grade_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id');  
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');  
    }

    public function school_year()
    {
        return $this->belongsTo('App\SchoolYear', 'school_year_id');  
    }
}

