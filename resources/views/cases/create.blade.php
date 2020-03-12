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
                          Add New Case
                        <div class="card-tools float-right">
                        <a href="{{ route('causelist.index') }}" class="btn btn-outline-info btn-sm">
                                Causelist
                            </a>
                           </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                               <div class="col-10 offset-1">
                               <form action="{{ route('causelist.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="case_fileno">Case File No:</label>
                                    <input type="text" name="case_fileno" class="form-control form-control-sm {{ $errors->has('case_fileno') ? 'is-invalid' : '' }}" value="{{ old('case_fileno')}}" id="">
                                    @if ($errors->has('case_fileno'))
                                    <div class="invalid-feedback small text-danger">
                                        <strong>
                                            {{$errors->first('case_fileno')}}
                                        </strong>
                                    </div>
                                    @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Presiding Judge:</label>
                                                <select name="judge_id" class="form-control form-control-sm {{ $errors->has('judge_id') ? 'is-invalid' : '' }}" id="judge">
                                                    <option value="">Select Judge</option>
                                                    @foreach ($judges as $judge)
                                                <option value="{{ $judge->id }}">{{ $judge->judge_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('judge_id'))
                                                <div class="invalid-feedback small text-danger">
                                                    <strong>
                                                        {{$errors->first('judge_id')}}
                                                    </strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">

                                    <div class="form-group">
                                        <label for="court">Courtroom</label>
                                        <select name="court_id" class="form-control form-control-sm {{ $errors->has('court_id') ? 'is-invalid' : '' }}" id="">
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
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control form-control-sm {{ $errors->has('status') ? 'is-invalid' : '' }}" id="">
                                                    <option value="">Select Status</option>
                                                    <option value="abouttostart">About to Start</option>
                                                    <option value="insession">In Session</option>
                                                    <option value="ended">Ended</option>
                                                    <option value="adjourned">Adjourned</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                <div class="invalid-feedback small text-danger">
                                                    <strong>
                                                        {{$errors->first('status')}}
                                                    </strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="action">Action</label>
                                            <input type="text" name="action" value="{{ old('action') }}" class="form-control form-control-sm {{ $errors->has('action') ? 'is-invalid' : '' }}" id="">
                                            @if ($errors->has('action'))
                                            <div class="invalid-feedback small text-danger">
                                                <strong>
                                                    {{$errors->first('action')}}
                                                </strong>
                                            </div>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="litigants">Litigants</label>
                                            <textarea name="litigants" class="form-control  form-control-sm {{ $errors->has('litigants') ? 'is-invalid' : '' }}" id="" cols="30" rows="10">
                                                    {{ old('litigants') }}
                                                </textarea>
                                                @if ($errors->has('litigants'))
                                                <div class="invalid-feedback small text-danger">
                                                    <strong>
                                                        {{$errors->first('litigants')}}
                                                    </strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="case_date">Case Date</label>
                                            <input type="text" name="case_date" class="form-control form-control-sm {{ $errors->has('case_date') ? 'is-invalid' : '' }}" id="datepicker">
                                            @if ($errors->has('case_date'))
                                            <div class="invalid-feedback small text-danger">
                                                <strong>
                                                    {{$errors->first('case_date')}}
                                                </strong>
                                            </div>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="dateof_nextadj">Date of Next Adjournment</label>
                                                <input type="text" name="dateof_nextadj" class="form-control form-control-sm" id="date">
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
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-info btn-md">Create Case</button>
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
