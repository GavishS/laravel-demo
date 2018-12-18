<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User_bank_details extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_card_owner',
        'first_card_cvv',
        'first_card_number',
        'first_card_exp_month',
        'first_card_exp_year',
        'second_card_owner',
        'second_card_cvv',
        'second_card_number',
        'second_card_exp_month',
        'second_card_exp_year',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

}