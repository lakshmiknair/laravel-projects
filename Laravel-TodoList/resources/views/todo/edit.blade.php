@extends('layouts.app')
@section('content')
                    <h3 class="text-center">EDIT TODO</h3>
                   @if($errors->any())
                   <div class="alert alert-danger">
                   <ul>
                   @foreach($errors->all() as $err)
                     <li> {{$err}}</li>
                      @endforeach
                      </ul>
                   </div>
                   @endif
                   <form action="/todo/update/{{$todo->id}}" method="POST">
                   @csrf
                    <div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="hidden" name="id" value="{{$todo->id}}">
  <input type="text" class="form-control" name="name" value="{{$todo->name}}" id="name" placeholder="Name">
</div>
<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descritption">{{$todo->description}} </textarea>
</div>
<div class="mb-3">
<button type="submit" class="btn btn-primary mb-3">Update</button>
</div>
</form>
@endsection