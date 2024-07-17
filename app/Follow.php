<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable =[
        'following=id', 'followed_id'
    ];

   protected $table = 'follows';
}


