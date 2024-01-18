<?php

namespace Geow\TinyBlog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Geow\TinyBlog\TinyBlog
 */
class TinyBlog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Geow\TinyBlog\TinyBlog::class;
    }
}
