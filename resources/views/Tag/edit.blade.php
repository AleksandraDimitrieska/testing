@include('master')

<form action="{{route('updateTag', $tag->id)}}" method="post">
	<input type="hidden" name="_method" value="PUT">
	        {{ csrf_field() }}
   name:<br>
  <input type="text" name="name" value = "{{$tag->name}}">
  <br>
  	@foreach($technologies as $technology)
  		<input type="checkbox" value="{{$technology->id}}" name="technologies[]" {{in_array($technology->id, $selectedTechIds) ? 'checked' : ''}}>{{$technology->name}}
  	@endforeach
  <button type="submit" class="btn btn-info">Update</button>
</form>