<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	protected $table = 'user';
    protected $fillable = [
        'user_name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
