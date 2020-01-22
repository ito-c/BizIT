<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id) 
    {
        //カテゴリー名表示
        $category = Category::findOrFail($id);

        $posts = Category::findOrFail($id)
            ->posts()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('category.index', compact('category', 'posts'));
    }

}
