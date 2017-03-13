<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller {

    public function index() {
        $postType = '文章總覽';

        $posts = \App\Models\Post::orderBy('created_at', 'desc')
                ->paginate(5);

        $data = compact('postType', 'posts');

        return view('posts.index', $data);
    }

    public function hot() {
        $postType = '熱門文章';

        $posts = \App\Models\Post::where('page_view', '>=', '100')
                ->orderBy('page_view', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

        $data = compact('postType', 'posts');
        return view('posts.index', $data);
    }

    public function random() {

        $post = \App\Models\Post::all()->random();

        $data = compact('post');

        return view('posts.show', $data);
    }

    public function create() {
        return view('posts.create');
    }

    public function show($id) {
        $post = \App\Models\Post::find($id);

        $post->page_view += 1;
        $post->save();

        $data = compact('post');

        return view('posts.show', $data);
    }

    public function edit($id) {
//        $data = compact('id');
        $post = \App\Models\Post::find($id);

        $data = compact('post');
        return view('posts.edit', $data);
    }

    public function store(Request $request) {
        //page_view 先隨便給個值...
        $inputData = $request->all();
        $inputData['page_view'] = rand(1, 200);

        $post = \App\Models\Post::create($inputData);
        return redirect()->route('posts.show', $post->id);
    }

    public function update($id, Request $request) {
        $post = \App\Models\Post::find($id);
        $post->update($request->all());

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($id, Request $request) {
        $post = \App\Models\Post::find($id);
        foreach ($post->comments as $comment) {
            $comment->delete();
        }
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function comment($id, Request $request) {
        $post = \App\Models\Post::find($id);

        $inputData = $request->all();
        $inputData['post_id'] = $post->id;

        $comment = \App\Models\Comment::create($inputData);

//        $post->comments()->save($comment);
        return redirect()->route('posts.show', $post->id);
    }

}
