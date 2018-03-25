<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Comments(){
        // 投稿はたくさんのコメントを持つ
        return $this->hasMany('App\models\Comment', 'post_id');
    }

    public function Category(){
        // 投稿は1つのカテゴリーに属する
        return $this->belongsTo('App\models\Category','cat_id');
    }
}