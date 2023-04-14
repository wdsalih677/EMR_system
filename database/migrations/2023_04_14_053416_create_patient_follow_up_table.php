<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientFollowUpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_follow_ups', function (Blueprint $table) {
            $table->id();
            $table->string('teckit_num')->unique();
            $table->bigInteger('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('ward_id')->unsigned();
            $table->foreign('ward_id')->references('id')->on('wards')->onUpdate('cascade')->onDelete('cascade');
            $table->string('final_diagnosis', 255);
			$table->smallInteger('residence_type');
            $table->text('notes');
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
        Schema::dropIfExists('patient_follow_up');
    }
}
