<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRemovedPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_id = Auth::id();

        $deletedPosts = Post::where('user_id', $auth_id)
            ->onlyTrashed()
            ->orderBy('deleted_at', 'desc')
            ->paginate(8);

        return view('admin.post.removed.index', compact('deletedPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $post = Post::onlyTrashed()->findOrFail($id);
        // policy認可
        $this->authorize('update', $post);
        $categories = Category::all();

        return view('admin.post.removed.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    /**
     * 物理削除
     */
    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        // policy認可
        $this->authorize('forceDelete', $post);
        $post->forceDelete();
        
        return redirect('admin/post/removed')->with('msg_success', 'ごみ箱から削除しました');
    }

}
