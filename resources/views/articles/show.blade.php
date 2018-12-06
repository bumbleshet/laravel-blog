@extends('layouts.app')

@section('content')

@if(count($errors))
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		{{ $error }} <br>
		@endforeach
	</div>
@endif

{!! Form::open()!!}
    
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', $articles->title, ['class' => 'form-control', 'placeholder' => ' ex. Article Title']) !!}

<div class="form-group">
    {!! Form::label('body', 'Body: ') !!}
    {!! Form::textarea('body', $articles->body, ['class' => 'form-control']) !!}
    {!! Form::select('category', ['Tips', 'Technology', 'Health', ' Politics', 'Review'], $articles->category,['class' => 'form-control']) !!}
</div>

	{!! Form::submit('Add new Article', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@stop