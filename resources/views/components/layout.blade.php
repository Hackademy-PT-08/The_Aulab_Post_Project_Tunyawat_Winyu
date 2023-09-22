<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Aulab Post</title>


    {{-- Import Bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Import asset css interno --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- Import asset css From bootswatch --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu">
                  @foreach ($categories as $category)
                    <a class="dropdown-item" href="/homepage/article-category/{{ $category->id }}">{{ $category->name }}</a>
                  @endforeach
                </div>
              </li>
            </ul>
            @if (auth()->check())
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                  <a class="btn btn-primary" href="{{ route('profile') }}">Profile</a>
                </li>
                <li class="nav-item mx-3">
                  <a class="btn btn-primary" href="{{ route('addPost.create') }}">Add Post</a>
                </li>
                <form action="/logout" method="post">
                  @csrf
                    <button type="submit" class="btn btn-primary mx-3">Logout</button>
                </form>
              </ul>
            @endif
            @if (!auth()->check())
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                  <a class="btn btn-primary" href="/login">Login</a>
                </li>
                <li class="nav-item mx-3">
                  <a class="btn btn-primary" href="/register">Sign Up</a>
                </li>
                
              </ul>
            @endif
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
    </nav>
    
    
    
    
    @yield('content')





    {{-- Footer --}}
    <footer>
        <h4 class="text-center py-5">@Copyright 2023 The Aulab Post</h4>
    </footer>

    
    {{-- Import Bootstrap Js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>