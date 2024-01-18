<?php

namespace Geow\TinyBlog\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class BlogLayout extends Component
{
    public function render(): View
    {
        return view('tiny-blog::layouts.blog');
    }
}
