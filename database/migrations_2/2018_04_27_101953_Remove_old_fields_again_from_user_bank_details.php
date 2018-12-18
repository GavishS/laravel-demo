<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveOldFieldsAgainFromUserBankDetails extends Migration {

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
        Schema::table('user_bank_details', function (Blueprint $table) {
                    $table->dropColumn('bank_id');
                    $table->dropColumn('account_type');
                    $table->dropColumn('account_number');
                    $table->dropColumn('ifsc_code');
                    $table->dropColumn('bank_proof');
                    $table->dropColumn('id_proof');
                    $table->dropColumn('is_verified');
                });
    }

}
