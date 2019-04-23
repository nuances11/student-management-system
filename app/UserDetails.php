<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'user_groups_id', 'gender', 'address', 'dob', 'image', 'course', 'major'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'image' => '',
    ];

    /**
     * Get the user Group.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user Group.
     */
    public function group()
    {
        return $this->belongsTo('App\UserGroup', 'user_groups_id');
    }
}
