@include('master')

<h1>Edit a book</h1>
<form>
	<p hidden id="bookid" value="{{$book->id}}">{{$book->id}}</p>
	<label name="name" data-book-id="{{$book->name}}">Name:</label>
	<input type="text" name="name" class="form-control" value="{{$book->name}}" >
	<label name="author">Author:</label>
	<input type="text" name="author" class="form-control" value="{{$book->author}}" >
	<label name="numberOfSamples">Number of Samples:</label>
	<input type="text" name="numberOfSamples" class="form-control" value="{{$book->numberOfSamples}}" >
<button class="btn btn-default js-update" data-book-name="{{$book->name}}" data-book-numberOfSamples="{{$book->numberOfSamples}}" data-book-author="{{$book->author}}">Update</button>

</form>

<script>
        $(document).ready(function() {
            $(".js-update").click(function(e) {
                var button = $(e.target);
                var bookId = $("#bookid").text();
			var name = button.attr('data-book-name');
			var author = button.attr('data-book-author');
			var numberOfSamples = button.attr('data-book-numberOfSamples');
			var obj = { name: name, author: author, numberOfSamples: numberOfSamples};
                $.ajax({
                      url: "/BookUpdate/"+bookId,
                      type: 'POST',
                      dataType: 'json',
                      data: obj ,
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                    success:(function(d) {
                    	alert('f');
                    }),
                    error:(function() {
                        alert("Something failed!");
                    })
                });
             });
       });
</script>
