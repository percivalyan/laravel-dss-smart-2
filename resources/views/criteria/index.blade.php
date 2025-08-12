@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">

            {{-- Academic Criteria --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="header d-flex flex-wrap justify-content-between align-items-center mb-3">
                            <h4 class="title mb-2">Daftar Kriteria Akademik</h4>
                            <a href="{{ route('criteria.create') }}" class="btn btn-info btn-fill">
                                <i class="fa fa-plus"></i> Tambah Kriteria
                            </a>
                        </div>

                        <div class="content">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Nama Kriteria</th>
                                            <th>Bobot</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($criterias as $index => $item)
                                            <tr>
                                                <td>{{ $criterias->firstItem() + $index }}</td>
                                                <td>{{ $item->criteriaCode->criteria_code ?? '-' }}</td>
                                                <td>{{ $item->criteria_name }}</td>
                                                <td>{{ $item->weight }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('criteria.edit', $item->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('criteria.destroy', $item->id) }}" method="POST"
                                                        onsubmit="return confirm('Hapus data ini?')" class="d-inline">
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
                                                <td colspan="6" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination-wrapper mt-3">
                                {{ $criterias->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Non-Academic Criteria --}}
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="header d-flex flex-wrap justify-content-between align-items-center mb-3">
                            <h4 class="title mb-2">Daftar Kriteria Non-Akademik</h4>
                            <a href="{{ route('criteria.nonacademic.create') }}" class="btn btn-info btn-fill">
                                <i class="fa fa-plus"></i> Tambah Kriteria
                            </a>
                        </div>

                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Nama Kriteria</th>
                                            <th>Bobot</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($criteriaNonAcademics as $index => $item)
                                            <tr>
                                                <td>{{ $criteriaNonAcademics->firstItem() + $index }}</td>
                                                <td>{{ $item->criteriaCode->criteria_code ?? '-' }}</td>
                                                <td>{{ $item->criteria_name }}</td>
                                                <td>{{ $item->weight }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('criteria.nonacademic.edit', $item->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('criteria.nonacademic.destroy', $item->id) }}"
                                                        method="POST" onsubmit="return confirm('Hapus data ini?')"
                                                        class="d-inline">
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
                                                <td colspan="6" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination-wrapper mt-3">
                                {{ $criteriaNonAcademics->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        /* Responsiveness: HP kecil */
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
                /* agar tabel scroll di HP */
            }
        }
    </style>
@endsection
