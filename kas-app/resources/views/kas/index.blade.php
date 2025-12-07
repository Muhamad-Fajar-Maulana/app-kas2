@extends('templates/layout')

@section('content')
<div class="d-flex justify-content-between mb-2">
    <h3>Daftar Kas</h3>
    <a href="{{ route('kas.create') }}" class="btn btn-primary">Tambah Kas</a>
</div>

<table class="table table-striped">
    <thead>
        <tr><th>ID</th><th>Tanggal</th><th>Jenis</th><th>Kategori</th><th>Nominal</th><th>Oleh</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @foreach($kass as $k)
        <tr>
            <td>{{ $k->id }}</td>
            <td>{{ \Illuminate\Support\Carbon::parse($k->tanggal)->format('Y-m-d') }}</td>
            <td>{{ $k->tipeTransaksi->nama }}</td>
            <td>{{ $k->kategori?->nama ?? '-' }}</td>
            <td>{{ number_format($k->nominal,0,',','.') }}</td>
            <td>{{ $k->user?->name ?? '-' }}</td>
            <td>
                <a href="{{ route('kas.edit', $k) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('kas.destroy', $k) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $kass->links() }}
@endsection
