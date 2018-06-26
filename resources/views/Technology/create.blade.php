@include('master')

<form action="/Save" method="post">
	        {{ csrf_field() }}
   name:<br>
  <input type="text" name="name">
  <br>
   	@foreach ($tags as $tag)
    <input type="checkbox" name=tags[] value="{{$tag->id}}">{{$tag->name}}
    @endforeach
  <button type="submit" class="btn btn-info">Save</button>
</form>