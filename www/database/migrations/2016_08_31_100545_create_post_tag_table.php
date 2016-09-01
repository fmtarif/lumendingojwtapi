<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{

    public function up()
    {
        Schema::create('post_tag', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id')->unsigned()->index();
            $table->bigInteger('tag_id')->unsigned()->index();
            $table->foreign('post_id')
                ->references('post_id')
                ->on('posts')
                ->onDelete('cascade');
            $table->foreign('tag_id')
                ->references('tag_id')
                ->on('tags')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('post_tag');
    }
}
