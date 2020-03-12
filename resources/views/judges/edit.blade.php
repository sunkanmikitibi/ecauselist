@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        Edit Judge
                    </div>
                    <div class="card-body">
                        {!! Form::model($judge, ['method'=>'PUT', 'route'=>['judges.update', $judge->id]]) !!}
                        <div class="form-group">
                            <label for="">Judge Name</label>
                        <input type="text" value="{{ $judge->judge_name }}" name="judge_name" class="form-control form-control-sm {{ $errors->has('judge_name') ? 'is-invalid' : '' }}" id="">
                            @if ($errors->has('judge_name'))
                            <div class="invalid-feedback small text-danger">
                                <strong>
                                    {{$errors->first('judge_name')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="court_id">Court</label>
                       {!! Form::select('court_id', $cou, null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info btn-md">Edit Judge</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
