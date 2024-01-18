<?php

namespace Geow\TinyBlog\Http;

use Geow\TinyBlog\Models\Article;
use Illuminate\Contracts\View\View;

class BlogController
{
    public function __invoke(): View
    {
        return view('tiny-blog::blog', [
            'title' => __('Blog'),
            'articles' => Article::orderByDesc('date')->paginate(config('tiny-blog.articles_per_page'))
        ]);
    }
}
