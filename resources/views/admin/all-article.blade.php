@extends('components.layout-admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">All Articles</h3>
                <x-admin-all-article :articles="$articles"/>
            </div>
        </div>
    </div>
@endsection