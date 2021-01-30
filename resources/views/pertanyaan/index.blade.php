@extends('adminlte.master')

@section('content')
<div class="m-3">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Daftar Pertanyaan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        @if(session('sukses'))
            <div class="alert alert-success">
                {{ session('sukses') }}
            </div>
        @endif
        <a class="btn btn-primary mb-4" href="/pertanyaan/create">Buat Pertanyaan Baru</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Judul Pertanyaan</th>
                <th>Isi Pertanyaan</th>
                <th style="width: 40px">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @forelse($pertanyaan as $key => $tanya)
                    <tr>
                        <td> {{ $key + 1 }} </td>
                        <td> {{ $tanya->judul }} </td>
                        <td> {{ $tanya->isi }} </td>
                        <td style="display: flex;">
                            <a href="/pertanyaan/{{$tanya->id}}" class="btn btn-info btn-sm">Show</a>
                            <a href="/pertanyaan/{{$tanya->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                            <form action="/pertanyaan/{{$tanya->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" align="center">Belum ada Pertanyaan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection