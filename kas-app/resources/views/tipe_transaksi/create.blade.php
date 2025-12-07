@extends('templates/layout')

@section('content')
<h3>Tambah Tipe Transaksi</h3>

<form action="{{ route('tipe_transaksi.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
