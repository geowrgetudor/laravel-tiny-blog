<?php

namespace Geow\TinyBlog\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class InitCommand extends Command
{
    public $signature = 'tinyblog:init';

    public $description = 'Initialize Tiny Blog';

    public function handle(): int
    {
        if (!is_dir(base_path('content'))) {
            mkdir(directory: base_path('content/articles'), recursive: true);
        }

        Storage::blogDisk()->put('articles.json', collect([])->toJson());

        $this->info('Yey! Tiny Blog has been initialized. You can find everything under `/content`!');

        return self::SUCCESS;
    }
}
