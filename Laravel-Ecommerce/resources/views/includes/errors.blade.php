 @if(count($errors) >0)
<ul class="list-grp">
@foreach($errors->all() as $error)
<li class="list-grp-item text-danger">
{{$error}}
<li>
@endforeach
</ul>
@endif