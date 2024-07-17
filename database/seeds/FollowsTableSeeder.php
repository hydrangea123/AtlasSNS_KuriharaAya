<?php
use App\Follow;
use Illuminate\Database\Seeder;
class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Follow::insert([
        [
        'following_id' =>'1',
        'followed_id'  =>'2',
        ],
        [
        'following_id' =>'1',
        'followed_id'  =>'3',
        ],
        [
        'following_id' =>'1',
        'followed_id'  =>'4',
        ],
        [
        'following_id' =>'1',
        'followed_id'  =>'5',
        ],
        [
        'following_id' =>'2',
        'followed_id'  =>'1',
        ],
        [
        'following_id' =>'2',
        'followed_id'  =>'5',
        ],
        [
        'following_id' =>'3',
        'followed_id'  =>'5',
        ],
        [
        'following_id' =>'3',
        'followed_id'  =>'7',
        ],
        [
        'following_id' =>'4',
        'followed_id'  =>'5',
        ],
        [
        'following_id' =>'6',
        'followed_id'  =>'7',
        ],
        [
        'following_id' =>'7',
        'followed_id'  =>'1',
        ],
        [
        'following_id' =>'5',
        'followed_id'  =>'6',
        ]
    ]);
}
}
