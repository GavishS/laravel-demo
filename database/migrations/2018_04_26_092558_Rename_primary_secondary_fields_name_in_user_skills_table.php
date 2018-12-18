<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePrimarySecondaryFieldsNameInUserSkillsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('user_skills', function($t) {
                    $t->renameColumn('skill_type', 'primary_skill');
                    $t->renameColumn('skills_name', 'secondary_skill');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('stnk', function($t) {
                    $t->renameColumn('primary_skill', 'skill_type');
                    $t->renameColumn('secondary_skill', 'skills_name');
                });
    }

}
