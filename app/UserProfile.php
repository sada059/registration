<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
protected $table = 'user_profiles';
    protected $fillable = [
        'user_id', 'user_email','states'
    ];

}
