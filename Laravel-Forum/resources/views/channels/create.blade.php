@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">
             Add Channel
                </div>

                <div class="card-body">
                @include('includes/errors')
                <form method="POST" action="{{route('channels.store')}}" enctype="multipart/form-data">
               
                        @csrf
                 <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Channel Name:</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value=""  autocomplete="name" autofocus>
                        
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                 ADD CHANNEL
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
