@extends('layouts.app')
@section('content')
                    <h3>TODO LIST </h3>
            <ul class="list-group">       
              @foreach($tasks as $task)
              <li class="list-group-item">
                {{$task->name}}
               
                @if($task->completed == false)
               <a class="badge badge-primary float-right" href="/todo/complete/{{$task->id}}">
              
                Complete Task </a>
               @endif
               
               <a class="badge badge-primary float-right" href="/todo/delete/{{$task->id}}"> Delete </a>
               <a class="badge badge-primary float-right" href="/todo/edit/{{$task->id}}"> Update </a>
               <a class="badge badge-primary float-right" href="/todo/{{$task->id}}"> View </a>
              
                </li>
              @endforeach
              </ul>
@endsection