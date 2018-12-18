<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserJobTypeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('user_job_types', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('user_id');
                    $table->string('job_type', 20);
                    $table->string('organization_name', 50);
                    $table->text('organization_address');
                    $table->string('time', 50);
                    $table->string('availability', 50);
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}

