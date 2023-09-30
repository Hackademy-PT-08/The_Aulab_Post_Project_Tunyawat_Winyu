@extends('components.layout-admin')


@section('content')

<style>
    .container{
        width: 90%;
        box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.36);
        margin-top: 10%;
        padding: 20px 30px 20px 30px;
        border-radius: 10px;
    }
</style>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">Admin Request</h3>
                <x-admin-request-table :adminRequest="$adminRequest"/>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">Revisor Request</h3>
                <x-revisor-request-table :revisorRequest="$revisorRequest"/>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">Writer Request</h3>
                <x-writer-request-table :writerRequest="$writerRequest"/>
            </div>
        </div>
    </div>
@endsection