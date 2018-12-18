<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegisterTokenToUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("users", function($table) {
                    $table->text("register_token")->nullable()->after("remember_token");
                    $table->enum("is_verified", ["0", "1"])->after("register_token");
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table("users", function(Blueprint $table) {
                    $table->dropColumn("register_token");
                    $table->dropColumn("is_verified");
                });
    }

}
