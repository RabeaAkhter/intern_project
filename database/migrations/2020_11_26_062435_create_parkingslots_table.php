<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkingslots', function (Blueprint $table) {
            $table->id();
            $table->string('slot_name');
            $table->integer('block_id');
            $table->integer('floor_id');
            $table->integer('slot_type');
            $table->string('status')->default('Available');

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
        Schema::dropIfExists('parkingslots');
    }
}
