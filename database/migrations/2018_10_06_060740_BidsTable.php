<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BidsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bids', function(Blueprint $table) {
                    $table->increments("id");
                    $table->integer("user_id");
                    $table->integer("project_id");
                    $table->string("bid");
                    $table->enum("has_new", [0, 1])->comment = "1 if User had added a new bid for this project.";
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('bids');
    }

}
