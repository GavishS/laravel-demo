<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRetrievePasswordTokenToUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("users", function($table) {
                    $table->text("retrieve_password_token")->nullable()->after("is_verified");
                    $table->text("retrieve_password_token_created_at")->nullable()->after("retrieve_password_token");
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table("users", function(Blueprint $table) {
                    $table->dropColumn("retrieve_password_token");
                    $table->dropColumn("retrieve_password_token_created_at");
                });
    }

}