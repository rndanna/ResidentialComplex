<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLitersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40)->nullable();
            $table->smallInteger('countRooms');
            $table->string('completionDate');
            $table->foreignId('complex_id')
                ->constrained('residential_complexes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('liters');
    }
}
