@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Tambah Pemilih') }}</h1>
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
                        <form class="form" action="{{ route('elector.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6 col-12">

                                        <div class="form-group">
                                            <label>Nomer Induk Kependudukan (NIK) <span class="text-danger">*</span></label>
                                            <input type="number" name="nik"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            placeholder="{{ __('Nomer NIK') }}"
                                            value="{{ old('nik') }}"
                                            >
                                            @error('nik')
                                             <span class="error invalid-feedback">
                                                {{ $message }}
                                             </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Pemilih <span class="text-danger">*</span></label>
                                            <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="{{ __('Nama Pemilih') }}"
                                            value="{{ old('nama') }}"
                                            required>
                                            @error('nama')
                                             <span class="error invalid-feedback">
                                                {{ $message }}
                                             </span>
                                            @enderror
                                        </div>



                                        <div class="form-group">
                                            <label>Nomer HP</label>
                                            <input type="text" name="telepon"
                                            class="form-control @error('telepon') is-invalid @enderror"
                                            placeholder="{{ __('telepon') }}"
                                            value="{{ old('telepon') }}"
                                            >
                                            @error('telepon')
                                             <span class="error invalid-feedback">
                                                {{ $message }}
                                             </span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label>Status Pemilih</label>
                                            <select name="status_pemilih" class="form-control @error('status_pemilih') is-invalid @enderror">
                                                <option value="1" {{ old('status_pemilih') == '1' ? 'selected' : '' }}>Terdaftar di KPU</option>
                                                <option value="0" {{ old('status_pemilih') == '0' ? 'selected' : '' }}>Belum Terdaftar di KPU</option>
                                            </select>
                                            @error('status_pemilih')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="gender_laki" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="gender_laki">
                                                    Laki-laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="gender_perempuan" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="gender_perempuan">
                                                    Perempuan
                                                </label>
                                            </div>
                                            @error('jenis_kelamin')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>


                                    </div>


                                    <div class="col-md-6 col-12">



                                        <div class="form-group">
                                            <label>Distrik Pemilihan TPS</label>
                                            <select id="distrik" class="form-control select2" style="width: 100%;" name="distrik_id">
                                                <option selected disabled selected disabled value="">- Pilih Distrik -</option>
                                                @foreach($distriks as $distrik)
                                                <option value="{{ $distrik->id }}" {{ old('distrik_id') == $distrik->id ? 'selected' : '' }}>
                                                    {{ $distrik->nama }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('distrik_id')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Desa Pemilihan TPS</label>
                                            <select id="desa" class="form-control select2" style="width: 100%;" name="desa_id">
                                                <option selected disabled selected disabled value="">- Pilih Distrik -</option>
                                                <!-- Desa options will be populated here -->
                                            </select>
                                            @error('desa_id')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Nomer TPS</label>
                                            <select id="tps" class="form-control select2" style="width: 100%;" name="tps_id">
                                                <option selected disabled value="">- Pilih Desa -</option>
                                                <!-- TPS options will be populated here -->
                                            </select>
                                            @error('tps_id')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat Pemilih</label>
                                            <textarea class="form-control" rows="3" name="alamat"   @error('alamat') is-invalid @enderror placeholder="Alamat Pemilih ...">{{ old('alamat') }}</textarea>
                                           @error('alamat')
                                         <span class="error invalid-feedback">
                                         {{ $message }}
                                          </span>
                                            @enderror
                                        </div>



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

@section('styles')

<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('scripts')
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script>
    $(function () {
        $('.select2').select2({
      theme: 'bootstrap4'
    })
    })

    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    $('[data-mask]').inputmask()
    </script>

<script>
    $(document).ready(function() {
    var selectedDesaId = {{ old('desa_id')?? 'null' }};
    var selectedTpsId = {{ old('tps_id') ?? 'null' }};

       function loadDesa(distrikId) {
           if (distrikId) {
               $.ajax({
                   url: '/getDesaByDistrik/' + distrikId,
                   type: 'GET',
                   dataType: 'json',
                   success: function(data) {
                       $('#desa').empty();
                       $.each(data, function(key, value) {
                           $('#desa').append('<option value="'+key+'">'+value+'</option>');
                       });
                       if (selectedDesaId) {
                           $('#desa').val(selectedDesaId);
                       }
                       $('#desa').trigger('change');
                   }
               });
           } else {
               $('#desa').empty();
           }
       }

       function loadTps(desaId) {
           if (desaId) {
               $.ajax({
                   url: '/getTpsByDesa/' + desaId,
                   type: 'GET',
                   dataType: 'json',
                   success: function(data) {
                       $('#tps').empty();
                       $.each(data, function(key, value) {
                           $('#tps').append('<option value="'+key+'">'+value+'</option>');
                       });
                       if (selectedTpsId) {
                           $('#tps').val(selectedTpsId);
                       }
                   }
               });
           } else {
               $('#tps').empty();
           }
       }

       $('#distrik').change(function() {
           loadDesa($(this).val());
       });

       $('#desa').change(function() {
           loadTps($(this).val());
       });

       // Trigger change event on distrik when the page is loaded if distrik_id has a value
       var distrikId = $('#distrik').val();
       if (distrikId) {
           $('#distrik').trigger('change');
       }
   });
   </script>

@endsection
