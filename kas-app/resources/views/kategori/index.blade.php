@extends('templates/layout')

@section('content')
<div class="d-flex justify-content-between mb-2">
    <h3>Daftar Kategori</h3>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah</a>
</div>

<table class="table table-bordered">
    <thead><tr><th>ID</th><th>Nama</th><th>Keterangan</th><th>Aksi</th></tr></thead>
    <tbody>
        @foreach($kategoris as $k)
        <tr>
            <td>{{ $loop->iteration + ($kategoris->currentPage()-1)*$kategoris->perPage() }}</td>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->keterangan }}</td>
            <td>
                <a href="{{ route('kategori.edit', $k) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('kategori.destroy', $k) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $kategoris->links() }}
@endsection
