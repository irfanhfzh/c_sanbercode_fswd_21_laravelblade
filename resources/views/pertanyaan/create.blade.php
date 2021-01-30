@extends('adminlte.master')

@section('content')
<div class="m-3">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Buat Pertanyaan Baru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/pertanyaan" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="judul">Judul Pertanyaan</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', '') }}" placeholder="Masukkan Judul Pertanyaan...">
                @error('judul')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="isi">Isi Pertanyaan</label>
                <input type="text" class="form-control" id="isi" name="isi" value="{{ old('isi', '') }}" placeholder="Masukkan Isi Pertanyaan...">
                @error('isi')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
        </form>
    </div>
</div>
@endsection