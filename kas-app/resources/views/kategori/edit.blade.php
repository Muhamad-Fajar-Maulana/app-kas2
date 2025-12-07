@extends('templates/layout')

@section('content')
<h3>Edit Kategori</h3>

<form action="{{ route('kategori.update', $kategori) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $kategori->nama) }}">
        @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-2">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ old('keterangan', $kategori->keterangan) }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
