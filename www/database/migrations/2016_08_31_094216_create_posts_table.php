<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function(Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->string('title', 200);
            $table->string('title_slug', 200);
            $table->string('url', 2083)->nullable();
            $table->longText('description')->nullable();
            $table->boolean('type')->default(0);
            $table->bigInteger('user_id')->default(0);
          	$table->integer('sort_order')->default(0);
          	$table->boolean('active')->default(0);
          	$table->softDeletes();
            $table->timestamps();

            // unique key
            $table->unique('title_slug');

            //indexes
            $table->index([
                'type',
                'sort_order'
            ]);
        });
    }

    public function down()
    {
        Schema::drop('posts');
    }
}
