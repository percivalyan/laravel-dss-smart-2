@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12"> <!-- full width di semua device -->
                    <div class="card">
                        <div class="header d-flex flex-wrap justify-content-between align-items-center mb-3">
                            <h4 class="title mb-2">Daftar Criteria Code</h4>
                            <a href="{{ route('criteria-code.create') }}" class="btn btn-info btn-fill">
                                <i class="fa fa-plus"></i> Tambah Criteria
                            </a>
                        </div>

                        <div class="content">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Criteria</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($criteriaCodes as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->criteria_code }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('criteria-code.edit', $item->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('criteria-code.destroy', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Hapus data ini?')">
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
                                                <td colspan="4" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            @if (method_exists($criteriaCodes, 'links'))
                                <div class="pagination-wrapper mt-3">
                                    {{ $criteriaCodes->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Responsive tweaks untuk tombol & teks di layar kecil */
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
                /* cegah teks pecah, tabel scroll horizontal */
            }
        }
    </style>
@endsection
