@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{$cause->litigants}}
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Case file no</th>
                            <td>{{$cause->case_fileno}}</td>
                            </tr>
                            <tr>
                                <th>Presiding Judge</th>
                            <td>{{ $cause->judge['judge_name']}}</td>
                            </tr>
                            <tr>
                                <th>Court</th>
                            <td>{{ $cause->court['name']}}</td>
                            </tr>
                            <tr>
                                <th>Case Date</th>
                            <td>{{ $cause->case_date->format("D, d M Y")}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                            <td>
                                @if ($cause->status == 'abouttostart')
                                About to start
                            @elseif($cause->status == 'insession')
                                In Session
                            @elseif($cause->status == 'ended')
                                ended
                                @else
                                Adjourned
                            @endif
                              </td>
                            </tr>
                            <tr><th>Action</th>
                            <td>{{ $cause->action }}</td></tr>
                            <tr>
                                <th>Date of Next Adjourned</th>
                            <td>{{ $cause->dateof_nextadj->format("D, d M Y") }}</td>
                            </tr>
                            <tr>
                                <th>State</th>
                            <td>{{ $cause->state}} </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
