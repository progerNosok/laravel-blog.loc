<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('image');
            $table->text('description');
            $table->integer('category_id');
//            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('user_id');
//            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('status')->default(false);
            $table->integer('view')->default(1);
            $table->boolean('is_featured')->default(false);
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
        Schema::dropIfExists('posts');
    }
}
