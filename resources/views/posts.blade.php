@extends('layout')

@section('content')

    
    @foreach ($posts as $post)
    <article>

        <h1>
            Title: 
            <a href="/posts/{{ $post->slug }}">
                {!! $post->title !!}
            </a>
        </h1>

        <div>
            By <a href="authors/{{$post->author->username}}">{{$post->author->name}} </a> in category of: <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> 
             
          </div>

        <div>
            <h3>Excerpt:</h3>
            {{ $post->excerpt }}
        </div>

       

    </article>
    @endforeach


@endsection