<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>All the Todos</title>
</head>
<body>
    {{-- Navabar --}}

    <nav class="navbar navbar-expand-lg navbar-light mb-5" style="background-color: #e3f2fd;">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/todos">Todos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/todos/create">Add Todo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    {{-- End of Navbar --}}

    {{-- Message --}}
    @if (session('success'))
        <div class="container">
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        </div>
    @endif

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger text-white">
                {{$error}}
            </div>
        @endforeach
        @endif

        @if(session('error'))
        <div class="alert alert-danger text-white">
            {{session('error')}}
        </div>
    @endif
    {{-- End Of Message --}}

    <div class="container">
        <h3 class="mb-4">All Todos</h3>
        <div class="row">
            @foreach ($todos as $todo)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">              
                        <div>
                            <h5 class="card-title">
                                <a href="todos/{{$todo->id}}">{{$todo->title}}</a>
                            </h5> 
                            
                        </div>
                        <div>
                            <p>
                                {{$todo->description}}
                            </p>
                        </div>
                        <div>
                            @if ($todo->completed == true)
                            <div class="d-flex flex-row justify-content-between">
                                <div class="text-success">
                                    Completed
                                </div>
                                <div>
                                    <form action="/todos/{{$todo->id}}/notcompleted" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Not Completed</button>                   
                                    </form>
                                </div>
                            </div>
                            @else
                            <div class="d-flex flex-row justify-content-between">
                                <div class="text-danger">
                                   Not Completed
                                </div>
                                <div>
                                    <form action="/todos/{{$todo->id}}/completed" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Complete</button>                   
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="d-flex flex-row justify-content-between my-3">
                            <div>
                                <a href="/todos/{{$todo->id}}/edit" class="btn btn-primary">Edit</a>
                            </div>
                            <div>
                                <form action="/todos/{{$todo->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>                   
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            <a href="/todos/create" class="btn btn-info text-white mt-5">Create A New Todo</a>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>