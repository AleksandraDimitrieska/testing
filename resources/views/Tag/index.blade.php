@include('master')

<div class="container">
  <h2>All Tags</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>name</th>
      </tr>
    </thead>
    <tbody>
@foreach ($tags as $tag)
      <tr>
    <td> {{ $tag->id }}</td>
    <td><a href="{{ route('singleTag', $tag->id) }}"> {{ $tag->name }} <a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{route('createTag')}}" class="btn btn-info">Create new tag</a>
  <br>
</div>