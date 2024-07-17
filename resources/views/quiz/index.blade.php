@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Materi Soal Evaluasi') }}</h1>
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
                                <i class="fas fa-plus-circle"></i> Tambah Soal
                              </button>

                            </div>
                        <div class="card-body p-0">

                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">No</th>

                                        <th>Pertanyaan</th>
                                        <th style="width: 300px">Jawaban</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($quiz as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $data->question }}</td>
                                        <td>
                                            <div class="col" >
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <button type="button" class="btn btn-block btn-sm {{ $data->answer == 0 ? 'btn-success' : 'btn-danger' }}">{{ $data->option1 }}</button>
                                                        <button type="button" class="btn btn-block btn-sm {{ $data->answer == 2 ? 'btn-success' : 'btn-danger' }}">{{ $data->option3 }}</button>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button type="button" class="btn btn-block btn-sm {{ $data->answer == 1 ? 'btn-success' : 'btn-danger' }}">{{ $data->option2 }}</button>
                                                        <button type="button" class="btn btn-block btn-sm {{ $data->answer == 3 ? 'btn-success' : 'btn-danger' }}">{{ $data->option4 }}</button>
                                                    </div>
                                            </div>


                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg{{$data->id}}"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('quiz.destroy', $data->id) }}" method="POST" class="d-inline">
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
                                              <h4 class="modal-title">Edit Soal</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="{{ route('quiz.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Pertanyaan</label>
                                                    <textarea name="question"
                                                    class="form-control @error('question') is-invalid @enderror"
                                                    placeholder="{{ __('Pertanyaan') }}"
                                                    required>{{ $data->question }}</textarea>
                                                    @error('question')
                                                     <span class="error invalid-feedback">
                                                        {{ $message }}
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <input type="radio" name="answer" value="0" {{ $data->answer == 0 ? 'checked' : '' }}>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="option1" class="form-control @error('option1') is-invalid @enderror" placeholder="{{ __('Jawaban 1') }}" value="{{ $data->option1 }}" required>
                                                            @error('option1')
                                                                <span class="error invalid-feedback">
                                                                    {{ $message }}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <!-- /input-group -->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <input type="radio" name="answer" value="1" {{ $data->answer == 1 ? 'checked' : '' }}>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="option2" class="form-control @error('option2') is-invalid @enderror" placeholder="{{ __('Jawaban 2') }}" value="{{ $data->option2 }}" required>
                                                            @error('option2')
                                                                <span class="error invalid-feedback">
                                                                    {{ $message }}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <!-- /input-group -->
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 20px;">

                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <input type="radio" name="answer" value="2" {{ $data->answer == 2 ? 'checked' : '' }}>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="option3" class="form-control @error('option3') is-invalid @enderror" placeholder="{{ __('Jawaban 3') }}" value="{{ $data->option3 }}" required>
                                                            @error('option3')
                                                                <span class="error invalid-feedback">
                                                                    {{ $message }}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <!-- /input-group -->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <input type="radio" name="answer" value="3" {{ $data->answer == 3 ? 'checked' : '' }}>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="option4" class="form-control @error('option4') is-invalid @enderror" placeholder="{{ __('Jawaban 4') }}" value="{{ $data->option4 }}" required>
                                                            @error('option4')
                                                                <span class="error invalid-feedback">
                                                                    {{ $message }}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <!-- /input-group -->
                                                    </div>
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
              <h4 class="modal-title">Tambah Pertanyaan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('quiz_categories.quiz.store',$quizCategory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Pertanyaan</label>
                    <textarea name="question"
                    class="form-control @error('question') is-invalid @enderror"
                    placeholder="{{ __('Pertanyaan') }}"
                    required>{{ old('question') }}</textarea>
                    @error('question')
                     <span class="error invalid-feedback">
                        {{ $message }}
                     </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="radio" name="answer" value="0" required>
                                </span>
                            </div>
                            <input type="text" name="option1" class="form-control @error('option1') is-invalid @enderror" placeholder="{{ __('Jawaban 1') }}" value="{{ old('option1') }}" required>
                            @error('option1')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="radio" name="answer" value="1" required>
                                </span>
                            </div>
                            <input type="text" name="option2" class="form-control @error('option2') is-invalid @enderror" placeholder="{{ __('Jawaban 2') }}" value="{{ old('option2') }}" required>
                            @error('option2')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="radio" name="answer" value="2" required>
                                </span>
                            </div>
                            <input type="text" name="option3" class="form-control @error('option3') is-invalid @enderror" placeholder="{{ __('Jawaban 3') }}" value="{{ old('option3') }}" required>
                            @error('option3')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="radio" name="answer" value="3" required>
                                </span>
                            </div>
                            <input type="text" name="option4" class="form-control @error('option4') is-invalid @enderror" placeholder="{{ __('Jawaban 4') }}" value="{{ old('option4') }}" required>
                            @error('option4')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- /input-group -->
                    </div>
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
