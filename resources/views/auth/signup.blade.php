@extends('template.default')

@section('content')
<h3>Sign Up</h3>
	<div class="row">	
		<div class="col-lg-6">
			<form class="form-vertical" role="form"  method="post" action="{{ route('auth.signup')}}">
				<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
					<label for="email" class="contorl-label">Your Email Address:</label>
					<input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: ''}}">
					@if($errors->has('email'))
						<span class="help-block">
							{{$errors->first('email')}}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('username') ? ' has-error' : ''}}">
					<label for="username" class="contorl-label">Username:</label>
					<input type="text" name="username" class="form-control" id="username" value="{{ Request::old('username') ?: ''}}">
					@if($errors->has('username'))
						<span class="help-block">
							{{$errors->first('username')}}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('pass') ? ' has-error' : ''}}">
					<label for="pass" class="contorl-label">Password:</label>
					<input type="password" name="pass" class="form-control" id="pass" value="">
					@if($errors->has('pass'))
						<span class="help-block">
							{{$errors->first('pass')}}
						</span>
					@endif
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-default">Sign Up</button>
				</div>

				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		</div>
	</div>


@stop