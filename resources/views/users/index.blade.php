@extends('layouts.master')
@section('title', 'All Users')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12">

                <div class="card card-info">
                    <div class="card-header">
                        Users
                        <div class="card-tools float-right">
                        <a href="{{ route('users.create')}}" class="btn btn-sm btn-outline-warning">
                        <i class="fas fa-user-plus"></i> Add user</a>
                        </div>
                    </div>
                    <div class="card-body p-0 table-responsive">
                        @include('_partials.messages')
                        <table class="table table-striped table-bordered small">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>User Type</th>
                                    <th>Court room</th>
                                    <th>Date Created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>@if ($user->user_type == 'admin')
                                        Administrator
                                    @else
                                        Registrar
                                    @endif
                                         </td>
                                        <td>
                                            @if ($user->court_id == null)
                                                Administrator Level
                                            @else
                                            {{ $user->court['name']}}
                                            @endif
                                       </td>
                                    <td>{{ $user->created_at->diffForHumans()}}</td>
                                       <td>
                                       <a href="{{ route('users.edit', $user->id)}}"><i class="fas fa-edit"></i> </a>
                                       <a href="{{ route('users.destroy', $user->id)}}" onclick="alert('Are you sure you want to Delete?')"> <i class="fas fa-trash-alt text-danger"></i></a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
