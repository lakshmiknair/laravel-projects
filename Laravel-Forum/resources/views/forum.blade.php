@extends('layouts.app')
@section('content')
             @foreach($discussions as $discuss)
             <div class="card card-default">
                <div class="card-header">
                    <img src="{{asset($discuss->user->avatar)}}" width="40px" height="40px"/>
                    <span>{{$discuss->user->name}}, <b>{{$discuss->created_at->diffForHumans()}}</b></span>
                   
                    @if($discuss->hasBestAnswer())
                    <span style="float:right;">CLOSED</b></span>
                    @else 
                    <span style="float:right;">OPEN</b></span>
                    @endif
                    <a href="{{route('discussions.show',['slug'=>$discuss->slug])}}" class="btn btn-default float-right">View</a>
                </div>
                <div class="card-body">
                     <h5 class="text-center">{{$discuss->title}}</h5>
                     <p> {{\Illuminate\Support\Str::limit($discuss->content,50)}}</p>
                </div>
                <div class="card-footer">              
                    {{$discuss->replies->count()}} Replies 
                    <a href="{{route('channel', ['slug'=>$discuss->channel->slug])}}"  class="btn btn-primary" style="float:right">
                    {{$discuss->channel->title}}
                                </a>           
                </div>  
            </div>         
            @endforeach
            <div class="text-center">{{$discussions->links()}}</div>
@endsection
