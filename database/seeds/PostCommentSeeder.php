<?php

use Illuminate\Database\Seeder;
use App\models\Post;
use App\models\Comment;
use App\models\Category;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';

        $commentdammy = 'コメントダミーです。ダミーコメントだよ。';

        for( $i = 1 ; $i <= 10 ; $i++) {
            $maxComments = mt_rand(3, 15);

            // 記事データ突っ込む
            $post = new Post;
            $post->title = "$i 番目の投稿";
            $post->content = $content;
            $post->cat_id = 1;
            $post->comment_count = $maxComments;
            $post->save();

            // 上記の記事データに対して$maxCommentsの数だけコメントのデータつっこむ
            for ($j=0; $j <= $maxComments; $j++) {
                $comment = new Comment;
                $comment->post_id = $post->id;
                $comment->commenter = '名無しさん';
                $comment->comment = $commentdammy;
                $comment->save();
            }
        }

        // カテゴリーを追加する
        $cat1 = new Category;
        $cat1->name = "電化製品";
        $cat1->save();

        $cat2 = new Category;
        $cat2->name = "食品";
        $cat2->save();
    }
}
