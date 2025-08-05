@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header d-flex justify-content-between align-items-center">
                            <h4 class="title">Daftar Criteria</h4>
                            <a href="{{ route('criteria.create') }}" class="btn btn-info btn-fill">
                                <i class="fa fa-plus"></i> Tambah Criteria
                            </a>
                        </div>

                        <div class="content table-responsive table-full-width">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($criterias as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->criteriaCode->criteria_code }}</td>
                                            <td>{{ $item->criteria_name }}</td>
                                            <td>{{ $item->weight }}</td>
                                            <td>
                                                <a href="{{ route('criteria.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('criteria.destroy', $item->id) }}" method="POST"
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
                                            <td colspan="6" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            @if (method_exists($criterias, 'links'))
                                <div class="pagination-wrapper mt-3">
                                    {{ $criterias->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
