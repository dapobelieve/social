<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>{{ $user->name }}</h1>

	<p> Lorem Ipsum Dolor...</p>


	<hr>
	@foreach($user->tasks as $utask)
		<h3>Title: {{ $utask->name }}</h3>

		<p>Body: {{ $utask->description }}</p>
	@endforeach

</body>
</html>