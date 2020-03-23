<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $word = $request->input('word');

        if($word) {
        $posts = Post::where('title', 'like', '%'.$word.'%')
            ->paginate(5);

        // 件数取得
        $count = $posts->total();

        } else {
            return redirect('/home');
        }

        return view('search.index', compact('posts','count','word'));
    }
}
