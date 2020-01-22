<?php

namespace App\Http\ViewComposers;
use App\Post;
use Illuminate\View\View;

class LikeComposer
{
    protected $popular_posts;

    public function __construct()
    {
        $this->popular_posts = Post::withCount('like_users')
            ->orderBy('like_users_count', 'desc')
            ->get()
            ->take(3);
    }

    public function compose(View $view)
    {
        $view->with('popular_posts', $this->popular_posts);
    
    }
    
}
