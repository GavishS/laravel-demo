<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; /* users table model */
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

class AdminController extends Controller {

    public function get_all_employee() {
        return User::select('id','name','user_type','firstname','lastname','email')->where("user_type", "=", 1)->get();
    }

}
