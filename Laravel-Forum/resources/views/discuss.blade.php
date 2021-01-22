@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">

                @include('includes/errors')
                   <form action = "{{route('discussions.store')}}" method="POST">
                   {{csrf_field()}}

                                        <div class="form-group row">
                                             <label for="channel" class="col-md-4 col-form-label text-md-right">Select Channel:</label>

                                                    <div class="col-md-6">
                                                    <select name="channel_id" class="form-control">
                                                    <option value="0">Select Channel</option>
                                                        @foreach ($channels as $channel)
                                                        <option value="{{$channel->id}}"  >{{$channel->title}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                         </div>
                                        <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">Discussion Title:</label>
                                                    <div class="col-md-6">
                                                        <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}"  autocomplete="name" autofocus>
                                                     </div>
                                         </div>


                                        <div class="form-group row">
                                            <label for="content" class="col-md-4 col-form-label text-md-right">Content:</label>

                                            <div class="col-md-8">
                                            <textarea id="content" col="5" row="5" class="form-control" name="content">{{old('content')}}</textarea>                        
                                            </div>

                                        </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                            ADD DISCUSSION
                                            </button>
                                        </div>
                                    </div>
                   </form>
                </div>
            </div>
@endsection
