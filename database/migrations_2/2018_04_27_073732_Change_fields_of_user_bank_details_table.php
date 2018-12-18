<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldsOfUserBankDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("user_bank_details", function($table) {
                    $table->string("first_card_number", 25)->nullable()->after("user_id");
                    $table->string("first_card_exp_month", 3)->nullable()->after("first_card_number");
                    $table->integer("first_card_exp_year")->nullable()->after("first_card_exp_month");
                    $table->integer("first_card_cvv")->nullable()->after("first_card_exp_year");
                    $table->string("second_card_number", 25)->nullable()->after("first_card_cvv");
                    $table->string("second_card_exp_month", 3)->nullable()->after("second_card_number");
                    $table->integer("second_card_exp_year")->nullable()->after("second_card_exp_month");
                    $table->integer("second_card_cvv")->nullable()->after("second_card_exp_year");
                    $table->enum("default_card", ["1", "2"])->after("second_card_cvv");
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        if (Schema::hasColumn('user_bank_details', 'bank_id')) {
            Schema::table('user_bank_details', function (Blueprint $table) {
                        $table->dropColumn('bank_id');
                    });
        }
        if (Schema::hasColumn('user_bank_details', 'account_number')) {
            Schema::table('user_bank_details', function (Blueprint $table) {
                        $table->dropColumn('account_number');
                    });
        }
        if (Schema::hasColumn('user_bank_details', 'ifsc_code')) {
            Schema::table('user_bank_details', function (Blueprint $table) {
                        $table->dropColumn('ifsc_code');
                    });
        }
        if (Schema::hasColumn('user_bank_details', 'bank_proof')) {
            Schema::table('user_bank_details', function (Blueprint $table) {
                        $table->dropColumn('bank_proof');
                    });
        }
        if (Schema::hasColumn('user_bank_details', 'id_proof')) {
            Schema::table('user_bank_details', function (Blueprint $table) {
                        $table->dropColumn('id_proof');
                    });
        }
        if (Schema::hasColumn('user_bank_details', 'is_verified')) {
            Schema::table('user_bank_details', function (Blueprint $table) {
                        $table->dropColumn('is_verified');
                    });
        }
        Schema::table("user_bank_details", function(Blueprint $t) {
                    $t->dropColumn("first_card_number");
                    $t->dropColumn("first_card_exp_month");
                    $t->dropColumn("first_card_exp_year");
                    $t->dropColumn("first_card_cvv");
                    $t->dropColumn("second_card_number");
                    $t->dropColumn("second_card_exp_month");
                    $t->dropColumn("second_card_exp_year");
                    $t->dropColumn("second_card_cvv");
                    $t->dropColumn("default_card");
                });
    }

}
