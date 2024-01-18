<?php

namespace Geow\TinyBlog;

use Geow\TinyBlog\Commands\ExampleCommand;
use Geow\TinyBlog\Commands\InitCommand;
use Geow\TinyBlog\Commands\PublishCommand;
use Geow\TinyBlog\Components\BlogLayout;
use Geow\TinyBlog\Components\Meta;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Compilers\BladeCompiler;

class TinyBlogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-tiny-blog')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasRoute('web')
            ->hasCommands([
                InitCommand::class,
                PublishCommand::class,
                ExampleCommand::class
            ]);

        $this->bootMacros();
        $this->bootBladeComponents();
    }

    private function bootMacros(): void
    {
        Storage::macro('blogDisk', function () {
            return Storage::build([
                'driver' => 'local',
                'root' => base_path('content'),
                'throw' => false,
            ]);
        });
    }

    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $blade->component(BlogLayout::class, 'blog-layout');
            $blade->component(Meta::class, 'meta', 'tb');
        });
    }
}
