<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePostRequest;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_id = Auth::id();

        $posts = Post::with('category')
            ->where('user_id', $auth_id)
            ->orderBy('created_at','desc')
            ->paginate(8);

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        Post::create($input);

        return redirect('admin/post')->with('msg_success', '投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        // policy認可
        $this->authorize('update', $post);
        $categories = Category::all();

        return view('admin.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        // policy認可
        $this->authorize('update', $post);
        $post->fill($request->all())->save();

        return redirect('admin/post')->with('msg_success', '編集しました');
    }

    /**
     * Remove the specified resource from storage.
     * 論理削除
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        // policy認可
        $this->authorize('delete', $post);
        $post->delete();
        
        return redirect('admin/post')->with('msg_success', 'ごみ箱に移動しました');

    }


}