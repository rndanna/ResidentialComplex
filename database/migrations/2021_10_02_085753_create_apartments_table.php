<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->boolean('isAvailable')->default(true);
            $table->integer('count_rooms');
            $table->integer('square');
            $table->integer('entrance');
            $table->integer('floor');
            $table->unsignedDouble('price');
            $table->timestamps();
            $table->foreignId('liter_id')
                ->constrained('liters')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
