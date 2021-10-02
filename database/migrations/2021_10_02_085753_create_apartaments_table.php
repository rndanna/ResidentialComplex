<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40)->nullable();
            $table->boolean('isAvailable')->default(true);
            $table->foreignId('liter_id')
                ->constrained('liters')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('squareMeters');
            $table->smallInteger('entrance');
            $table->smallInteger('floor');
            $table->string('img');
            $table->integer('price');
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
        Schema::dropIfExists('apartaments');
    }
}
