@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">       
                
                              <!--  <a href="{{route('category.create')}}"><button type="submit" class="btn btn-primary">ADD CATEGORY  </button></a>-->
                              
                                <table class="table table-bordered " id="table" >
                <thead class="well">
                    <tr>                        
                        <th>Name</th>
                        
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
               <tbody>
                  @if($categories->count() >0)
                  @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>                               
                                <td><a class="btn btn-primary edit-student"  href="{{route('category.edit',['id'=>$category->id])}}" role="button">Edit</a></td>
                                <td><a class="btn btn-danger delete" onclick="handleDelete({{$category->id}});"  href="{{route('category.delete',['id'=>$category->id])}}" role="button">Delete</a></td>
                                </tr>
                       @endforeach                     
                @else
                        <tr><td colspan="8" class="text-center">NO RECORDS</td></tr>
                @endif
                </tbody>
            </table>
          <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
<form action="" method="POST" id="deleteCategoryForm">
@csrf
@method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete the category?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go Back</button>
        <button type="button" class="btn btn-danger">Yes, Delete</button>
      </div>  
    </div>
</form>
  </div>
</div>
                </div>
            </div>

@endsection
@section('script')
<script>
function handleDelete(id)
{
    var form  = document.getElementById('deleteCategoryForm');
    form.cation = '/categories/'+id;
    //console.log('deleting'+id)
    $('#deleteModal').modal('show');

}
</script>
@endsection