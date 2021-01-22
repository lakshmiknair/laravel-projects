@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
        
                                <table class="table table-bordered " id="table" >
                <thead class="well">
                    <tr>                        
                        <th>Image</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Restore</th>
                        <th>
                        Delete</th>
                    </tr>
                </thead>
               <tbody>
                  @if($posts->count() > 0 )
                  @foreach($posts as $post)
                            <tr>
                               <td><img width="40px" height="40px" src="{{$post->featured}}"/></td> 
                                <td>{{$post->title}}</td>                               
                                <td><a class="btn btn-default edit-student"  href="{{route('post.edit',$post->id)}}" role="button">Edit</a></td>
                                <td>
                                <a class="btn btn-success delete" onclick="handleDelete({{$post->id}});"  href="{{route('post.restore',$post->id)}}" role="button">Restore</a>
                               </td><td> <a class="btn btn-danger delete" onclick="handleDelete({{--$post->id--}});"  href="{{route('post.kill',$post->id)}}" role="button">Delete</a>
                                </td>
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
<form action="" method="POST" id="deletePostForm">
@csrf
@method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete the post?
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
    var form  = document.getElementById('deletePostForm');
    form.cation = '/post/'+id;
    //console.log('deleting'+id)
    $('#deleteModal').modal('show');

}
</script>
@endsection