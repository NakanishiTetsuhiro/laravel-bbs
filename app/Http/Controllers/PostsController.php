<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでpost/にアクセスされた場合
    public function index()
    {
        $posts = Post::all();
        return View('bbs.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでpost/createにアクセスされた場合
    public function create()
    {
        return View('bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // postでpost/にアクセスされた場合
    public function store(Request $request)
    {
        // INFO: $requestの中身のvalidateに失敗した場合は自動的にもとのページに戻される
        $validatedData = $request->validate([
            'title' => 'required',
            'content'=>'required',
            'cat_id' => 'required',
        ]);

        $post = new Post;
        $post->title = Input::get('title');
        $post->content = Input::get('content');
        $post->cat_id = Input::get('cat_id');
        $post->save();
        return Redirect::back()
            ->with('message', '投稿が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return View('bbs.single', [
            'post' => $post,
        ]);
    }
}
