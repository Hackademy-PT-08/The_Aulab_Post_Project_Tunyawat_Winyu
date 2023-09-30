@extends('components.layout-admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Tags</h3>
                <x-admin-tag :tags="$tags"/>
            </div>
        </div>
    </div>
@endsection