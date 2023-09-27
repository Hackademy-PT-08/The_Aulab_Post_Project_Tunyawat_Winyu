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

    {{-- Import font Googlefonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&family=Poppins:wght@300;400&family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">

    {{-- Import Font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- LiveWire Css --}}
    @livewireStyles

</head>
<body>

  <style>

    .nav-link{
      position: relative;
      padding: 0 10px
    }
    .nav-link::after{
      content: "";
      position: absolute;
      background-color: black;
      height: 2px;
      width: 0;
      left: 0;
      bottom: -10px;
      transition: 0.3s;
    }
    .nav-link:hover::after{
      width: 100%;
    }

    a{
    text-decoration: none;
    color: black;
    }

    i{
      margin-top: 15px;
    }

  </style>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid nav py-3 px-4">
          <h2 class="navbar-brand" href="#">Navbar</h2>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('workWithUs') }}">work with us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="dropdown-toggle px-3" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
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
                  <a class="nav-link" href="{{ route('profile') }}" ><i class="fa-solid fa-user fa-xl mx-3"></i>Profile</a>
                </li>
                @if (auth()->user()->is_admin)
                  <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-table fa-xl mx-3"></i>Dashboard</a>
                  </li>
                @endif
                @if (auth()->user()->is_writer)
                  <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('addPost.create') }}"><i class="fa-regular fa-pen-to-square fa-xl mx-2 fa-bounce"></i>Add Post</a>
                  </li>
                @endif
                @if (auth()->user()->is_revisor)
                  <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('revisor.dashboard') }}"><i class="fa-regular fa-eye fa-bounce fa-xl mx-3"></i>Review</a>
                  </li>
                @endif
                <form action="/logout" method="post">
                  @csrf
                    <button type="submit" class="btn btn-dark mx-3" style="font-family: 'Poppins', sans-serif;">Logout</button>
                </form>
              </ul>
            @endif
            @if (!auth()->check())
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                  <a class="btn btn-dark" href="/login">Login</a>
                </li>
                <li class="nav-item mx-3">
                  <a class="btn btn-dark" href="/register">Sign Up</a>
                </li>
              </ul>
            @endif
            <form class="d-flex" role="search">
              <input class="form-control me-2" wire:model="search" name="search" type="text" placeholder="Search">
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

    {{-- LiveWire Script --}}
    @livewireScripts

</body>
</html>