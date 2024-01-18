<x-blog-layout>
    <slot:meta>
        <x-tb-meta :title="$article->title" :description="$article->description" :keywords="$article->keywords" :canonical="route('tinyblog.article', ['slug' => $article->slug])" :image="$article->img"
            type="article" />
    </slot:meta>

    <div class="px-4 py-12 max-w-4xl mx-auto">
        <div class="my-12">
            <h1 class="text-5xl sm:text-6xl font-extrabold leading-tight">
                {{ $article->title }}
            </h1>

            <div class="flex flex-wrap sm:flex-nowrap gap-4 justify-between mt-10">
                <div class="text-gray-500">
                    {{ __('by :author', ['author' => $article->author]) }}
                </div>

                <div class="text-gray-500 flex items-center justify-end gap-2 text-sm">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M12 2C17.523 2 22 6.478 22 12C22 17.522 17.523 22 12 22C6.477 22 2 17.522 2 12C2 6.478 6.477 2 12 2ZM12 3.667C7.405 3.667 3.667 7.405 3.667 12C3.667 16.595 7.405 20.333 12 20.333C16.595 20.333 20.333 16.595 20.333 12C20.333 7.405 16.595 3.667 12 3.667ZM11.25 6C11.6295 6 11.9435 6.28233 11.9931 6.64827L12 6.75V12H15.25C15.664 12 16 12.336 16 12.75C16 13.1295 15.7177 13.4435 15.3517 13.4931L15.25 13.5H11.25C10.8705 13.5 10.5565 13.2177 10.5069 12.8517L10.5 12.75V6.75C10.5 6.336 10.836 6 11.25 6Z"
                            fill="currentColor"></path>
                    </svg>
                    <span>{{ $article->date }}</span>
                </div>
            </div>
        </div>

        @if ($article->img)
            <div class="rounded-xl overflow-hidden">
                <img src="{{ $article->img }}" alt="{{ $article->title }}" class="object-cover w-full h-[600px]" />
            </div>
        @endif

        <div
            class="prose prose-lg prose-headings:text-gray-800 prose-a:text-blue-500 prose-a:underline-offset-4 max-w-full my-12">
            {!! $content !!}
        </div>
    </div>
</x-blog-layout>
