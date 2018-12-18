<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLengthOfExperienceRateInProjects extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::query('alter table projects modify experience_user_rate varchar(50)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::query('alter table projects modify experience_user_rate varchar(1)');
    }

}
