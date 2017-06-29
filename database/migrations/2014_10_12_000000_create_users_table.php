<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('username', 30)->unique()->nullable();
            $table->string('email', 50)->unique();
            $table->integer('school_id')->nullable();
            $table->string('status')->nullable();
            $table->text('biography')->nullable();
            $table->integer('premium')->default('0');
            $table->string('avatar')->nullable();
            $table->string('api_token')->unique()->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
