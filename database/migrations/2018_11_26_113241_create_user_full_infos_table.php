<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFullInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_full_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('status')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('about')->nullable();
            $table->string('hobbies')->nullable();
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
        Schema::dropIfExists('user_full_infos');
    }
}
