@extends('layouts.master')
@section('datepicker_styles')
    <link rel="stylesheet" href="{{ asset('datepicker/datepicker3.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Edit Cause
                    </div>
                    <div class="card-body">
                        <div class="col-10 offset-1">
                            {!! Form::model($cause, ['method'=>'PUT', 'route'=>['causelist.update', $cause->id]]) !!}
                            <div class="form-group">
                                {!! Form::label('case_fileno', 'Case File No') !!}
                                {!! Form::text('case_fileno', null, ['class'=>'form-control form-control-sm']) !!}
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::label('Judge', 'Select Judge') !!}
                                        {!! Form::select('judge_id', $judge, null, ['class'=>'form-control form-control-sm']) !!}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::label('court', 'Select Court') !!}
                                        {!! Form::select('court_id', $cou, null, ['class'=>'form-control form-control-sm']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::label('status', 'Status') !!}
                                        {!! Form::select('status', ['abouttostart'=>'About to Start', 'insession'=>'In Session', 'ended'=>'Ended', 'adjourned'=>'Adjourned'], null, ['class'=>'form-control form-control-sm']) !!}
                                    </div>
                                </div>
                                <div class="col-6">
                                    {!! Form::label('action', 'Action') !!}
                                    {!! Form::text('action', null, ['class'=>'form-control form-control-sm']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        {!! Form::label('litigants', 'Litigants') !!}
                                    {!! Form::textarea('litigants', null, ['class'=>'form-control form-control-sm']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::label('case_date', 'Case Date') !!}
                                        {!! Form::text('case_date', null, ['class'=>'form-control form-control-sm', 'id'=>'datepicker']) !!}
                                    </div>
                                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::label('dateof_nextadj', 'Date Of  Next Adjourned') !!}
                                        {!! Form::text('dateof_nextadj', null, ['class'=>'form-control form-control-sm', 'id'=>'date']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="state" id="state1" value="enable" checked>
                                            <label class="form-check-label" for="state1">
                                              Enable
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="state" id="state2" value="disable">
                                            <label class="form-check-label" for="state2">
                                              Disable
                                            </label>
                                          </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-warning">Update Case</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('datepicker_scripts')
<script src="{{asset('datepicker/bootstrap-datepicker.js')}}"></script>

<script>
        $('#datepicker').datepicker({
          autoclose: true,
      format: 'yyyy-mm-dd'
        });

        $('#date').datepicker({
          autoclose: true,
      format: 'yyyy-mm-dd'
        });
</script>
@endsection
