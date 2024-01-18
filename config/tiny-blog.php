<?php

return [
    'route' => [
        /**
         * The blog's homepage URL. Default to https://example.com/blog
         */
        'home' => env('TINYBLOG_HOME', 'blog'),

        /**
         * The article's URL. Default to https://example.com/blog/{article-slug}
         */
        'article' => env('TINYBLOG_ARTICLE', 'blog')
    ],

    'blog' => [
        /**
         * Meta title
         */
        'title' => 'Blog',

        /**
         * Meta description
         */
        'description' => 'My awesome blog',

        /**
         * Meta keywords separated by comma
         */
        'keywords' => 'awesome, blog',

        /**
         * Open Graph image
         */
        'image' => null,

        /**
         * Open Graph locale
         */
        'locale' => 'en_US'
    ],

    /**
     * URL to PNG favicon
     */
    'favicon' => null,

    /**
     * If no image was used for the article, it will fallback to this.
     * It should be full URL to image. Default to `null`, meaning
     * no image will be displayed.
     */
    'article_fallback_image' => null,


    /**
     * Number of articles per page.
     */
    'articles_per_page' => 9,

    /**
     * Tiny Blog uses calebporzio/sushi under the hood to store models.
     * Enable model caching will boost the performance of your app,
     * so make sure you do this in your production environment.
     */
    'model_cache' => env('TINYBLOG_CACHE', false),
];
