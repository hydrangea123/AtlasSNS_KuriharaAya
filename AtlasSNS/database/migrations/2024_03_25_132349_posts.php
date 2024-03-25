<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
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
            $table->foreignId('user_id',11)->constrained('users');
            //外部キー制約と型の制約を一度につける
            $table->string('post',400);
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
        Schema::drop('posts');
    }
}
