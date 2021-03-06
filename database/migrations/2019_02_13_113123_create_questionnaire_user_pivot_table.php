<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_questionnaire', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('questionnaire_id')->unsigned()->index();
            $table->string('target')->nullable();
            $table->primary(['questionnaire_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_questionnaire');
    }
}
