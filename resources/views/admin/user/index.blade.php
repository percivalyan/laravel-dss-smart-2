@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- Header -->
                        <div class="header d-flex flex-wrap justify-content-between align-items-center mb-3">
                            <h4 class="title mb-2">Daftar Pengguna</h4>
                            <a href="{{ route('users.create') }}" class="btn btn-info btn-fill">
                                <i class="fa fa-plus"></i> Tambah Pengguna
                            </a>
                        </div>

                        <div class="content">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Tabel Responsive -->
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tanggal Dibuat</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $index => $user)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data pengguna.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            @if (method_exists($users, 'links'))
                                <div class="pagination-wrapper mt-3">
                                    {{ $users->links() }}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Agar tombol tetap proporsional di mobile */
        @media (max-width: 576px) {
            .header .title {
                font-size: 1rem;
            }

            .btn {
                font-size: 0.85rem;
                padding: 6px 10px;
            }

            table td,
            table th {
                white-space: nowrap;
            }
        }
    </style>
@endsection
