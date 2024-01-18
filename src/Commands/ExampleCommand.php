<?php

namespace Geow\TinyBlog\Commands;

use Geow\TinyBlog\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ExampleCommand extends Command
{
    public $signature = 'tinyblog:example';

    public $description = 'Create example content for Tiny Blog';

    public function handle()
    {
        if (!is_dir(base_path('content')) || !is_dir(base_path('content/articles'))) {
            $this->error('Please initialize Tiny Blog first using tinyblog:init command.');

            return;
        }

        $content = Http::get('https://jaspervdj.be/lorem-markdownum/markdown.txt')->body();

        collect([
            [
                'title' => 'Just mountains. Feeling as free as a bird',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales vel magna eget ultrices. Suspendisse nec eleifend magna.',
                'img' => 'https://images.unsplash.com/photo-1682686579688-c2ba945eda0e?q=80&w=500&auto=format&fit=crop',
            ],
            [
                'title' => 'A day as a diver - Extreme fun',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales vel magna eget ultrices. Suspendisse nec eleifend magna.',
                'img' => 'https://images.unsplash.com/photo-1682686581295-7364cabf5511?q=80&w=500&auto=format&fit=crop',
            ],
            [
                'title' => 'Riding snowboards through fluffy snow',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales vel magna eget ultrices. Suspendisse nec eleifend magna.',
                'img' => 'https://plus.unsplash.com/premium_photo-1675147924852-69f8060a9acc?q=80&w=500&auto=format&fit=crop',
            ],
            [
                'title' => 'Backyard cabin - My go to place',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales vel magna eget ultrices. Suspendisse nec eleifend magna.',
                'img' => 'https://images.unsplash.com/photo-1705281238460-28fe48836205?q=80&w=500&auto=format&fit=crop',
            ],
            [
                'title' => 'Party like never before. Neon Festival',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales vel magna eget ultrices. Suspendisse nec eleifend magna.',
                'img' => 'https://images.unsplash.com/photo-1705360130924-71f23ff03cdf?q=80&w=500&auto=format&fit=crop',
            ],
            [
                'title' => 'Family roadtrip through Alaska',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales vel magna eget ultrices. Suspendisse nec eleifend magna.',
                'img' => 'https://images.unsplash.com/photo-1703866772340-048b3877605d?q=80&w=500&auto=format&fit=crop',
            ]
        ])->each(function ($article) use ($content) {
            Article::create([
                ...$article,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales vel magna eget ultrices. Suspendisse nec eleifend magna.',
                'date' => now()->toDateTimeString(),
                'keywords' => 'lorem-ipsum',
                'author' => 'George Tudor',
                'content' => $content,
            ]);
        });

        $this->info('Example articles published.');

        return self::SUCCESS;
    }
}
