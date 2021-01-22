@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">Channels</div>

                <div class="card-body">       
                
                              
                                <table class="table table-bordered " id="table" >
                <thead class="well">
                    <tr>                        
                        <th>Name</th>
                        
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
               <tbody>
                  @if($channels->count() >0)
                  @foreach($channels as $channel)
                            <tr>
                                <td>{{$channel->title}}</td>                               
                                <td><a class="btn btn-primary edit-student"  href="{{route('channels.edit',['channel'=>$channel->id])}}" role="button">Edit</a></td>
                                <td>
                                 <form action="{{route('channels.destroy',['channel'=>$channel->id])}}" method="POST">
                                  @csrf                                
                                  @method('DELETE')
                                  <button class="btn btn-danger delete" type="submit" role="button" name="Delete">Destroy
                                  </form>
                                  </td>
                                </tr>
                       @endforeach                     
                @else
                        <tr><td colspan="8" class="text-center">NO RECORDS</td></tr>
                @endif
                </tbody>
            </table>

                </div>
            </div>

@endsection

