<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'phone',
        'address',
        'address2',
        'country',
        'state',
        'city',
        'degree',
        'job_type',
        'user_type',
        'created_by',
        'modified_by',
        'register_token',
        'is_verified',
        'retrieve_password_token',
        'retrieve_password_token_created_at',
        'photo'
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
