@extends('app')
@section('content')
	<div class="jumbotron">
		<h1>Bem vindo!</h1>
		<br>
		<p>
			<a class="btn btn-default btn-lg" href="/auth/login" role="button">Sign-in</a>
			<a class="btn btn-primary btn-lg" href="/auth/register" role="button">Sign-up</a>
		</p>
	</div>
@stop
