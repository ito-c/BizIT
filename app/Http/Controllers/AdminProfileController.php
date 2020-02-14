<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();

        if($auth->photo_id !== null) {
            $path = Storage::disk('s3')->url('profile/'. $auth->photo->filename);
        } else {
            $path = asset('img/no_image.png');
        }

        return view('admin.profile.index', compact('auth','path'));
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
        $auth = Auth::user();

        return view('admin.profile.edit', compact('auth'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        
        $input = $request->all();        

        if($file = $request->file('photo_id')) {
            $name = time().'_'.$file->getClientOriginalName();
            $disk = Storage::disk('s3')->putFileAs('/profile', $file, $name,'public');

            // Photoテーブルへファイル名保存
            $image = Photo::create(['filename' => $name]);
            // user(Auth::user)テーブルへの保存準備 Photoテーブルのレコードid
            $input['photo_id'] = $image->id;
        }

        // ログインユーザー情報更新処理
        $auth = Auth::user();
        $auth->fill($input)->save();
        
        return redirect('admin/profile')->with('msg_success', '編集しました');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
