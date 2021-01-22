@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">
               
                Update Category {{$category->name}}
              
                </div>

                <div class="card-body">
                @include('admin/includes/errors')
                <form method="POST" action="{{route('category.update',['id'=> $category->id])}}" enctype="multipart/form-data">
               
                    @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Category Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$category->name}}"  autocomplete="name" autofocus>
                        
                      
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                UPDATE CATEGORY
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
