@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Tambah Criteria Code</h4>
                    </div>
                    <div class="content">
                        <form action="{{ route('criteria-code.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="criteria_code">Kode Criteria</label>
                                <input type="text" name="criteria_code" id="criteria_code"
                                    class="form-control @error('criteria_code') is-invalid @enderror"
                                    value="{{ old('criteria_code') }}" required>
                                @error('criteria_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-right">
                                <a href="{{ route('criteria-code.index') }}" class="btn btn-default">Batal</a>
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
