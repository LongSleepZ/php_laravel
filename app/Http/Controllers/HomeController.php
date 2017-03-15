<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $postType = '精選文章';

        $posts = \App\Models\Post::where('is_feature', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(5);

        $data = compact('postType', 'posts');
        return view('home', $data);
    }

}
