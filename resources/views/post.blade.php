@extends('layout')
@section('content')
    <article>
        <h1>
            Title:
            {!! $post->title !!}
        </h1>
        <div>
            By <a href="authors/{{ $post->author->username }}">{{ $post->author->name }} </a> in category of: <a
                href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>

        </div>

        <div>
            <h3>This is the body of the Post: </h3>
            {!! $post->body !!}
        </div>


    </article>

    <a href="/">Go Back</a>
@endsection
