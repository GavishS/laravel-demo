<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProjects extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('projects', function($table) {
                    $table->enum('status', ["Active", "Inactive", "Past", "Deleted"]);
                    $table->text('currency');
                    $table->date('last_date_of_bid');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('projects', function($table) {
                    $table->dropColumn('status');
                    $table->dropColumn('currency');
                    $table->dropColumn('last_date_of_bid');
                });
    }

}