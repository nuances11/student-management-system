<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schoolyear extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => '0',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year', 'is_active'
    ];

    public function year_assign()
    {
        return $this->hasMany('App\SubjectAssignment');
    }

    public function year_schedule()
    {
        return $this->hasMany('App\Schedule');
    }

    public function student_grade()
    {
        return $this->hasMany('App\StudentGrade');
    }
}
