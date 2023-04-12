<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntensivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intensives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onUpdate('cascade')->onDelete('cascade');
            $table->string('teckit_num')->unique();
            $table->integer('patient_status')->default('1');
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
        Schema::dropIfExists('intensives');
    }
}
