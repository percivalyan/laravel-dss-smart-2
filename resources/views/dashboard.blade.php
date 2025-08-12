@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            {{-- Informasi Tentang SPK dan SMART --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Apa itu SPK & Metode SMART?</h4>
                        </div>
                        <div class="content">
                            <p><strong>Sistem Pendukung Keputusan (SPK)</strong> adalah sistem berbasis komputer yang membantu
                                dalam proses pengambilan keputusan dengan cara menganalisis data dan model yang relevan.</p>
                            <p><strong>SMART (Simple Multi-Attribute Rating Technique)</strong> adalah salah satu metode SPK
                                yang digunakan untuk memilih alternatif terbaik berdasarkan beberapa kriteria yang memiliki
                                bobot dan nilai tertentu. Prosesnya melibatkan penilaian setiap alternatif terhadap setiap
                                kriteria, lalu dikalikan dengan bobot untuk menghasilkan skor total.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabel Statistik --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Statistik Data SPK</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Jenis Data</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Alternatif Akademik</td>
                                        <td>{{ $totalAlternatives }}</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Alternatif Non-Akademik</td>
                                        <td>{{ $totalAlternativesNonAcademic }}</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Nilai Alternatif Akademik</td>
                                        <td>{{ $totalAlternativeValues }}</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Nilai Alternatif Non-Akademik</td>
                                        <td>{{ $totalAlternativeValuesNonAcademic }}</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Kriteria Akademik</td>
                                        <td>{{ $totalCriterias }}</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kriteria Non-Akademik</td>
                                        <td>{{ $totalCriteriasNonAcademic }}</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Sub-Kriteria Akademik</td>
                                        <td>{{ $totalSubCriterias }}</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Sub-Kriteria Non-Akademik</td>
                                        <td>{{ $totalSubCriteriasNonAcademic }}</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Kode Kriteria</td>
                                        <td>{{ $totalCriteriaCodes }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
