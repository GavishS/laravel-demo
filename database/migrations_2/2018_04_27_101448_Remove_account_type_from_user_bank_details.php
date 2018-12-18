<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAccountTypeFromUserBankDetails extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        if (Schema::hasColumn('user_bank_details', 'account_type')) {
            Schema::table('user_bank_details', function (Blueprint $table) {
                        $table->dropColumn('account_type');
                    });
        }
    }

}
