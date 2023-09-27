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
            margin-bottom: 10%;
            padding: 30px 40px 30px 40px;
            border-radius: 10px;
    }
    </style>
    
    <div class="container">
        <div class="col-12">
            <form action="/login" method="post">
                    @csrf
                    <div class="form-group ">
                        <div class="mb-3 mt-4 login-text">
                            <h2 class="text-center">Login</h2>
                        </div>
                        <div class="mb-3">
                            {{-- Email --}}
                            <label for="email" class="label-control">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">

                            <span style="color: red;">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            {{-- Password --}}
                            <label for="password" class="label-control">Password</label>
                            <input type="password" name="password" name="password" class="form-control">
                        
                            <span style="color: red;">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <div class="btn">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection