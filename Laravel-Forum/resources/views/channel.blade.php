@extends('layouts.app')
@section('content')
             @foreach($discussions as $discuss)
             <div class="card card-default" style="margin:20px;">
                <div class="card-header">
                    <img src="{{asset($discuss->user->avatar)}}" width="40px" height="40px"/>
                    <span>{{$discuss->user->name}}, <b>{{$discuss->created_at->diffForHumans()}}</b></span>
                    <a href="{{route('discussions.show',['slug'=>$discuss->slug])}}" class="btn btn-default pull-right">View</a>
                </div>
                <div class="card-body">
                     <h5 class="text-center">{{$discuss->title}}</h5>
                     <p> {{\Illuminate\Support\Str::limit($discuss->content,50)}}</p>
                </div>
                <div class="card-footer">              
                    {{$discuss->replies->count()}} Replies              
                </div>  
            </div>         
            @endforeach
            <div class="text-center">{{$discussions->links()}}</div>
@endsection
