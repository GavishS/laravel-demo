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
                    $table->string('user_type');
                    $table->string('name', 20);
                    $table->string('firstname', 20);
                    $table->string('lastname', 20);
                    $table->string('email')->unique();
                    $table->string('username', 20)->unique();
                    $table->text('password');
                    $table->string('phone', 10);
                    $table->string('photo', 255);
                    $table->string('address', 255);
                    $table->text('address2')->nullable();
                    $table->string('country', 20);
                    $table->string('state', 20);
                    $table->string('city', 5);
                    $table->string('contact_person_name_1', 50);
                    $table->string('contact_person_name_2', 50);
                    $table->string('contact_person_email_1', 50);
                    $table->string('contact_person_email_2', 50);
                    $table->string('contact_person_mobile_1', 50);
                    $table->string('contact_person_mobile_2', 50);
                    $table->string('degree', 50);
                    $table->string('job_type', 50);
                    $table->string('created_by');
                    $table->string('modified_by');
                    $table->text("register_token")->nullable()->after("remember_token");
                    $table->enum("is_verified", ["0", "1"])->after("register_token");
                    $table->text("retrieve_password_token")->nullable()->after("is_verified");
                    $table->text("retrieve_password_token_created_at")->nullable()->after("retrieve_password_token");
                    $table->rememberToken();
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
