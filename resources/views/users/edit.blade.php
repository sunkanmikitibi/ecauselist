@extends('layouts.master')
@section('title', 'Edit Users')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Edit {{$user->name}}
                        <div class="card-tools">
                        <a href="{{ route('users.index')}}" class="btn btn-outline-info btn-sm">back to users</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 offset-2">
                                {!! Form::model($user, ['method'=>'PUT', 'route'=>['users.update', $user->id]]) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', null, ['class'=>'form-control form-control-sm']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email address') !!}
                                    {!! Form::email('email', null, ['class'=>'form-control form-control-sm']) !!}
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            {!! Form::label('user_type', 'User Type') !!}
                                            {!! Form::select('user_type', ['admin'=>'Administrator', 'registrar'=>'Registrar', 'judge'=>'Judge'], null, ['class'=>'form-control form-control-sm']) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {!! Form::label('court_id', 'Court') !!}
                                            {!! Form::select('court_id', $cou, null, ['class'=>'form-control form-control-sm']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            {!! Form::label('password', 'Password') !!}
                                            {!! Form::password('password', ['class'=>'form-control form-control-sm']) !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {!! Form::label('confirm-password', 'Confirm password') !!}
                                            {!! Form::password('password_confirmation', ['class'=>'form-control form-control-sm']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            {!! Form::submit('Edit user', ['class'=>'btn btn-outline-info btn-sm']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
