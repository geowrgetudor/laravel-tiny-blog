<x-blog-layout>
    <slot:meta>
        <x-tb-meta :title="config('tiny-blog.blog.title', 'Blog')" :description="config('tiny-blog.blog.description', 'My awesome blog')" :keywords="config('tiny-blog.blog.keywords', 'blog')" :canonical="route('tinyblog.blog')" :image="config('tiny-blog.blog.image')"
            type="webite" />
    </slot:meta>

    <div class="max-w-7xl mx-auto px-4 md:px-8 xl:px-0 py-12">
        <h1 class="text-4xl font-semibold max-w-md leading-tight mb-12">
            {{ __('Blog') }}
        </h1>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($articles as $article)
                <div
                    class="relative flex flex-col rounded-lg ring-1 ring-gray-900/5 shadow bg-white overflow-hidden hover:shadow-md transition ease-linear duration-200">
                    @if ($article->img)
                        <div>
                            <a href="{{ route('tinyblog.article', ['slug' => $article->slug]) }}"
                                class="block overflow-hidden">
                                <img src="{{ $article->img }}" alt="{{ $article->title }}"
                                    class="object-cover w-full h-60" />
                            </a>
                        </div>
                    @endif

                    <div class="flex flex-col flex-grow gap-4 p-4 py-5">
                        <a href="{{ route('tinyblog.article', ['slug' => $article->slug]) }}">
                            <h3 class="font-bold line-clamp-2 text-lg">
                                {{ $article->title }}
                            </h3>
                        </a>

                        <a href="{{ route('tinyblog.article', ['slug' => $article->slug]) }}"
                            class="text-sm text-gray-500 line-clamp-2">
                            {{ $article->description }}
                        </a>

                        <a href="{{ route('tinyblog.article', ['slug' => $article->slug]) }}"
                            class="flex items-center gap-2 text-orange-400 uppercase tracking-wide text-sm group mt-auto">
                            {{ __('Read more') }}
                            <svg class="h-4 group-hover:translate-x-2 transition-transform ease-linear duration-200"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $articles->links('tiny-blog::parts.pagination') }}
    </div>
</x-blog-layout>
