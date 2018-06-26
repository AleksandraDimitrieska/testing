@include('master')
<h2><em>Name:</em> {{$tag->name}}</h2>

@if (count($technologies) == 0 )
<h3>this tag has not technologies</h3>
@else
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
@foreach ($technologies as $technology)
      <tr>
    <td> {{ $technology->id }}</td>
    <td> {{ $technology->name }} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endif
  
<a href="{{route('editTag', $tag->id)}}" class="btn btn-info">Edit</a>
