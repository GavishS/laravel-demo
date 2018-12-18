<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameBankNameToBankIdInUserBankDetails extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("user_bank_details", function($t) {
                    $t->renameColumn("bank_name", "bank_id");
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table("user_bank_details", function($t) {
                    $t->renameColumn("bank_id", "bank_name");
                });
    }

}