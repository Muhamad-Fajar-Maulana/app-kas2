@extends('templates/layout')

@section('content')
<h3>Edit Tipe Transaksi</h3>

<form action="{{ route('tipe_transaksi.update', $tipeTransaksi) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $tipeTransaksi->nama) }}">
        @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
