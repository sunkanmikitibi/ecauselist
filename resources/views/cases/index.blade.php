@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">

                          Causes ({{$causelist->count()}})

                        <div class="card-tools float-right">
                        <a href="{{ route('causelist.create') }}" class="btn btn-outline-info btn-sm">
                                Add Case
                            </a>
                           </div>
                    </div>
                    <div class="card-body p-0 small">
                        @include('_partials.messages')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Case File No</th>
                                    <th> Litigants </th>
                                    <th>Presiding Judge</th>
                                    <th>Courtroom</th>
                                    <th>Action</th>
                                    <th>Case Date</th>
                                    <th>Date of Next Adjournment</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($causelist->isEmpty())
                                    <tr>
                                        <td colspan="9" style="text-align:center">
                                            No Data
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($causelist as $cause)
                                <tr>
                                    <td>{{$cause->case_fileno}}</td>
                                    <td>{{$cause->litigants}}</td>
                                    <td>{{$cause->judge['judge_name']}}</td>
                                    <td>{{$cause->court['name']}}</td>
                                    <td>{{$cause->action}}</td>
                                    <td>{{ $cause->case_date->format("D, d M Y") }} </td>
                                    <td>
                                    @if ($cause->dateof_nextadj == null)
                                        null
                                    @else
                                        {{$cause->dateof_nextadj->format("D, d M Y")}}
                                    @endif</td>
                                    <td>
                                        {{$cause->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                       <a href="{{route('causelist.show', $cause->id)}}"><i class="fas fa-eye"></i></a>
                                       <a href="{{route('causelist.edit', $cause->id)}}"><i class="fas fa-edit"></i></a>
                                        <i class="fas fa-trash"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
