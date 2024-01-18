<?php

namespace Geow\TinyBlog\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Meta extends Component
{
    public function render(): View
    {
        return view('tiny-blog::components.meta');
    }
}
