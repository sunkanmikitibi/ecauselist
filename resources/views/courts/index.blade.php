@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Court</div>
                    <div class="card-body">
                    @include('courts._forms', ['buttonText'=>'Add Courtroom']);
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @include('_partials.messages')
                <div class="card">
                <div class="card-header">Courts ({{ $courts->count() }}) </div>
                    <div class="card-body table-responsive p-0 small">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="3">
                                        Name
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($courts as $court)
                                     <tr>
                                    <td>
                                        {{$court->name}}
                                    </td>
                                    <td>
                                        {{$court->judge['judge_name']}}
                                    </td>
                                    <td>
                                         <i class="fas fa-edit text-warning"></i>
                                         <i class="fas fa-trash text-danger"></i>
                                    </td>
                                </tr>
                               @empty
                                   <tr>
                                       <td colspan="2">
                                           No Records
                                       </td>
                                   </tr>
                               @endforelse


                            </tbody>
                        </table>
                        <div class="p-2">
                            {{$courts->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
