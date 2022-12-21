<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-primary mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  @if (auth()->check())
                      <a class="nav-link dropdown-toggle active" href="{{url ('/login')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{auth()->user()->name}}
                      </a>                           
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{url ('/logout')}}">Sign out</a></li>                               
                      </ul>
                  @else 
                      <a class="nav-link active" href="{{url ('/login')}}">Log In</a>
                   @endif
                </li>
          </ul>
      </form>
      </div>
    </div>
  </nav>
   <div class="container">
    @foreach ($posts as $post)
      <div class="card my-3">
          <div class="card-header">
            {{$post->title}}
          </div>
          <div class="card-body">
                      <p class="card-text">{{$post->content}}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a> 
            </div>
      </div>
    @endforeach
  </div>

   

    
</body>
</html>