@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
        
                <table class="table table-bordered " id="table" >
                <thead class="well">
                    <tr>                        
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
               <tbody>
                  @if($products->count() > 0)
                  @foreach($products as $product)
                            <tr>
                               <td><img width="40px" height="40px" src="{{$product->image}}"/></td> 
                                <td>{{$product->name}}</td>                               
                                <td>{{$product->price}}</td> 
                                <td><a class="btn btn-primary edit-student"  href="{{route('products.edit',['product' => $product->id] )}}" role="button">Edit</a></td>
                                <td>
                                <form method="POST" action="{{route('products.destroy',['product'=> $product->id])}}" enctype="multipart/form-data">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger delete" name="Delete" value="Delete">Delete</button>
                               </form>
                                </td>
                                </tr>
                       @endforeach                     
                @else
                        <tr><td colspan="8" class="text-center">NO RECORDS</td></tr>
                @endif
                </tbody>
                </table>
                <div>{{$products->links()}}</div>
                </div>
            </div>
 
@endsection

