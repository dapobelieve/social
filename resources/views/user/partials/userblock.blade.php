<div class="media">
    <a class="pull-left" href="{{ route('profile.index', ['username'=> $user->username])}}">
        <img class="media-object" alt="{{-- {{ $user->getNameOrUsername() }} --}}" src="{{$user->getAvatar()}}">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="{{ route('profile.index', ['username'=> $user->username])}}">{{ $user->getNameOrUsername() }}</a></h4>
        @if($user->location)
        	{{ $user->location }}
        @endif
    </div>
</div>