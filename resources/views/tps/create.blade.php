@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Tambah TPS') }}</h1>
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
                        <form class="form" action="{{ route('desa.tps.store',$desa->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6 col-12">

                                        <div class="form-group">
                                            <label>Nomer TPS <span class="text-danger">*</span></label>
                                            <input type="text" name="nomer"
                                            class="form-control @error('nomer') is-invalid @enderror"
                                            placeholder="{{ __('Nomer TPS') }}"
                                            value="{{ old('nomer') }}"
                                            required>
                                            @error('nomer')
                                             <span class="error invalid-feedback">
                                                {{ $message }}
                                             </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Nama TPS <span class="text-danger">*</span></label>
                                            <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="{{ __('Nama TPS') }}"
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

                                        <div class="form-group">
                                            <label>jumblah Daftar Pemilih Sementara (DPS)</label>
                                            <input type="number" name="jumblah_dps"
                                            class="form-control @error('jumblah_dps') is-invalid @enderror"
                                            placeholder="{{ __('Jumblah DPS') }}"
                                            value="{{ old('jumblah_dps') }}"
                                            >
                                            @error('jumblah_dps')
                                             <span class="error invalid-feedback">
                                                {{ $message }}
                                             </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah Pemilih Tetap (DPT)</label>
                                            <input type="number" name="jumblah_dpt"
                                            class="form-control @error('jumblah_dpt') is-invalid @enderror"
                                            placeholder="{{ __('Jumblah Pemilih Tetap') }}"
                                            value="{{ old('jumblah_dpt') }}"
                                            >
                                            @error('jumblah_dpt')
                                             <span class="error invalid-feedback">
                                                {{ $message }}
                                             </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah Pemilih Tetap Tambahan(DPTB)</label>
                                            <input type="number" name="jumblah_dptb"
                                            class="form-control @error('jumblah_dptb') is-invalid @enderror"
                                            placeholder="{{ __('Jumblah Pemilih Tetap') }}"
                                            value="{{ old('jumblah_dptb') }}"
                                            >
                                            @error('jumblah_dptb')
                                             <span class="error invalid-feedback">
                                                {{ $message }}
                                             </span>
                                            @enderror
                                        </div>




                                    </div>

                                    <div class="col-md-6 col-12">

                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="number" name="latitude" step=any
                                            class="form-control @error('latitude') is-invalid @enderror"
                                            placeholder="{{ __('latitude lokasi') }}" value="{{ old('latitude',$desa->distrik->latitude)}}" id="latitude" required>
                                             @error('latitude')
                                             <span class="error invalid-feedback">
                                              {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>longitude</label>
                                            <input type="number" name="longitude" step=any
                                            class="form-control @error('longitude') is-invalid @enderror"
                                            placeholder="{{ __('longitude lokasi') }}" value="{{ old('longitude',$desa->distrik->longitude)}}" id="longitude" required>
                                             @error('longitude')
                                             <span class="error invalid-feedback">
                                              {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <input type="text" name="kecamatan"
                                                class="form-control @error('kecamatan') is-invalid @enderror"
                                                placeholder="{{ __('Kecamatan') }}" value="{{ old('kecamatan',$desa->distrik->nama) }}"
                                                disabled>
                                            @error('kecamatan')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Kelurahan</label>
                                            <input type="text" name="kelurahan"
                                                class="form-control @error('kelurahan') is-invalid @enderror"
                                                placeholder="{{ __('Kelurahan') }}" value="{{ old('kelurahan',$desa->nama) }}"
                                                disabled>
                                            @error('kelurahan')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat TPS</label>
                                            <textarea class="form-control" rows="3" name="alamat"   @error('alamat') is-invalid @enderror placeholder="Alamat TPS ..." required>{{ old('alamat') }}</textarea>
                                           @error('alamat')
                                         <span class="error invalid-feedback">
                                         {{ $message }}
                                          </span>
                                            @enderror
                                        </div>




                                    </div>


                                        <div class="col-12" style="min-height:400px">
                                                {!! Mapper::render() !!}
                                        </div>



                                </div>

                        </div>

                        <div class="card-footer">
                                <button type="submit" name="action" class="btn btn-primary me-1 mb-1">Simpan</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <!-- /.content -->
@endsection
