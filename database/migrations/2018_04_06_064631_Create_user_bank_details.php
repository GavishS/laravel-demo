<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBankDetails extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_bank_details', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('user_id');
                    $table->string('bank_name', 50)->nullable();
                    $table->string('account_number', 50)->nullable();
                    $table->string('ifsc_code', 50)->nullable();
                    $table->text('bank_proof')->nullable();
                    $table->text('id_proof')->nullable();
                    $table->enum('is_verified', [0, 1]);
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
