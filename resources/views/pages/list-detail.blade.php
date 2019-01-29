@extends('template.default')

@section('content')

<h1>Hello this is my List Page for record {{ $listdata->id }}</h1>

<h2>Title: {{ $listdata->name }}</h2>
<br>

<span>created:  {{ $listdata->created_at }} </span>
<br>
<span>last updated: {{ $listdata->updated_at }} </span>

<p>
	{{ $listdata->description }}
</p>

@endsection