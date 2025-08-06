@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">

            {{-- Alternative Academic --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header d-flex justify-content-between align-items-center">
                            <h4 class="title">Daftar Alternative Akademik</h4>
                            <a href="{{ route('alternative.create') }}" class="btn btn-info btn-fill">
                                <i class="fa fa-plus"></i> Tambah Alternative
                            </a>
                        </div>

                        <div class="content table-responsive table-full-width">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

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
                                            <td>{{ $alternatives->firstItem() + $index }}</td>
                                            <td>{{ $item->alternative_code }}</td>
                                            <td>{{ $item->alternative_name }}</td>
                                            <td>
                                                <a href="{{ route('alternative.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('alternative.destroy', $item->id) }}" method="POST"
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
                                            <td colspan="5" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="pagination-wrapper mt-3">
                                {{ $alternatives->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Alternative Non-Academic --}}
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header d-flex justify-content-between align-items-center">
                            <h4 class="title">Daftar Alternative Non-Akademik</h4>
                            <a href="{{ route('alternative.nonacademic.create') }}" class="btn btn-info btn-fill">
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
                                    @forelse ($alternativeNonAcademics as $index => $item)
                                        <tr>
                                            <td>{{ $alternativeNonAcademics->firstItem() + $index }}</td>
                                            <td>{{ $item->alternative_code }}</td>
                                            <td>{{ $item->alternative_name }}</td>
                                            <td>
                                                <a href="{{ route('alternative.nonacademic.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('alternative.nonacademic.destroy', $item->id) }}"
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
                                            <td colspan="5" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="pagination-wrapper mt-3">
                                {{ $alternativeNonAcademics->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
