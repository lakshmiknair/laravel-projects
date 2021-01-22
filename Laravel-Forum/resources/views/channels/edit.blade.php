@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">
               
                Update Channel {{$channel->title}}
              
                </div>

                <div class="card-body">
                @include('includes/errors')
                <form method="POST" action="{{route('channels.update',['channel'=> $channel->id])}}" enctype="multipart/form-data">
               
                    @csrf
                    @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Channel Title:</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$channel->title}}"  autocomplete="name" autofocus>
                        
                      
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                UPDATE CHANNEL
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
