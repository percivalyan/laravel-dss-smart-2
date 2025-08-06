@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4">Hasil Perhitungan SPK Non-Akademik (SMART)</h4>

        {{-- Tabel Hasil Utility --}}
        <div class="table-responsive mb-5" style="overflow-x: auto;">
            <table class="table table-bordered table-striped table-hover text-center align-middle" style="min-width: 1000px;">
                <thead class="table-light">
                    <tr>
                        <th rowspan="2">Alternatif</th>
                        @foreach ($criteriaNonAcademics as $criteria)
                            <th colspan="4">{{ $criteria->criteria_name }} ({{ $criteria->criteriaCode->criteria_code }})
                            </th>
                        @endforeach
                        <th rowspan="2">Total Utility</th>
                    </tr>
                    <tr>
                        @foreach ($criteriaNonAcademics as $criteria)
                            <th>Nilai</th>
                            <th>Normalisasi</th>
                            <th>Bobot</th>
                            <th>Utility</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternativeNonAcademics as $alt)
                        <tr>
                            <td>{{ $alt->alternative_name }}</td>
                            @foreach ($criteriaNonAcademics as $criteria)
                                <td>{{ number_format($originalValues[$alt->id][$criteria->id] ?? 0, 2) }}</td>
                                <td>{{ number_format($normalizations[$alt->id][$criteria->id] ?? 0, 3) }}</td>
                                <td>{{ number_format($weights[$criteria->id] ?? 0, 2) }}</td>
                                <td>{{ number_format($utilities[$alt->id][$criteria->id] ?? 0, 3) }}</td>
                            @endforeach
                            <td class="fw-bold">{{ number_format($totals[$alt->id], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Tabel Peringkat --}}
        <div class="table-responsive">
            <h5 class="mb-3">Peringkat Alternatif</h5>
            <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Peringkat</th>
                        <th>Alternatif</th>
                        <th>Total Utility</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($totals as $alt_id => $total)
                        @php $alt = $alternativeNonAcademics->firstWhere('id', $alt_id); @endphp
                        <tr>
                            <td class="fw-bold">{{ $rankings[$alt_id] }}</td>
                            <td>{{ $alt->alternative_name }}</td>
                            <td>{{ number_format($total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
