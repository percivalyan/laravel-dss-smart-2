@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Tambah Criteria</h4>
                    </div>
                    <div class="content">
                        <form action="{{ route('criteria.store') }}" method="POST">
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
                                <label>Nama Kriteria</label>
                                <input type="text" name="criteria_name" class="form-control"
                                    value="{{ old('criteria_name') }}" required>
                            </div>

                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="number" step="any" name="weight" class="form-control"
                                    value="{{ old('weight') }}" required>
                            </div>

                            <div class="text-right">
                                <a href="{{ route('criteria.index') }}" class="btn btn-default">Batal</a>
                                <button type="submit" class="btn btn-info btn-fill">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
