@extends('templates/layout')

@section('content')
<h3>Tambah Kategori</h3>

<form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-2">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
