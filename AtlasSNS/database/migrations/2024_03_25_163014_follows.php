<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Follows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('posts', function (Blueprint $table) {
            $table->increments('id',11);  //PRIMARY
            $table->string('following_id',11);
            $table->string('followed_id',11);
            $table->timestamps('created_at');
            $table->timestamps('updated_at');

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
         Schema::drop('follows');
    }
}
