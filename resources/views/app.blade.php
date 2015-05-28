<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" href="/css/all.css">
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	</head>
<body>

	<div class="container">
		@include('partials.nav')

		@include('flash::message')

		@yield('content')
	</div>

	<script src="/js/all.js"></script>
	
	<script>
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);
		
		$('#tag_list').select2({
			placeholder: 'Choose a tag',
			tags: true
		});
	</script>
</body>
</html>