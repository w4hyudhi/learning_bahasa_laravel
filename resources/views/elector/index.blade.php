@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Distrik') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('export.elector') }}" class="btn btn-success float-left"><i class="fas fa-file-excel"></i>Export Excel</a>
                            <a href="{{ route('elector.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i>Tambah Pemilih</a>
                        </div>
                        <div class="card-body p-4">
                            <table id="elector-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Distrik</th>
                                        <th>Desa</th>
                                        <th>TPS</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#elector-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('elector.index') }}',
                columns: [
                    { data: 'nik', name: 'nik' },
                    { data: 'nama', name: 'nama' },
                    { data: 'distrik_nama', name: 'distrik_nama' },
                    { data: 'desa_nama', name: 'desa_nama' },
                    { data: 'tps_nama', name: 'tps_nama' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endsection

