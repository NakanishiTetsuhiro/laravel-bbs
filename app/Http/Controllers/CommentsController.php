<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Comment;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    // postでpost/にアクセスされた場合
    public function store(Request $request)
    {
        // INFO: $requestの中身のvalidateに失敗した場合は自動的にもとのページに戻される
        $validatedData = $request->validate([
            'commenter' => 'required',
            'comment'=>'required',
        ]);

        $comment = new Comment;
        $comment->commenter = Input::get('commenter');
        $comment->comment = Input::get('comment');
        $comment->post_id = Input::get('post_id');
        $comment->save();
        return Redirect::back()
            ->with('message', '投稿が完了しました。');
    }
}
