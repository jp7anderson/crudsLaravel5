@extends('app')
@section('content')
	<h1>Articles</h1>

	@if (Auth::user())
		<a href="{{ url('/articles/create') }}">Create new Article</a>
	@endif

	<hr />
	@foreach ($articles as $article)
		<h2>
			<a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a>
		</h2>

		<div class="body">
			{{ $article->body }}
			@if (Auth::user())
				<div>
					<a href="{{ url('/articles/'.$article->id.'/edit') }}">Edit</a> /
					<span>Delete</span>
				</div>
			@endif
		</div>
	@endforeach
@stop