@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="text-start px-3 pt-3">
            <a href="{{ route('alternative-value.index') }}" class="btn btn-warning btn-fill">
                <i class="fa fa-arrow-right"></i> Pindah ke Nilai Alternatif Akademik
            </a>

            <a href="{{ route('alternative-valuena.smart-calculate') }}" class="btn btn-success btn-fill">
                <i class="fa fa-arrow-right"></i>Perhitungan SMART Nilai Non Akademik
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <div class="header">
                        <h4 class="title">Penilaian Alternatif Non-Akademik Setiap Kriteria</h4>
                    </div>
                    <div class="content">

                        <a href="{{ route('alternative-valuena.smart-calculate') }}" class="btn btn-success btn-fill mb-3">
                            <i class="fa fa-calculator"></i> Hitung SPK Metode SMART
                        </a>

                        <form action="{{ route('alternative-valuena.bulk-update') }}" method="POST">
                            @csrf

                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Alternatif</th>
                                            @foreach ($criteriaNonAcademics as $criteria)
                                                <th>{{ $criteria->criteriaCode->criteria_code }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternativeNonAcademics as $alt)
                                            <tr>
                                                <td>{{ $alt->alternative_name }}</td>
                                                @foreach ($criteriaNonAcademics as $criteria)
                                                    <td>
                                                        <div class="form-group">
                                                            <select name="values[{{ $alt->id }}][{{ $criteria->id }}]"
                                                                class="form-control">
                                                                @foreach ($subCriteriaNonAcademics->where('criteria_code_id', $criteria->criteria_code_id) as $sub)
                                                                    <option value="{{ $sub->id }}"
                                                                        @if (isset($alternativeValueNonAcademics[$alt->id][$criteria->id]) &&
                                                                                $alternativeValueNonAcademics[$alt->id][$criteria->id]->first()->sub_criteria_non_academic_id == $sub->id) selected @endif>
                                                                        {{ $sub->sub_criteria_value }}
                                                                        ({{ $sub->sub_criteria_name }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-fill">
                                    <i class="fa fa-save"></i> Simpan Semua Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
