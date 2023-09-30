@extends('components.layout-admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Categories</h3>
                <x-admin-categories :categories="$categories"/>
            </div>
        </div>
    </div>
@endsection