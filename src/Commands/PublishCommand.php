<?php

namespace Geow\TinyBlog\Commands;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    public $signature = 'tinyblog:publish';

    public $description = 'Publishes Tiny Blog assets';

    public function handle(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'tiny-blog-assets',
            '--force' => true,
        ]);
    }
}
