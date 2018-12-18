<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_type');
            $table->string('name',20);
            $table->string('firstname',20);
            $table->string('lastname',20);
            $table->string('email')->unique();
            $table->string('username',20)->unique();
            $table->text('password');
            $table->string('phone',10);
            $table->string('photo',255);
            $table->string('address',255);
            $table->string('country',20);
            $table->string('state',20);
            $table->string('degree',50);
            $table->string('job_type',50);
            $table->string('created_by');
            $table->string('modified_by');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
