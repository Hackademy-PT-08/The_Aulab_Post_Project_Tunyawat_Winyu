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
            <form action="/user/profile-information" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <div class="mb-3 mt-4">
                        <h3 class="text-center">User Information</h3>
                    </div>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="mb-3">
                        <div class="btn">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
            <form action="/user/password" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" name="current_password" id="current_password">
                    </div>
                    <div class="mb-3">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="mb-3">
                        <div class="btn">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
@endsection