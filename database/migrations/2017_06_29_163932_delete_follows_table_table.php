<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteFollowsTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('follows');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::create('follows', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->nullable();
        $table->integer('follower_id')->nullable();
        $table->integer('following_id')->nullable();
        $table->timestamps();
    });    }
   }
