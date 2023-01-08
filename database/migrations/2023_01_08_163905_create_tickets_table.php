<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
			$table->text('ticket_num')->unique();
			$table->text('identity_num')->unique();
			$table->text('address');
			$table->tinyInteger('gender')->default('1');
			$table->integer('age');
            $table->integer('age_type');
			$table->string('job', 255);
			$table->datetime('date_entry');
			$table->integer('phone_num')->unique();
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
        Schema::dropIfExists('tickets');
    }
}
