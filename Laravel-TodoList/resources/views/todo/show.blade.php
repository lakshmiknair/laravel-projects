@extends('layouts.app')
@section('content')           
         <br> <h3> {{$todoView->name}} </h3>
         <br>
         Details
         <div>
         {{$todoView->description}}
         </div>
 @endsection
