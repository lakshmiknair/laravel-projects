@extends('layouts.app')
@section('content')
                    <h3 class="text-center">CREATE TODO</h3>
                   @if($errors->any())
                   <div class="alert alert-danger">
                   <ul>
                   @foreach($errors->all() as $err)
                     <li> {{$err}}</li>
                      @endforeach
                      </ul>
                   </div>
                   @endif
                   <form action="store" method="POST">
                   @csrf
                    <div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" name="name" id="name" placeholder="Name">
</div>
<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
</div>
<div class="mb-3">
<button type="submit" class="btn btn-primary mb-3">Create</button>
</div>
</form>
@endsection