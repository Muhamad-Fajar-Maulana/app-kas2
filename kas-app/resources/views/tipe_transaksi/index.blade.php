@extends('templates/layout')

@section('content')
<div class="d-flex justify-content-between mb-2">
    <h3>Daftar Tipe Transaksi</h3>
    <a href="{{ route('tipe_transaksi.create') }}" class="btn btn-primary">Tambah</a>
</div>

<table class="table table-bordered">
    <thead><tr><th>ID</th><th>Nama</th><th>Aksi</th></tr></thead>
    <tbody>
        @foreach($tipeTransaksi as $t)
        <tr>
            <td>{{ $loop->iteration + ($tipeTransaksi->currentPage()-1)*$tipeTransaksi->perPage() }}</td>
            <td>{{ $t->nama }}</td>
            <td>
                <a href="{{ route('tipe_transaksi.edit', $t) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('tipe_transaksi.destroy', $t) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $tipeTransaksi->links() }}
@endsection
