@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">
             Add User
                </div>

                <div class="card-body">
                @include('admin/includes/errors')
                <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
                
                        @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">User Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{isset($user)?$user->name:''}}"  autocomplete="name" autofocus>                     
                              </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Email:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{isset($user)?$user->email:''}}"   autofocus>                     
                              </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                ADD USER
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
