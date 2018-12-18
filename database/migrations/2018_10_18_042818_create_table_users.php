<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('user_type')->comment('1=Business User, 2=Employee, 3=Admin');
                    $table->string('name', 20)->nullable();
                    $table->string('firstname', 20);
                    $table->string('lastname', 20);
                    $table->string('email')->unique();
                    $table->string('username', 20)->unique();
                    $table->text('password', 255);
                    $table->string('phone', 10);
                    $table->string('photo', 255)->nullable();
                    $table->string('address', 255);
                    $table->text('address2', 255)->nullable();
                    $table->string('country', 20);
                    $table->string('state', 20);
                    $table->string('city', 5);
                    $table->string('contact_person_name_1', 50)->nullable();
                    $table->string('contact_person_name_2', 50)->nullable();
                    $table->string('contact_person_email_1', 50)->nullable();
                    $table->string('contact_person_email_2', 50)->nullable();
                    $table->integer('contact_person_mobile_1', 10)->nullable();
                    $table->integer('contact_person_mobile_2', 10)->nullable();
                    $table->string('degree', 50)->nullable();
                    $table->string('job_type', 50)->nullable();
                    $table->string('created_by', 5)->nullable();
                    $table->string('modified_by', 5)->nullable();
                    $table->rememberToken();
                    $table->text("register_token", 255)->nullable();
                    $table->enum("is_verified", ["0", "1"]);
                    $table->text("retrieve_password_token", 255)->nullable();
                    $table->text("retrieve_password_token_created_at")->nullable();
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
