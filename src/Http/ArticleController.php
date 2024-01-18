<?php

namespace Geow\TinyBlog\Http;

use Geow\TinyBlog\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class ArticleController
{
    public function __invoke(): View
    {
        $article = Article::where('slug', request('slug'))->firstOrFail();

        return view('tiny-blog::article', [
            'title' => $article->title,
            'article' => $article,
            'content' => $article->content
        ]);
    }
}
