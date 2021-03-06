<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lrn',
        'lname',
        'fname',
        'mname',
        'gender',
        'dob',
        'mother_tounge',
        'ethnic_group',
        'religion',
        'address_street',
        'address_barangay',
        'address_municipality',
        'address_province',
        'parent_father',
        'parent_father_age',
        'parent_father_occupation',
        'parent_mother',
        'parent_mother_age',
        'parent_mother_occupation',
        'siblings',
        'siblings_age',
        'siblings_details',
        'goals',
        'has_card',
        'has_bc',
        'has_others',
        'status',
        'is_aeta'
    ];
}
