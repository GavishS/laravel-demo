<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataTypeInProjectsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("projects", function(Blueprint $table) {
                    $table->string("certification")->change();
                    ;
                    $table->string("weekly_availability_of_resource")->change();
                    ;
                    $table->string("equivalent_relevant_skills")->change();
                    ;
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
    }

}
