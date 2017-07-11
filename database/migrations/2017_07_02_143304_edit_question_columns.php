<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditQuestionColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('questions', function (Blueprint $table) {
        $table->text('question')->nullable()->change();
        $table->string('answer_true', 1)->nullable()->change();
        $table->text('option_a')->nullable()->change();
        $table->text('option_b')->nullable()->change();
        $table->text('option_c')->nullable()->change();
        $table->text('option_d')->nullable()->change();
    });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
