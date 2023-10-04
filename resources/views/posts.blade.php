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
       
        <x-post-featured-card :post="$posts[0]"/>

        {{-- <div class="lg:grid lg:grid-cols-2">
            <x-post-card/>
                <x-post-card/>
        </div>

        <div class="lg:grid lg:grid-cols-3">
            <x-post-card/>
                <x-post-card/>
                    <x-post-card/>
        </div> --}}
    </main>
</x-layout>