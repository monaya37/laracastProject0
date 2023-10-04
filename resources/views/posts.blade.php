<x-layout>
    {{-- @foreach ($posts as $post)
        <article>

            <h1>
                Title:
                <a href="/posts/{{ $post->slug }}">
                    {!! $post->title !!}
                </a>
            </h1>

            <div>
                By <a href="authors/{{ $post->author->username }}">{{ $post->author->name }} </a> in category of: <a
                    href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>

            </div>

            <div>
                <h3>Excerpt:</h3>
                {{ $post->excerpt }}
            </div>



        </article>
    @endforeach --}}

    {{-- why include?  --}}
    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())
            {{-- post passed here is a prop in the featured view and the posts[] is a collection of posts aka array of posts --}}
            <x-post-featured-card :post="$posts[0]" />

            @if ($posts->count() > 1)
                {{-- here we are skipping the first post which is posts[0] because its already used in the featured card --}}
                <div class="lg:grid lg:grid-cols-2">
                    @foreach ($posts->skip(1) as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>
            @endif
        @else
            <p class=text-center>No Posts Yet.</p>
        @endif

    </main>
</x-layout>
