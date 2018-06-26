@include('master')

<div class="container">
  <h2>All Technologies</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>name</th>
      </tr>
    </thead>
    <tbody>
@foreach ($technologies as $technology)
      <tr>
    <td> {{ $technology->id }}</td>
    <td><a href="{{ route('singleTechnology', $technology->id) }}"> {{ $technology->name }} <a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{route('createTechnology')}}" class="btn btn-info">Create new technology</a>
  <a href="{{route('createTag')}}" class="btn btn-info">Create new tag</a>
  <a href="{{route('createBook')}}" class="btn btn-info">Create new Book</a>

  <a href="{{route('allTags')}}" class="btn btn-info">All Tags</a>
  <a href="{{route('allBooks')}}" class="btn btn-info">All Books</a>

  <br>
  <input type="text" class="input-search"/>
  <button class="btn btn-primary js-search">Search</button>
</div>
<h1 class="tech-name"></h1>
<button class="btn btn-default js-api-users">Get Users</button>
<div id="avatar"></div>

<script>
        $(document).ready(function() {
            $(".js-search").click(function(e) {
                var button = $(e.target);
                var value = $(".input-search").val();
                $.ajax({
                      url: "/Search/"+value,
                      type: 'get',
                      data: { value },
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                    success:(function(technology) {
                         $(".tech-name").text(technology.name);
                    }),
                    error:(function() {
                        alert("Something failed!");
                    })
                });
             });

            $(".js-api-users").click(function(e){
                var button = $(e.target);
                $.ajax({
                  url: "https://api.github.com/users?since=135",
                  method: "GET",
                  type: "json",
                  success:function(d){
                    var i;
                    for (i = 0; i < d.length; i++) { 
                      var par = document.createElement("p");
                      var textnode = document.createTextNode(d[i].avatar_url);
                      par.appendChild(textnode);                             
                      document.getElementById("avatar").appendChild(par);  
                    }
                  },
                  error:function(){
                      alert("something failed");
                  }
                });
            });
       });
</script>