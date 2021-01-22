@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">Edit Reply</div>
                <div class="card-body">

                @include('includes/errors')
                   <form action = "{{route('reply.update', ['id' => $reply->id] )}}" method="POST">
                   {{csrf_field()}}
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content:</label>

                            <div class="col-md-8">
                            <textarea id="content" col="5" row="5" class="form-control" name="content">{{$reply->content}}</textarea>                        
                            </div>

                        </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                            Save Reply
                            </button>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
@endsection
