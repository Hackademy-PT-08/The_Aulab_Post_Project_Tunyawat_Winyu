@extends('components.layout')

@section('content')

    <style>
        .container{
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.36);
            margin-top: 10%;
            padding: 30px 40px 30px 40px;
            border-radius: 10px;
    }
    </style>
    <div class="container">
        <div class="col-12">
                <form action="/register" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3 mt-4 register-text">
                            <h3 class="text-center">Sign Up</h3>
                        </div>
                        <div class="mb-3">
                            {{-- UserName --}}
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Mario" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            {{-- UserEmail --}}
                            <label for="email" class="label-control">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="your@mail.com" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            {{-- UserPassword --}}
                            <label for="password" class="label-control">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            {{-- UserPassword Confimation --}}
                            <label for="password_confirmation" class="label-control">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                        <div class="mb-3">
                            <div class="btn">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection