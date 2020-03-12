@extends('layouts.master')
@section('content')

  <div class="container">
      <div class="row">
          <div class="col-sm-12 col-md-4">
              <div class="card">
                  <div class="card-header">
                      Add Judges
                  </div>
                  <div class="card-body">
                      <form action="{{ route('judges.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Judge Name</label>
                                <input type="text" name="judge_name" class="form-control form-control-sm {{ $errors->has('judge_name') ? 'is-invalid' : '' }}" id="">
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
                            <select name="court_id" id="court_id" class="form-control form-control-sm {{ $errors->has('court_id') ? 'is-invalid' : '' }}">
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
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-info btn-md">Add Judge</button>
                            </div>
                      </form>
                  </div>
              </div>
          </div>
          <div class="col-sm-12 col-md-8">
            @include('_partials.messages')
                <div class="card">
                    <div class="card-header">
                        Judges ({{$judges->count()}})
                    </div>
                    <div class="card-body table-responsive p-0 small">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Judge Name
                                    </th>
                                    <th>
                                        Court
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($judges as $judge)
                                <tr>
                                    <td>
                                        {{ $judge->judge_name }}
                                    </td>
                                    <td>
                                        {{ $judge->court['name'] }}
                                    </td>
                                <td> <a class="btn btn-xs btn-outline-warning" href="{{ route('judges.edit', $judge->id) }}">
                                 <i class="fas fa-edit"></i> </a>
                                 <form class="form-inline" action="{{ route('judges.destroy', $judge->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-xs btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                                 <a href="">

                                </a>  </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="p-2">
                                     {{$judges->links()}}
                        </div>

                    </div>
                </div>
          </div>
      </div>
  </div>

@endsection
