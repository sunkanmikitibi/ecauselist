@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('courts.update', $court->id)}}" method="post">
            @csrf
            @method('PUT')
            @include('courts._forms')
            </form>
            </div>
        </div>
    </div>
@endsection
