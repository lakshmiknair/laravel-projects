@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
        
                                <table class="table table-bordered " id="table" >
                <thead class="well">
                    <tr>                        
                        <th>Image</th>
                        <th>Name</th>
                        <th>Permission</th>
                        
                        <th>Delete</th>
                    </tr>
                </thead>
               <tbody>
                  @if($users->count() > 0)
                  @foreach($users as $user)
                            <tr>
                               <td><img style="border-radius:40px;" width="40px" height="40px" src="{{$user->profile->avatar}}"/></td> 
                                <td>{{$user->name}}</td>                               
                                <td>
                                @if($user->admin)
                                <a class="btn btn-danger"  href="{{route('user.not_admin',$user->id)}}" role="button">Remove Permssions</a>
                                @else
                                <a class="btn btn-primary"  href="{{route('user.admin',$user->id)}}" role="button">Make Admin</a>
                                @endif
                                </td>  
                                <td>  
                                
                                @if(Auth::id() != $user->id)                                                             
                                <a class="btn btn-danger delete" onclick="handleDelete({{$user->id}});"  href="{{route('user.delete',$user->id)}}" role="button">Delete</a>
                                @endif
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