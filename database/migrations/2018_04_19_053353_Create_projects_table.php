<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('projects', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('user_id');
                    $table->string('project_name', 50);
                    $table->text('description');
                    $table->enum('payment_type', ["Fixed", "Hourly"]);
                    $table->string('amount', 10);
                    $table->enum('fraalancer_type', ["Individual", "Group"]);
                    $table->string('number_of_freelancer', 2);
                    $table->enum('location_type', ["Local", "Global"]);
                    $table->text('locations')->nullable();
                    $table->text('skills_required');
                    $table->date('start_date');
                    $table->date('end_date');
                    $table->enum('experience_type', ["Aspirant", "Experienced"]);
                    $table->string('experience_user_rate', 1)->nullable();
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
