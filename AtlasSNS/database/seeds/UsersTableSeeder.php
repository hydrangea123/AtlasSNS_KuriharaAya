<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('users')->insert([
            'username' => 'Atlas一郎',
            'mail' => 'xxxx@gmail.com',
            'password' => bcrypt('Atlas1111'),
            'bio' => 'はじめまして！'
         ]);
    }
}
