@extends('layouts.app')
@section('content')
            <div class="card card-default" style="margin:20px;">
                <div class="card-header">
                    <img src="{{asset($discuss->user->avatar)}}" width="40px" height="40px"/>
                    <span>{{$discuss->user->name}}, <b>{{$discuss->created_at->diffForHumans()}}</b></span>
                    <span> <b>({{$discuss->user->points}})</b></span>
                    @if(Auth::id() == $discuss->user_id  && !$discuss->hasBestAnswer())
                    <span >  <a href="{{route('discussion.edit',['slug'=>$discuss->slug])}}" class="btn btn-primary float-right">Edit</a></span>
                    @endif
                    @if($discuss->is_being_watched_by_auth_user())
                    <span>   <a href="{{route('discussion.unwatch',['id'=>$discuss->id])}}" class="btn btn-primary float-right">Unwatch</a></span>
                    @else
                    <span>  <a href="{{route('discussion.watch',['id'=>$discuss->id])}}" class="btn btn-primary float-right">Watch</a></span>
                    @endif
                </div>
                <div class="card-body">
                     <h5 class="text-center">{{$discuss->title}}</h5>
                     <p>
                    
                      {!! Markdown::convertToHtml($discuss->content)!!}
                      
                      </p>
                  @if($best_answer)
                  @if(Auth::id() == $discuss->user_id)
                    <div class="card">
                    <h3>Best Answer</h3>
                         <div class="card-header"> 
                         
                         <img src="{{asset($best_answer->user->avatar)}}"/>
                          {{$best_answer->user->name}}(  {{$best_answer->user->points}})</div>
                        <div class="card-body">
                        {{$best_answer->content}}
                        </div>
                    </div>
                    @endif
                @endif
                </div>
                <div class="card-footer">              
                    {{$discuss->replies->count()}} Replies   
                  
                    <a href="{{route('channel', ['slug'=>$discuss->channel->slug])}}"  class="btn btn-primary" style="float:right">
                    {{$discuss->channel->title}}
                                </a>              
                </div>  
            </div> 
            @foreach($discuss->replies as $reply)
            <div class="card card-default" style="margin:20px;">
                <div class="card-header">
                    <img src="{{asset($reply->user->avatar)}}" width="40px" height="40px"/>
                    <span>{{$reply->user->name}}, <b>{{$reply->created_at->diffForHumans()}}</b></span>
                    <span> <b>({{$reply->user->points}})</b></span>
                    @if(Auth::id() == $discuss->user_id && !$reply->best_answer )
                    <span><a href="{{route('reply.edit',['id'=>$reply->id])}}" class="btn btn-primary float-right">Edit Reply</a></span>
                    @endif
                    @if(!$best_answer)
                    <a href="{{route('discussion.best.answer',['id' => $reply->id])}}" class="btn btn-primary float-right">Mark as best answer</a>
                    @endif
                </div>
                <div class="card-body">
                   
                     <p> {{$reply->content}}</p>
                </div>
                <div class="card-footer">
                @if($reply->is_liked_by_auth_user())
                    <a href="{{route('reply.unlike',['id' => $reply->id])}}" class="btn btn-danger">Unlike<span class="badge">{{$reply->likes->count()}}</a>
                @else
                    <a href="{{route('reply.like',['id' => $reply->id])}}" class="btn btn-success">Like <span class="badge">{{$reply->likes->count()}}</span></a>

                @endif
              
                          
                </div>  
            </div> 

            @endforeach

          
            <div class="card card-default" style="margin:20px;">
              
                <div class="card-body">     
                @if(Auth::id())
                <form action="{{route('discussions.reply', ['id' => $discuss->id])}}" method="POST">
                @csrf         
                   <div class="form-group">
                   <label> Leave a Reply</label>
                     <textarea class="form-control" name="content"></textarea>
                   </div>
                
                <div class="form-group">
                <button class="btn pull-right">Leave a reply</button>
                </div>
                </form>
                @else
                <div class="form-group">
                  <h2>sign In to Reply</h2>
                   </div>
                @endif
            </div> 
            </div>


@endsection
