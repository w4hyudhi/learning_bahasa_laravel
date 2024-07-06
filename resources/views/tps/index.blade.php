@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('TPS') }}</h1>
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
                            <a href="{{ route('desa.tps.create',$desa->id) }}" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i>Tambah TPS</a>
                            </div>
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomer</th>
                                        <th>Nama</th>
                                        <th>Distrik</th>
                                        <th>Kecamatan</th>
                                        <th>Jumlah DPT</th>
                                        <th>Jumlah Pemilih</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tps as $data)
                                    <tr>
                                        <td>{{ $data->nomer }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->desa->distrik->nama }}</td>
                                        <td>{{ $data->desa->nama }}</td>
                                        <td>{{ $data->jumlah_dpt }}</td>
                                        <td>{{ $data->electors ? $data->electors->count() : 0 }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg{{$data->id}}"><i class="fas fa-chart-bar"></i></a>
                                            <a href="{{ route('tps.edit',$data->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('tps.destroy',$data->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-lg{{$data->id}}">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Edit Admin</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="{{ route('hasil.update',$data->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label>Total Suara</label>
                                                    <input type="number" name="suara"
                                                    class="form-control @error('suara') is-invalid @enderror"
                                                    placeholder="{{ __('Total Suara') }}"
                                                    value="{{ old('suara',$data->suara) }}"
                                                    >
                                                    @error('suara')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Total Suara Didapat</label>
                                                    <input type="number" name="suara_didapat"
                                                    class="form-control @error('suara_didapat') is-invalid @enderror"
                                                    placeholder="{{ __('Total Suara Didapat') }}"
                                                    value="{{ old('suara_didapat',$data->suara_didapat) }}"
                                                    >
                                                    @error('suara_didapat')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Total Suara Sah</label>
                                                    <input type="number" name="suara_sah"
                                                    class="form-control @error('suara_sah') is-invalid @enderror"
                                                    placeholder="{{ __('Total Suara Sah') }}"
                                                    value="{{ old('suara_sah',$data->suara_sah) }}"
                                                    >
                                                    @error('suara_sah')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Total Suara Tidak Sah</label>
                                                    <input type="number" name="suara_tidak_sah"
                                                    class="form-control @error('suara_tidak_sah') is-invalid @enderror"
                                                    placeholder="{{ __('Total Suara Tidak Sah') }}"
                                                    value="{{ old('suara_tidak_sah',$data->suara_tidak_sah) }}"
                                                    >
                                                    @error('suara_tidak_sah')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Total Suara Golput</label>
                                                    <input type="number" name="suara_golput"
                                                    class="form-control @error('suara_golput') is-invalid @enderror"
                                                    placeholder="{{ __('Total Suara Golput') }}"
                                                    value="{{ old('suara_golput',$data->suara_golput) }}"
                                                    >
                                                    @error('suara_golput')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <button  type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                            </form>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                      </div>

                                @endforeach
                                </tbody>
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
