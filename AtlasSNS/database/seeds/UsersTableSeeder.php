<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::insert([
      [
        'username' => 'kurihara',
        'email' => 'a@gmail.com',
        'password' =>'aaaaaaaaaa',
        'bio' => 'はじめまして！',
        'images' => 'icon1.png',
      ],
      [
        'username' => 'takada',
        'email' => 'i@gmail.com',
        'password' =>'aaaaaaaaaa',
        'bio' => 'はじめまして！',
        'images' => 'icon2.png',
      ],
      [
        'username' => 'kawasaki',
        'email' => 'u@gmail.com',
        'password' =>'aaaaaaaaaa',
        'bio' => 'はじめまして！',
        'images' => 'icon3.png',
      ],
      [
        'username' => 'tida',
        'email' => 'e@gmail.com',
        'password' =>'aaaaaaaaaa',
        'bio' => 'はじめまして！',
        'images' => 'icon4.png',
      ],
      [
        'username' => 'haeada',
        'email' => 'o@gmail.com',
        'password' =>'aaaaaaaaaa',
        'bio' => 'はじめまして！',
        'images' => 'icon5.png',
      ],
      [
        'username' => 'kosida',
        'email' => 'k@gmail.com',
        'password' =>'aaaaaaaaaa',
        'bio' => 'はじめまして！',
        'images' => 'icon6.png',
      ],
      [
        'username' => 'haeada',
        'email' => 'j@gmail.com',
        'password' =>'aaaaaaaaaa',
        'bio' => 'はじめまして！',
        'images' => 'icon7.png',
      ],
    ]);
    }
}
