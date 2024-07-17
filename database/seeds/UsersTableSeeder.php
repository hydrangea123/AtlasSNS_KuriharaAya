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
        'mail' => 'a@gmail.com',
        'password' => Hash::make('password'),
        'bio' => 'はじめまして！',
      ],
      [
        'username' => 'takada',
        'mail' => 'i@gmail.com',
        'password' => Hash::make('password'),
        'bio' => 'はじめまして！',
      ],
      [
        'username' => 'kawasaki',
        'mail' => 'u@gmail.com',
        'password' => Hash::make('password'),
        'bio' => 'はじめまして！',
      ],
      [
        'username' => 'tida',
        'mail' => 'e@gmail.com',
        'password' => Hash::make('password'),
        'bio' => 'はじめまして！',
      ],
      [
        'username' => 'haeada',
        'mail' => 'o@gmail.com',
        'password' => Hash::make('password'),
        'bio' => 'はじめまして！',
      ],
      [
        'username' => 'kosida',
        'mail' => 'k@gmail.com',
        'password' => Hash::make('password'),
        'bio' => 'はじめまして！',
      ],
      [
        'username' => 'haeada',
        'mail' => 'j@gmail.com',
        'password' => Hash::make('password'),
        'bio' => 'はじめまして！',
      ],
    ]);
    }
}
