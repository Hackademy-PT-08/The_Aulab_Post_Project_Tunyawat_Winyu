@extends('components.layout')

@section('content')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center py-5">Welcome {{ auth()->user()->name }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <x-revisor-table :articles="$articles"/>
            </div>
        </div>
    </div>
@endsection