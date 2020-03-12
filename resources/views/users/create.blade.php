@extends('layouts.master')
@section('title', 'Add New Users')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    Add Users
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 offset-2">
                            <form action="{{ route('users.store')}}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" value="{{ old('name') }}" name="name"
                                    class="form-control form-control-sm {{ $errors->has('name') ? 'is-invalid' : '' }}" id="">
                                    @if ($errors->has('name'))
                                    <div class="invalid-feedback small text-danger">
                                        <strong>
                                            {{$errors->first('name')}}
                                        </strong>
                                    </div>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email')}}"
                                    class="form-control form-control-sm {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email">
                                        @if ($errors->has('email'))
                                        <div class="invalid-feedback small text-danger">
                                            <strong>
                                                {{$errors->first('email')}}
                                            </strong>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="user_type">User Type</label>
                                                <select name="user_type" class="form-control form-control-sm {{ $errors->has('user_type') ? 'is-invalid' : '' }}" id="">
                                                    <option value="">Select User Type</option>
                                                    <option value="admin">Administrator</option>
                                                    <option value="registrar">Registrar</option>
                                                    <option value="judge">Judge</option>
                                                </select>
                                                @if ($errors->has('user_type'))
                                                <div class="invalid-feedback small text-danger">
                                                    <strong>
                                                        {{$errors->first('user_type')}}
                                                    </strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="court_id">Court Room</label>
                                                <select class="form-control form-control-sm {{ $errors->has('court_id') ? 'is-invalid' : '' }}" name="court_id" id="court_id">
                                                    <option value="">Select Courtroom</option>
                                                    @foreach ($courts as $court)
                                                <option value="{{ $court->id }}">{{ $court->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('court_id'))
                                                <div class="invalid-feedback small text-danger">
                                                    <strong>
                                                        {{$errors->first('court_id')}}
                                                    </strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control form-control-sm {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password">
                                                @if ($errors->has('password'))
                                                <div class="invalid-feedback small text-danger">
                                                    <strong>
                                                        {{$errors->first('password')}}
                                                    </strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">

                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control form-control-sm" id="">
                                    </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-outline-info" value="Add user">
                                    </div>
                                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
