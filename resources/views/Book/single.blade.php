@include('master')
<h1>Name:{{$book->name}}</h1>
<h1>Author:{{$book->author}}</h1>
<h1>Number Of Samples:{{$book->numberOfSamples}}</h1>

<a href="{{route('editBook', $book->id)}}" class="btn btn-primary">Edit</a>