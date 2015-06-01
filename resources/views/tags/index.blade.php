@extends('app')
@section('content')
	<h1>Tags</h1>
	<hr />
	@foreach ($tags as $tag)
		<div class="body">{{ $tag->name }}</div>
	@endforeach
@stop