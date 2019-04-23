<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'grade_id'
    ];

    public function grade()
    {
        return $this->belongsTo('App\Grade'); 
    }

    public function subject_assign()
    {
        return $this->hasMany('App\SubjectAssignment');
    }

    public function subject_schedule()
    {
        return $this->hasMany('App\Schedule');
    }

    public function subject_grade()
    {
        return $this->hasMany('App\SubjectGrade');
    }
}
