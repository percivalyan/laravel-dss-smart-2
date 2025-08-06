@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Criteria</h4>
                    </div>
                    <div class="content">
                        <form action="{{ route('criteria.update', $criteria->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Kode Criteria</label>
                                <select name="criteria_code_id" class="form-control" required>
                                    <option value="">-- Pilih Kode --</option>
                                    @foreach ($criteriaCodes as $code)
                                        <option value="{{ $code->id }}"
                                            {{ $criteria->criteria_code_id == $code->id ? 'selected' : '' }}>
                                            {{ $code->criteria_code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <input type="text" name="criteria_name" class="form-control"
                                    value="{{ $criteria->criteria_name }}" required>
                            </div>

                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="number" step="any" name="weight" class="form-control"
                                    value="{{ $criteria->weight }}" required>
                            </div>

                            <div class="text-right">
                                <a href="{{ route('criteria.index') }}" class="btn btn-default">Batal</a>
                                <button type="submit" class="btn btn-info btn-fill">
                                    <i class="fa fa-save"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
