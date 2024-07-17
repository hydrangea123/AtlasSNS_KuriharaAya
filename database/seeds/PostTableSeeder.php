<?php
use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::insert([
            [
              'user_id' => '1',
              'post' => '今起きた！',
            ],

            [
                'user_id' => '2',
                'post' => '柴犬買いたい',
            ],

            [
                'user_id' => '3',
                'post' => 'キャンプ行った',
            ],

            [
                'user_id' => '4',
                'post' => '今日の天気は…？',
            ],

            [
                'user_id' => '5',
                'post' => 'SNS課題取組中',
            ],

            [
                'user_id' => '6',
                'post' => 'サンプル',
            ],

            [
                'user_id' => '7',
                'post' => 'コメントください',
            ],
          ]);

    }
}
