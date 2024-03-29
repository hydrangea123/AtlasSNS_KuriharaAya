<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
        //
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id',11);  //PRIMARY
            $table->string('username',255);  //VARCHAR
            $table->string('mail_address',255)->unique();
            $table->string('password',255);
            $table->string('bio',400)->nullable();
            $table->string('images',255)->default('/public/images/icons/icon1.png');
           $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

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
         Schema::drop('users');
    }
}
