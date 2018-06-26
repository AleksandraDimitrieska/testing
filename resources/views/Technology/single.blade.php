@include('master')
<h2><em>Name:</em> {{$technology->name}}</h2>

<h1>The first table is for questions</h1>


@if (count($questions) == 0 )
<h3>There is no questions in this technology</h3>
@else

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Body</th>
        <th>isPublished</th>
      </tr>
    </thead>
    <tbody>
@foreach ($questions as $question)
      <tr>
    <td> {{ $question->id }}</td>
    <td> {{ $question->name }} </td>
    @if ($question->isPublished == 0)
      <td> <button class="btn btn-success"> NO</button></td>
    @elseif ($question->isPublished == 1)
    <td><button class="btn btn-success js-isPublished" data-question-id="{{$question->id}}">YES</button></td>
    @endif
      </tr>
      @endforeach
    </tbody>
  </table>
@endif

<hr>
<h1>The second table is for tags</h1>

@if (count($tags) == 0 )
<h3>There is no tags in this technology</h3>
@else
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
@foreach ($tags as $tag)
      <tr>
    <td> {{ $tag->id }}</td>
    <td> {{ $tag->name }} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif

  <a class="btn btn-info" href="{{route('editTechnology', $technology->id)}}">Edit</a>


<script>
        $(document).ready(function() {
            $(".js-isPublished").click(function(e) {
                var button = $(e.target);
                $.ajax({
                      url: "/questions/IsPublished/"+button.attr('data-question-id'),
                      type: 'POST',
                      data: { "": button.attr('data-question-id')  },
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                    success:(function(d) {
                        $(".js-isPublished").text("NO").removeClass("btn-success").addClass("btn-danger"); 
                    }),
                    error:(function() {
                        alert("Something failed!");
                    })
                });
             });
       });
</script>
