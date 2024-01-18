<?php

use Geow\TinyBlog\Http\ArticleController;
use Geow\TinyBlog\Http\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/' . config('tiny-blog.route.home'), BlogController::class)->name('tinyblog.blog');
Route::get('/' . config('tiny-blog.route.article') . '/{slug}', ArticleController::class)->name('tinyblog.article')->where('slug', '^[a-z0-9]+(?:-[a-z0-9]+)*$');
