<?php

namespace App\Http\ViewComposers;
use App\Category;
use Illuminate\View\View;

class CategoryComposer
{
    
    public function compose(View $view)
    {
        $categories = Category::all();
        $view->with('categories', $categories);
    }
}
