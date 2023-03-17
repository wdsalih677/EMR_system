<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsFinalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_final_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onUpdate('cascade');

			$table->bigInteger('ward_id')->unsigned()->nullable();
            $table->foreign('ward_id')->references('id')->on('wards')->onUpdate('cascade');

			$table->bigInteger('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onUpdate('cascade');

			$table->string('final_diagnosis', 255);
			$table->smallInteger('residence_type');
			$table->text('follow_up_date')->nullable();
			$table->text('treatment_diet');
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
        Schema::dropIfExists('patients_final_data');
    }
}
