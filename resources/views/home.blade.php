@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$causes->count()}}</h3>

              <p>Cases</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ $judges->count()}}</h3>

              <p>Judges</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ $registrars->count()}}</h3>

              <p>Registrars</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>{{$courts->count()}}</h3>

              <p>Court</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">Registrars Details</div>

                <div class="card-body table-responsive p-0">


                    <table class="table small table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Registrar</th>
                                <th>Number of Cases</th>
                                <th>Court</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrars as $registrar)
                               <tr>
                                <td>
                                    {{ $registrar->name }}
                                </td>
                                <td align="center">
                                    @foreach ($registrar->cases as $case)
                                        {{$case->count()}}
                                    @endforeach
                                    </td>
                                <td>{{ $registrar->court['name']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    Court Details
                </div>
                <div class="card-body">
                    ok court details here
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
