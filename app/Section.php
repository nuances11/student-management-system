<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'section', 'grade_id'
    ];

    /**
     * Get the grade.
     */
    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }
}
