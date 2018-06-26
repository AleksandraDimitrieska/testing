@include('master')

<div class="container">
  <h2>All Books</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>name</th>
        <th>author</th>
        <th>numberOfSamples</th>
      </tr>
    </thead>
    <tbody>
@foreach ($books as $book)
      <tr>
    <td> {{ $book->id }}</td>
    <td><a href="{{ route('singleBook', $book->id) }}"> {{ $book->name }} <a></td>
    <td> {{ $book->author }}</td>
    <td> {{ $book->numberOfSamples }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{route('createBook')}}" class="btn btn-info">Create new book</a>
  <br>
</div>