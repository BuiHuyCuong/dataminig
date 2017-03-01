<?php

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
        Schema::create('kn_blog_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('body');

            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('cate_id')->on('kn_blog_categories')->onDelete('cascade');
            $table->tinyInteger('status')->default(1);
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
        Schema::drop('kn_blog_posts');
    }
}
