<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProjectsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("projects", function($table) {
                    $table->integer("type_of_project")->after("experience_user_rate");
                    $table->integer("technologies")->after("type_of_project");
                    $table->integer("certification")->after("technologies");
                    $table->enum("endorsement", [1, 0])->after("certification");
                    $table->integer("weekly_availability_of_resource")->after("endorsement");
                    $table->integer("equivalent_relevant_skills")->after("weekly_availability_of_resource");
                    $table->text("education")->after("equivalent_relevant_skills");
                    $table->string("awards")->after("education");
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table("projects", function(Blueprint $table) {
                    $table->dropColumn("type_of_project");
                    $table->dropColumn("technologies");
                    $table->dropColumn("certification");
                    $table->dropColumn("endorsement");
                    $table->dropColumn("weekly_availability_of_resource");
                    $table->dropColumn("equivalent_relevant_skills");
                    $table->dropColumn("education");
                    $table->dropColumn("awards");
                });
    }

}
