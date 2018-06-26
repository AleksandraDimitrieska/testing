@include('master')

<h1>Create a book</h1>
<form action="{{route('saveBook')}}" method="POST">
	{{csrf_field()}}
	<label name="name">Name:</label>
	<input type="text" name="name" class="form-control">
	<label name="author">Author:</label>
	<input type="text" name="author" class="form-control">

	<label name="numberOfSamples">Number of Samples:</label>
	<input type="text" name="numberOfSamples" class="form-control">
<button class="btn btn-default" type="submit">Create</button>

</form>
