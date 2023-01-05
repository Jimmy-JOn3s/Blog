<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                                <a class="nav-link dropdown-toggle active" href="{{ url('/login') }}" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('/logout') }}">Sign out</a></li>
                                </ul>
                            @else
                                <a class="nav-link active" href="{{ url('/login') }}">Log In</a>
                            @endif
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card my-3">
            <div class="card-header">
                <h5>
                    Title: {{ $post->title }}</Strong>
                </h5>
                <strong>Posted On:</strong>
                {{ date('d M Y', strtotime($post->created_at)) }}

                <div>
                    <strong>Category:</strong>
                    {{ $post->category->name }}
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                    {{ $post->content }}
                </p>
            </div>
        </div>
        <form method="POST">
            @csrf
            <div>

            </div>
            <button type="submit" formaction="{{ url('/post/like/' . $post->id) }}" class="btn btn-sm btn-primary"
                @if ($likeStatus) @if ($likeStatus->type == 'like') 
                        disabled @endif
                @endif>
                <i></i>
                <span class="badge text-bg-primary">{{ $likes->count() }}</span>Likes
            </button>
            <button type="submit" formaction="{{ url('/post/dislike/' . $post->id) }} " class="btn btn-sm btn-danger"
                @if ($likeStatus) @if ($likeStatus->type == 'dislike') 
                        disabled @endif
                @endif>
                <i></i>
                <span class="badge text-bg-danger">{{ $dislikes->count() }}</span>Dislikes
            </button>
            <button class="btn btn-sm btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#CID"
                aria-expanded="false" aria-controls="collapseExample">
                <i></i>
                <span class="badge text-bg-info">{{ $post->comments->count() }}</span>Comments
            </button>
            <a href="{{ url ('/')}}" class="btn btn-sm btn-secondary d-flex float-end"> Back</a>
        </form>
       
        <br>
        <div class="collapse comment-section" id="CID">
            <form action="{{ url('/post/comment/' . $post->id) }}" method="POST">
                @csrf
                <textarea name="text" id="" cols="30" rows="4" placeholder="Comment" class="form-control"
                    required></textarea>
                @error('text')
                    <Span class="invalid-feedback">{{ $message }}</Span>
                @enderror
                <br>
                <button type="submit" class="btn btn-sm btn-info">
                    <i></i>
                    Submit
                </button>
            </form>
            <br>
            @foreach ($comments as $comment)
                <div>
                    <strong><i class="fa-solid fa-user-tie mx-2"></i>{{ $comment->user->name }}</strong>
                    <div class="alert alert-dark">
                        {{ $comment->text }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--Footer-->
    <footer class=" bg-primary py-5" style="margin-top: 100px;">


        <div class="container text-center border border-primary" style="margin-top: 100px;">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link bar2color2 text-white" aria-current="page" href="#aus">About Me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bar2color2 text-white" href="#service">Education</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bar2color2 text-white" href="#team">Contribution</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bar2color2 text-white" href="#clients">Project</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link bar2color2 text-white" href="#contact">Contact</a>
            </li> -->
            </ul>
            <br>
            <i class="me-4 fa-lg fa-brands fa-facebook text-white"></i>
            <i class="me-4 fa-lg fa-brands fa-instagram text-white"></i>
            <i class="me-4 fa-lg fa-brands fa-twitter text-white"></i>
            <i class="me-4 fa-lg fa-brands fa-github text-white"></i>
            <i class="me-4 fa-lg fa-solid fa-globe text-white"></i>
            <br>
            <br>
            <!-- <p class="bar2color2 text-white">© 2022 Softcomm Technology, Inc. All rights reserved.</p> -->


        </div>

    </footer>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>
