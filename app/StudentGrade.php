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
}

