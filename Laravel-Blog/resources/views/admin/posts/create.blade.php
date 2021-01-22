@extends('layouts.app')
@section('content')

<div class="card">

    <div class="card-header">
    @if(isset($post))
    Edit Post
    @else
    Add Post
    @endif

    </div>

    <div class="card-body">
        <!-- <form method="POST" action="{{isset($post)?route('post.update',$post->id):route('post.store')}}" enctype="multipart/form-data">-->
        @include('admin/includes/errors')
        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
            @method('PUT')
            @else
            @method('POST')
            @endif
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Title:</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{isset($post)?$post->title:''}}"  autocomplete="title" autofocus>
            
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            
                </div>
            </div>
        
            <div class="form-group row">
            <label for="content" class="col-md-4 col-form-label text-md-right">Content:</label>

            <div class="col-md-8">
                <textarea id="content" col="5" row="5" class="form-control @error('content') is-invalid @enderror" name="content"   autocomplete="content" autofocus> {{isset($post)?$post->content:''}}</textarea>                        
            </div></div>
            <div class="form-group row">
                <label for="tags" class="col-md-4 col-form-label text-md-right">Tags :</label>

                <div class="col-md-6">
              
                    @foreach ($tags as $tag)
                   
<div class="form-check">
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="tag" name="tags[]" value="{{$tag->id}}">{{$tag->name}}
      </label>
    </div>

                    @endforeach
             
            </div></div>


            <div class="form-group row">
                <label for="category_id" class="col-md-4 col-form-label text-md-right">Category ID:</label>

                <div class="col-md-6">
                <select name="category_id" class="form-control">
                <option value="0">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" >{{$category->name}}</option>
                    @endforeach
               </select>
            </div></div>

            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Featured:</label>
                <div class="col-md-6">
                    <input id="featured" type="file" class="form-control @error('featured') is-invalid @enderror" name="featured" value="{{isset($post)?$post->featured:''}}">
            </div></div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      ADD POST
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
      $(document).ready(function() {
            $('#content').summernote();
      });
</script>
@endsection