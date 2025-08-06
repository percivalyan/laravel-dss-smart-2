@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="text-start px-3 pt-3">
            <a href="{{ route('sub-criteria.index') }}" class="btn btn-warning btn-fill">
                <i class="fa fa-arrow-right"></i> Pindah ke Academic
            </a>
        </div>
        <br>
        {{-- Form Tambah --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Tambah Sub Criteria Non-Academic</h4>
                    </div>
                    <div class="content">
                        <form action="{{ route('sub-criteriana.quick-store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Kode Criteria</label>
                                <select name="criteria_code_id" class="form-control" required>
                                    <option value="">-- Pilih Kode --</option>
                                    @foreach ($criteriaCodes as $code)
                                        <option value="{{ $code->id }}">{{ $code->criteria_code }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nama Sub Kriteria</label>
                                <input type="text" name="sub_criteria_name" class="form-control"
                                    placeholder="Contoh: Soft Skill A" required>
                            </div>

                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="number" step="any" name="sub_criteria_value" class="form-control"
                                    placeholder="0.00" required>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-fill">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Sub Kriteria --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Daftar Sub Kriteria Non-Academic</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sub-criteriana.bulk-update') }}" method="POST">
                            @csrf
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20%">Kriteria</th>
                                            <th>Sub Kriteria</th>
                                            <th style="width: 15%">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subCriteriaNonAcademics as $item)
                                            <tr>
                                                <td>{{ $item->criteriaCode->criteria_code }}</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="sub_criteria[{{ $item->id }}][sub_criteria_name]"
                                                        value="{{ $item->sub_criteria_name }}">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" class="form-control"
                                                        name="sub_criteria[{{ $item->id }}][sub_criteria_value]"
                                                        value="{{ $item->sub_criteria_value }}">
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">
                                                    Belum ada data sub kriteria non-academic.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                @if ($subCriteriaNonAcademics->count())
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-success btn-fill">
                                            <i class="fa fa-save"></i> Simpan Semua Perubahan
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
