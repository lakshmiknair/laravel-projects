@extends('layouts.app')
@section('content')

<div class="card">

    <div class="card-header">
  Profile

    </div>

    <div class="card-body">
   
        @include('admin/includes/errors')
        <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
            @csrf
          
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">User Name:</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($user)?$user->name:''}}"  autocomplete="name" autofocus>
                        
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Email:</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
            </div></div>
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Password:</label>
                <div class="col-md-6">
                    <input id="email" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="">
            </div></div>
            <div class="form-group row">
            <label for="content" class="col-md-4 col-form-label text-md-right">About:</label>

            <div class="col-md-6">
                <textarea id="about" class="form-control @error('about') is-invalid @enderror" name="about"  autocomplete="about" autofocus> {{$user->profile->about}}</textarea>                        
            </div></div>
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Facebook:</label>
                <div class="col-md-6">
                    <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{$user->profile->facebook}}">
            </div></div>
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Youtube:</label>
                <div class="col-md-6">
                    <input id="youtube" type="text" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{$user->profile->youtube}}">
            </div></div>
             <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Avatar:</label>
                <div class="col-md-6">
                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
            </div></div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                     UPDATE PROFILE
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
