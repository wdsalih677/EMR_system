<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiometricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biometrics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('intensive_id')->unsigned();
            $table->foreign('intensive_id')->references('id')->on('intensives')->onUpdate('cascade')->onDelete('cascade');



            $table->decimal('Pulse');
            $table->time('Pulse_time');

            $table->decimal('RR');
            $table->time('RR_time');

            $table->decimal('BP')->nullable();
            $table->time('BP_time')->nullable();

            $table->decimal('Temp');
            $table->time('Temp_time');

            $table->decimal('ABD')->nullable();
            $table->time('ABD_time')->nullable();

            $table->decimal('V_Bleeding')->nullable();
            $table->time('V_Bleeding_time')->nullable();

            $table->decimal('U_O_P')->nullable();
            $table->time('U_O_P_time')->nullable();

            $table->decimal('suger');
            $table->time('suger_time');

            $table->decimal('So2');
            $table->time('So2_time');

            $table->integer('Pain_score')->default('1');
            $table->time('Pain_score_time');
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
        Schema::dropIfExists('biometrics');
    }
}
