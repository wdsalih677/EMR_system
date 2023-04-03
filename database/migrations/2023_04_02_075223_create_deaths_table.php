<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deaths', function (Blueprint $table) {
            $table->id();
            $table->string('lateName',255);
            $table->text('lateIdentity')->unique();
            $table->string('fatherName',255);
            $table->tinyInteger('gender')->default('1');
            $table->string('job',255);
            $table->integer('age');
            $table->integer('age_type');
            $table->string('dateDeathChar',255);
            $table->string('placeDeath',255);
            $table->dateTime('dateDeathNum');
            $table->text('caseOfDeath');
            $table->text('otherCaseOfDeath');
            $table->string('pathologicalCase',255);
            $table->string('otherComplications');
            $table->string('informerNmae',255);
            $table->text('informerIdentity');
            $table->string('documentEditorName',255);
            $table->text('documentEditorIdentity');
            $table->softDeletes();
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
        Schema::dropIfExists('deaths');
    }
}
