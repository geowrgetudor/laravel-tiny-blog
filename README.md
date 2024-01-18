<p align="center"><img src="/art/tiny-blog.png.png" alt="A tiny markdown blog package for Laravel"></p>

# A tiny markdown blog package for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/geowrgetudor/laravel-tiny-blog.svg?style=flat-square)](https://packagist.org/packages/geowrgetudor/laravel-tiny-blog)
[![Total Downloads](https://img.shields.io/packagist/dt/geowrgetudor/laravel-tiny-blog.svg?style=flat-square)](https://packagist.org/packages/geowrgetudor/laravel-tiny-blog)

Quickly add a Markdown blog to your Laravel app.

## Installation

You can install the package via composer:

```bash
composer require geowrgetudor/laravel-tiny-blog
```

Initialize the blog by running the following command. A directory called `content` will be create in the root of your project. That's where your markdown article will be stored.

```bash
php artisan tinyblog:init
```

Publish the assets:

```bash
php artisan tinyblog:publish
```

Publish the config file and configure it however you like it:

```bash
php artisan vendor:publish --tag="tiny-blog-config"
```

If you want some sample articles, you can publish our examples using:

```bash
php artisan tinyblog:example
```

Optionally, you can publish the views to customize and/or extend them

```bash
php artisan vendor:publish --tag="tiny-blog-views"
```

## Creating new articles

```php
use Geow\TinyBlog\Models\Article;

Article::create([
    'title' => 'My first article',
    'description' => 'Trying out Tiny Blog',
    'img' => 'https://images.unsplash.com/photo-1682686579688-c2ba945eda0e?q=80&w=500&auto=format&fit=crop',
    'content' => '## Hello world', // should be markdown content
    'author' => 'George Tudor',
    'date' => now()->toDateTimeString(),
]);
```

## Views

You can access the blog at `your-domain.com/blog`. You can change the route name in `tiny-config.php` config file.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [George Tudor](https://github.com/geowrgetudor)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
