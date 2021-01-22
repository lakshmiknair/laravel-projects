@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">
             Add Tag
                </div>

                <div class="card-body">
                @include('admin/includes/errors')
                <form method="POST" action="{{route('tag.store')}}" enctype="multipart/form-data">
                
                        @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tag Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($category)?$category->name:''}}"  autocomplete="name" autofocus>
                        
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                ADD TAG
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
