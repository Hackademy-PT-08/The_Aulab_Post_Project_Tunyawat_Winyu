@extends('components.layout')


@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">Admin Request</h3>
                <x-admin-request-table :adminRequest="$adminRequest"/>
            </div>
        </div>
    </div>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">Revisor Request</h3>
                <x-revisor-request-table :revisorRequest="$revisorRequest"/>
            </div>
        </div>
    </div>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">Writer Request</h3>
                <x-writer-request-table :writerRequest="$writerRequest"/>
            </div>
        </div>
    </div>
@endsection