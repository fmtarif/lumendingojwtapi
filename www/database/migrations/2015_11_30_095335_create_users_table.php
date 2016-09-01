<?php

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
            $table->increments('user_id');
            $table->string('name', 100);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();

            // unique key
            $table->unique('email');

            // indexes
            $table->index([
              'email',
              'password'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
