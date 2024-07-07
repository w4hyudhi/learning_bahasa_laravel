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
                                    {{-- 'category_video_id','title', 'url_video' --}}
                                    <tr><th>No</th>
                                       <th>Judul Video</th>
                                        <th>Category Video</th>
                                        <th>Thumbnail</th>
                                        <th style="width: 200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categoryVideo->videos as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->category->name }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td><a href="{{ $data->url_video }}" target="_blank"><img src="{{ $data->getYoutubeThumbnail($data->url_video)}}" alt="" width="100"></a></td>

                                        <td>
                                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg{{$data->id}}"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('category_video.destroy', $data->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                            <a href="{{ route('category_video.video.index', $data->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-lg{{$data->id}}">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Edit Video</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="{{ route('video.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                            <div class="modal-body">


                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="text" name="title"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    placeholder="{{ __('Judul Video') }}"
                                                    value="{{ old('title',$data->title) }}"
                                                    required>
                                                    @error('title')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Link Video Youtube</label>
                                                    <input type="text" name="url_video"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    placeholder="{{ __('https://www.youtube.com/watch?v=') }}"
                                                    value="{{ old('url_video',$data->url_video) }}"
                                                    required>
                                                    @error('url_video')
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
              <h4 class="modal-title">Tambah Video</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('category_video.video.store',$categoryVideo) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="{{ __('Judul Video') }}"
                    value="{{ old('title') }}"
                    required>
                    @error('title')
                     <span class="error invalid-feedback">
                        {{ $message }}
                     </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Link Video Youtube</label>
                    <input type="text" name="url_video"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="{{ __('https://www.youtube.com/watch?v=') }}"
                    value="{{ old('url_video') }}"
                    required>
                    @error('url_video')
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
