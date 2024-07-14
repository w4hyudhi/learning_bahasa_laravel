@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Materi Mengeja') }}</h1>
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
                                <i class="fas fa-plus-circle"></i> Tambah Category
                              </button>

                            </div>
                        <div class="card-body p-0">

                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr><th>No</th>
                                        <th>Image</th>
                                        <th>Nama Category</th>
                                        <th>Deskripsi</th>
                                        <th style="width: 200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{$data->image}}" style="max-width: 50px;" class="img-fluid" alt="image"></td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg{{$data->id}}"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('quiz_categories.destroy', $data->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                            <a href="{{ route('category_image.item_image.index', $data->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-lg{{$data->id}}">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Edit Materi</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="{{ route('quiz_categories.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="{{ __('Nama Materi') }}"
                                                    value="{{ old('name',$data->name) }}"
                                                    required>
                                                    @error('name')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <input type="number" name="level"
                                                    class="form-control @error('level') is-invalid @enderror"
                                                    placeholder="{{ __('level') }}"
                                                    value="{{ old('level',$data->level) }}"
                                                    min="1" max="5"
                                                    required>
                                                    @error('level')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <input type="text" name="description"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    placeholder="{{ __('description') }}"
                                                    value="{{ old('description',$data->description) }}"
                                                    required>
                                                    @error('description')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" name="image"
                                                    class="form-control @error('image') is-invalid @enderror"
                                                    placeholder="{{ __('image') }}"
                                                    value="{{ old('image',$data->image) }}"
                                                    >
                                                    @error('image')
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
              <h4 class="modal-title">Tambah Materi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('quiz_categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="{{ __('Nama Materi') }}"
                    value="{{ old('name') }}"
                    required>
                    @error('name')
                     <span class="error invalid-feedback">
                        {{ $message }}
                     </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input type="number" name="level"
                    class="form-control @error('level') is-invalid @enderror"
                    placeholder="{{ __('level') }}"
                    value="{{ old('level') }}"
                    min="1" max="5"
                    required>
                    @error('level')
                     <span class="error invalid-feedback">
                        {{ $message }}
                     </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="{{ __('description') }}"
                    value="{{ old('description') }}"
                    required>
                    @error('description')
                     <span class="error invalid-feedback">
                        {{ $message }}
                     </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image"
                    class="form-control @error('image') is-invalid @enderror"
                    placeholder="{{ __('image') }}"
                    value="{{ old('image') }}"
                    required>
                    @error('image')
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
