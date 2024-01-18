<?php

namespace Geow\TinyBlog\Models;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Article extends Model
{
    use \Sushi\Sushi;

    public $sushiInsertChunkSize = 50;

    protected static string $storage = 'articles.json';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'img',
        'content',
        'author',
        'date',
    ];

    protected $schema = [
        'title' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'img' => 'string',
        'content' => 'string',
        'author' => 'string',
        'date' => 'string',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public static function create(array $data): self
    {
        $slug = Str::slug($data['title']);

        if (self::where('slug', $slug)->exists()) {
            throw new \Exception('An article with this title already exists.');
        }

        $currentData = Storage::blogDisk()->json(self::$storage) ?? [];
        $data['slug'] = $slug;
        $currentData[] = $data;

        Storage::blogDisk()->put(self::$storage, json_encode($currentData));

        Storage::blogDisk()->put("articles/{$slug}.md", $data['content']);

        return new static($data);
    }

    public function getRows(): array
    {
        return Storage::blogDisk()->json(self::$storage) ?? [];
    }

    public function exists(): bool
    {
        return Storage::blogDisk()->exists("articles/{$this->slug}.md");
    }

    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn () => Markdown::convert(Storage::blogDisk()->get("articles/{$this->slug}.md") ?? '')->getContent(),
        );
    }

    protected function img(): Attribute
    {
        return Attribute::make(
            get: function (string $value): string {
                if ($value) {
                    return $value;
                }

                if ($fallbackImage = config('tiny-blog.article_fallback_image')) {
                    return $fallbackImage;
                }

                return '';
            },
        );
    }

    protected function sushiShouldCache(): bool
    {
        return config('tiny-blog.cache', false);
    }
}
