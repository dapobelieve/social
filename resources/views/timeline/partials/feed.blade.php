<div class="media">
					    <a class="pull-left" href="{{$stat->Duser->getNameOrUsername()}}">
					        <img class="media-object" alt="{{$stat->Duser->getNameOrUsername()}}" src="{{ $stat->Duser->getAvatar()}}">
					    </a>
					    <div class="media-body">
					        <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $stat->Duser->username])}}">{{$stat->Duser->getNameOrUsername()}}</a></h4>
					        <p>{{$stat->body}}</p>
					        <ul class="list-inline">
					            <li>{{ $stat->created_at->diffForHumans()}}</li>
					            @if($stat->Duser->id !== Auth::user()->id)
					            	<li><a href="{{ route('status.like', ['statusId'=> $stat->id])}}">Like</a></li>
					            @endif
					            <li>{{ $stat->likes->count()}} {{ str_plural('like', $stat->likes->count() )}}</li>
					        </ul>
							
							@foreach($stat->replies as $reply)
						        <div class="media">
						            <a class="pull-left" href="{{ route('profile.index', ['username' => $reply->Duser->username]) }}">
						                <img class="media-object" alt="{{ $reply->Duser->getNameOrUsername() }}" src="{{ $stat->Duser->getAvatar()}}">
						            </a>
						            <div class="media-body">
						                <h5 class="media-heading"><a href="{{ route('profile.index', ['username' => $reply->Duser->username])}}">{{ $reply->Duser->getNameOrUsername() }}</a></h5>
						                <p>{{ $reply->body }}</p>
						                <ul class="list-inline">
						                    <li>{{ $reply->created_at->diffForHumans()}}</li>
						                    @if($reply->Duser->id !== Auth::user()->id)
						                    	<li><a href="{{ route('status.like', ['statusId'=> $reply->id])}}">Like</a></li>
						                    @endif
						                    <li>{{ $reply->likes->count()}} {{ str_plural('like', $reply->likes->count() )}}</li>                
						                </ul>
						            </div>
						        </div>
					        @endforeach

					        <form role="form" action="{{ route('status.reply', ['statusId' => $stat->id])}}" method="post">
					            <div class="form-group{{ $errors->has("reply-{$stat->id}") ? " has-error" : "" }}">
					                <textarea name="reply-{{$stat->id}}" class="form-control" rows="2" placeholder="Reply to this status"></textarea>
					                @if($errors->has("reply-{$stat->id}"))
					                	<span class="help-block">
					                		{{$errors->first("reply-{$stat->id}")}}
					                	</span>
					                @endif
					            </div>
					            <input type="submit" value="Reply" class="btn btn-default btn-sm">
					            <input type="hidden" name="_token" value="{{ Session::token() }}">
					        </form>
					    </div>
					</div>