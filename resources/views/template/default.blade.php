<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<title></title>
</head>
<body>
	@include('template.partials.nav')
	<div class="container">
		@include('template.partials.alert')
		@yield('content')
	</div>

</body>
</html>