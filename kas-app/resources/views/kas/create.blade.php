@extends('templates/layout')

@section('content')
<h3>Tambah Kas</h3>

<form action="{{ route('kas.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}">
        @error('tanggal')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-2">
        <label>Tipe Transaksi</label>
        <select name="tipe_transaksi_id" class="form-control">
            <option value="">-- Pilih --</option>
            @foreach($tipe as $t)
                <option value="{{ $t->id }}" {{ old('tipe_transaksi_id') == $t->id ? 'selected' : '' }}>{{ $t->nama }}</option>
            @endforeach
        </select>
        @error('tipe_transaksi_id')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-2">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control">
            <option value="">-- Pilih (opsional) --</option>
            @foreach($kategori as $kat)
                <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-2">
        <label>Nominal</label>
        <input type="number" name="nominal" class="form-control" value="{{ old('nominal') }}">
        @error('nominal')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-2">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
