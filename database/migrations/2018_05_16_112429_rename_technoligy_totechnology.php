<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTechnoligyTotechnology extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("technologies", function($t) {
                    $t->renameColumn("technoligy", "technology");
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table("technologies", function($t) {
                    $t->renameColumn("technology", "technoligy");
                });
    }

}
