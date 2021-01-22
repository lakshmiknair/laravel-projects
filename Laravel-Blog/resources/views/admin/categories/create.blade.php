@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">
                @if(isset($category))
                Edit Category
                @else
                Add Category
                @endif
                </div>

                <div class="card-body">
                @include('admin/includes/errors')
                <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
               
                        @csrf
                        @if(isset($category))
@method('PUT')
@else
@method('POST')
@endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Category Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($category)?$category->name:''}}"  autocomplete="name" autofocus>
                        
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                           <!--     @if($errors->any)
                          @foreach($errors->all() as $error)
                            {{$error}}
                            @endforeach
                        @endif-->
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  @if(isset($category))
                                   UPDATE CATEGORY
                                   @else
                                   ADD CATEGORY
                                   @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
