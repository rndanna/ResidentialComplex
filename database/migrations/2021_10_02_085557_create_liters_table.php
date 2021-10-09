<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLitersTable extends Migration
{
    protected $dateFormat = 'd.m.Y';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->date('completion_date');
            $table->timestamps();
            $table->foreignId('complex_id')
                ->constrained('residential_complexes')
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
        Schema::dropIfExists('liters');
    }
}
