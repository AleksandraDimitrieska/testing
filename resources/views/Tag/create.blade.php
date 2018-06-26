@include('master')

<form action="/SaveTag" method="post">
	        {{ csrf_field() }}
   name:<br>
  <input type="text" name="name">
  <br>
  	@foreach($technologies as $technology)
  		<input type="checkbox" name="technologies[]" value="{{$technology->id}}">{{$technology->name}}</option>
  	@endforeach
  <button type="submit" class="btn btn-info">Save</button>
</form>