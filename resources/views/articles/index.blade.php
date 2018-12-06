@extends('layouts.app')

@section('content')

<h2>Blogs</h2>
<hr>
 @foreach($articles as $article)
 	<article>
		<h3><a href="{{ url('blogs/show/'.$article->id) }}"
			..
			>{{$article->title}}</a></h3>
 		<p>{{$article->body}}</p>
 		<a href="{{ url('blogs/tags/'.$category[$article->category]) }}">{{$category[$article->category]}}</a>
 	</article>
@endforeach

@stop
