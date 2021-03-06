<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYouthCentersTable extends Migration
{
 /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youth_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->string('bio', 90)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('town', 255)->nullable();
            $table->string('adress', 255)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('youth_centers');
    }
}
