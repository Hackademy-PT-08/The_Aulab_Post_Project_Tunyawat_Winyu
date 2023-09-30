@extends('components.layout-admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">All Staff</h3>
                <x-admin-all-staff :users="$users"/>
            </div>
        </div>
    </div>
@endsection