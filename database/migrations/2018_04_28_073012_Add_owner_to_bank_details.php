<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOwnerToBankDetails extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("user_bank_details", function($table) {
                    $table->string("first_card_owner", 50)->nullable()->after("user_id");
                    $table->string("second_card_owner", 50)->nullable()->after("first_card_cvv");
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table("user_bank_details", function(Blueprint $t) {
                    $t->dropColumn("first_card_owner");
                    $t->dropColumn("second_card_owner");
                });
    }

}
