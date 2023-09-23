@extends('layout')
@section('content')
<article>
    <h1>
        {!!$post->title!!}
    </h1>
    <div>
       By <a href="#">{{$post->user->name}} in </a> <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> 
        
     </div>

    <div>
        {!!$post->body!!}
    </div>
  

</article>

<a href="/">Go Back</a>
@endsection