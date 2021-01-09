<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Create A new Todo</title>
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


@if (session('success'))
    <div class="container">
        <div class="alert alert-success text-white">
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

    <div class="container">
        <form action="/todos" method="POST">
            @csrf
    
            <div class="mb-3">
                <label for="title" class="form-label">Todo Title</label>
                <input type="text" class="form-control" id="title" placeholder="A New Todo" name="title">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Todo Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Create New Todo</button>
        </form>
    </div>
</body>
</html>