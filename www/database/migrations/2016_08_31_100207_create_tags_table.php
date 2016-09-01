<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{

    public function up()
    {
        Schema::create('tags', function(Blueprint $table) {
            $table->bigIncrements('tag_id');
            $table->string('name', 100);
          	$table->string('name_raw', 100);
          	$table->string('tag_slug', 100);
            $table->boolean('type')->default(0);
          	$table->bigInteger('count')->default(0);
          	$table->integer('sort_order')->default(0);
          	$table->boolean('active')->default(0);
          	$table->softDeletes();
            $table->timestamps();

            // unique key
            $table->unique('tag_slug');

            //indexes
            $table->index([
                'type',
                'sort_order'
            ]);
        });
    }

    public function down()
    {
        Schema::drop('tags');
    }
}
