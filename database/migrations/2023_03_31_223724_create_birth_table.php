<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth', function (Blueprint $table) {
            $table->id();
            $table->string('newBornName',255);
            $table->string('nameMother',255);
            $table->string('namefather',255);
            $table->string('residencePlace',255);
            $table->text('motherIdentity');
            $table->text('fatherIdentity');
            $table->string('birthDataChar',255);
            $table->tinyInteger('birthPlace')->default('1');
            $table->tinyInteger('gender')->default('1');
            $table->text('birthDataNum',255);
            $table->string('informerNmae',255);
            $table->text('informerIdentity');
            $table->string('documentEditorName',255);
            $table->text('documentEditorIdentity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('birth');
    }
}
