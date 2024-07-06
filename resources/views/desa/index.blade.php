@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Distrik {{$distrik->nama}}</h1>
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

                              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">
                                <i class="fas fa-plus-circle"></i> Tambah Kampung
                              </button>

                            </div>
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Kampung</th>
                                        <th>Koordinaotr</th>
                                        <th>Nomer HP</th>
                                        <th>Jumlah TPS</th>
                                        <th>Jumlah Pemilih</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($desa as $data)
                                    <tr>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->koordinator }}</td>
                                        <td>{{ $data->no_hp }}</td>
                                        <td>{{ $data->tps ? $data->tps->count() : 0 }}</td>
                                        <td>{{ $data->electors ? $data->electors->count() : 0 }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg{{$data->id}}"><i class="fas fa-edit"></i></a>
                                            {{-- <a href="{{ route('distrik.edit', $data->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                                            <form action="{{ route('desa.destroy', $data->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                            <a href="{{ route('desa.tps.index', $data->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-lg{{$data->id}}">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Edit Kampung</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="{{ route('desa.update',$data->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Kampung</label>
                                                    <input type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    placeholder="{{ __('Nama Kampung') }}"
                                                    value="{{ old('nama',$data->nama) }}"
                                                    required>
                                                    @error('nama')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Koordinator</label>
                                                    <input type="text" name="koordinator"
                                                    class="form-control @error('koordinator') is-invalid @enderror"
                                                    placeholder="{{ __('Koordinator') }}"
                                                    value="{{ old('koordinator',$data->koordinator) }}"
                                                    required>
                                                    @error('koordinator')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Nomer HP</label>
                                                    <input type="text" name="no_hp"
                                                    class="form-control @error('no_hp') is-invalid @enderror"
                                                    placeholder="{{ __('no_hp') }}"
                                                    value="{{ old('no_hp',$data->no_hp) }}"
                                                    required>
                                                    @error('no_hp')
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

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Kampung</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('distrik.desa.store',$distrik->id) }}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Kampung</label>
                    <input type="text" name="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    placeholder="{{ __('Nama Kampung') }}"
                    value="{{ old('nama') }}"
                    required>
                    @error('nama')
                     <span class="error invalid-feedback">
                        {{ $message }}
                     </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Koordinator</label>
                    <input type="text" name="koordinator"
                    class="form-control @error('koordinator') is-invalid @enderror"
                    placeholder="{{ __('Koordinator') }}"
                    value="{{ old('koordinator') }}"
                    required>
                    @error('koordinator')
                     <span class="error invalid-feedback">
                        {{ $message }}
                     </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nomer HP</label>
                    <input type="text" name="no_hp"
                    class="form-control @error('no_hp') is-invalid @enderror"
                    placeholder="{{ __('no_hp') }}"
                    value="{{ old('no_hp') }}"
                    required>
                    @error('no_hp')
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
    @endsection
