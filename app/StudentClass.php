<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
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
        'section_id'
    ];

    /**
     * Get the grade.
     */
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
