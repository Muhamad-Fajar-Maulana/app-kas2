@extends('templates.layout')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Daftar User</h3>
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah User</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $ct)
                <tr>
                    <td>{{ $ct->id }}</td>
                    <td>{{ $ct->email }}</td>
                    <td>{{ $ct->name }}</td>
                    <td>{{ $ct->password }}</td>
                    <td>
                        <a href="{{ route('user.edit', $ct->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('user.destroy', $ct->id) }}" 
                              method="POST" 
                              style="display:inline"
                              onsubmit="return confirm('Yakin mau hapus user {{ $ct->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection