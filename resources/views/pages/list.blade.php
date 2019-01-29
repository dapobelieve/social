@extends('template.default')

@section('content')

<h1>Hello this is my List Page!</h1>
{{-- <p>{{ $dlist->name }}</p>
 --}}
@if($dlist->count() > 0)

	<ul>
	@foreach($dlist as $lis)
	 <li>{{ $lis->smallname }}</li>
	 <br>
	  <li> just the name >>>{{ $lis->name }}</li>
	  <br>
	  <br>
	@endforeach
	</ul>
@endif
	{{ $dlist->render() }}
@endsection