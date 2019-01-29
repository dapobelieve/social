@extends('template.default')

@section('content')
	<div class="row">
	    <div class="col-lg-5">
	        @include('user.partials.userblock')
	        <hr> 
		         @if(!$stats->count())
		        	<p>There is nothing in your timeline</p>
		        @else
		        	@foreach($stats as $stat)
		        		@include('timeline.partials.feed')
		        	@endforeach
		        @endif
	    </div> 
	    <div class="col-lg-4 col-lg-offset-3">


	    	@if(Auth::user()->hasFriendRequestPending($user))
	    		{{-- the current logged in user checking a users profile he'd sent request to
	    		this is ti see if his request has been accepted or not --}}
				<p>Waiting for {{  $user->getNameOrUsername() }} to accept your request.</p>
			@elseif(Auth::user()->hasFriendRequestReceived($user))
				<a href="{{ route('friends.accept', ['username' => $user->username]) }}" class="btn btn-primary">Accept Friend Request</a>
			@elseif(Auth::user()->isFriendsWith($user))
				<p>You and {{ $user->getNameOrUsername() }} are friends.</p>
			@elseif(Auth::user()->id != $user->id)
				<a href="{{ route('friends.add', ['username'=> $user->username])}}" class="btn btn-primary">Add as friend</a>
	    	@endif
	        <h4>{{ $user->getFirstNameOrUsername() }}'s friends.</h4>
	        @if(!$user->friends()->count())
	        	<p>{{ $user->getFirstNameOrUsername() }} has no friends.</p>
	        @else
				@foreach($user->friends() as $user)
				    @include('user.partials.userblock')
				@endforeach
	        @endif
	    </div>
	</div>
@stop