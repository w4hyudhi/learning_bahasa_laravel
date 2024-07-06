@extends('layouts.app')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
                <div class="container-fluid">
                        <div class="row mb-2">
                                <div class="col-sm-6">
                                        <h1 class="m-0">{{ __('Dashboard') }}</h1>
                                </div><!-- /.col -->
                        </div><!-- /.row -->
                </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
                <div class="container-fluid">
                        <div class="row">
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-map-marked-alt"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Distrik</span>
                                            <span class="info-box-number">
                                                {{$totalDistrik}} Distrik
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-home"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Kampung</span>
                                            <span class="info-box-number">{{$totalDesa}} Kampung</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-map-pin"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total TPS</span>
                                            <span class="info-box-number">{{$totalTps}} TPS</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Pemilih</span>
                                            <span class="info-box-number">{{$totalPemilih}} Orang</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                          <h3 class="card-title">US-Visitors Report</h3>

                                          <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                              <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                              <i class="fas fa-times"></i>
                                            </button>
                                          </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                          <div class="d-md-flex">
                                            <div class="p-1 flex-fill" style="overflow: hidden">
                                              <!-- Map will be created here -->
                                              <div id="world-map-markers" style="height: 400px; overflow: hidden" class="mapael">

                                                    {!! Mapper::render() !!}

                                              </div>
                                            </div>

                                          </div><!-- /.d-md-flex -->
                                        </div>
                                        <!-- /.card-body -->
                                      </div>
                                </div>
                        </div>
                        <!-- /.row -->
                </div><!-- /.container-fluid -->
        </div>


@endsection
