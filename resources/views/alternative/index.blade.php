@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="header d-flex justify-content-between align-items-center">
                <h4 class="title">Daftar Alternative</h4>
                <a href="{{ route('alternative.create') }}" class="btn btn-info btn-fill">
                    <i class="fa fa-plus"></i> Tambah Alternative
                </a>
            </div>

            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Alternative</th>
                            <th>Nama Alternative</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alternatives as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->alternative_code }}</td>
                                <td>{{ $item->alternative_name }}</td>
                                <td>
                                    <a href="{{ route('alternative.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('alternative.destroy', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Hapus data ini?')">
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
                                <td colspan="5" class="text-center">Tidak ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if (method_exists($alternatives, 'links'))
                    <div class="pagination-wrapper mt-3">
                        {{ $alternatives->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
