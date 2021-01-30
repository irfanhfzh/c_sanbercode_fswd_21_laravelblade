@extends('adminlte.master')

@section('content')
<div class="m-3">
    <h2> {{ $pertanyaan->judul }} </h2>
    <p> {{ $pertanyaan->isi }} </p>
</div>
@endsection