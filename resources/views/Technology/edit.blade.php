@include('master')

<form action="{{route('updateTechnology', $technology->id)}}" method="post">
	<input type="hidden" name="_method" value="PUT">
	        {{ csrf_field() }}
   name:<br>
  <input type="text" name="name" value = "{{ $technology->name }}">
  <br>
  	@foreach($tags as $tag)
  		<input type="checkbox" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, $tagsId) ? 'checked' : ''}}>{{$tag->name}}
  	@endforeach
  <button type="submit" class="btn btn-info">Save</button>
</form>