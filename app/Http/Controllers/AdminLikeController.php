<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLikeController extends Controller
{
    public function index()
    {

        $posts = Auth::user()
            ->likes()
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('admin.like.index', compact('posts'));

    }
}
