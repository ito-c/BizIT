<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryRequest;
use Illuminate\Http\Request;

class MasterCategoryRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryRequests = CategoryRequest::orderBy('created_at', 'desc')
            ->paginate(5);

        return view('master.category_request.index', compact('categoryRequests'));
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

    // 申請承認用
    public function store(Request $request)
    {
        // viewからid受け渡し、コレクション格納
        $categoryRequest = CategoryRequest::findOrFail($request->id);

        // インスタンス化
        $category = new Category();
        $category->fill(['name' => $categoryRequest->name])->save();

        // リクエストは論理削除
        $categoryRequest->delete();

        return redirect('master/category_request')
            ->with('msg_success', '「'. $categoryRequest->name .'」を承認しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryRequest = CategoryRequest::findOrFail($id);

        return view('master.category_request.detail.index', compact('categoryRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // 申請拒否用
    public function destroy($id)
    {
        // URLからidを引き継ぎ。インスタンス化
        $categoryRequest = CategoryRequest::findOrFail($id);
        // リクエストを論理削除
        $categoryRequest->delete();

        return redirect('master/category_request')->with('msg_success', '「'. $categoryRequest->name .'」を否認しました');
    }

}
