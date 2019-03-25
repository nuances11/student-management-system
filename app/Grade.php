<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the section.
     */
    public function sections()
    {
        return $this->hasOne('App\Section');
    }

    /**
     * Get the section.
     */
    public function subjects()
    {
        return $this->hasOne('App\Subject');
    }

    public function grade_assign()
    {
        return $this->hasMany('App\SubjectAssignment');
    }

    public function grade_schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
