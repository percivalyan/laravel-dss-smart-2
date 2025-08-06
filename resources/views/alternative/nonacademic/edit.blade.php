@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Alternative Non-Akademik</h4>
                    </div>
                    <div class="content">
                        <form action="{{ route('alternative.nonacademic.update', $alternativeNonAcademic->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="alternative_code">Kode Alternative</label>
                                <input type="text" name="alternative_code" id="alternative_code"
                                    class="form-control @error('alternative_code') is-invalid @enderror"
                                    value="{{ old('alternative_code', $alternativeNonAcademic->alternative_code) }}"
                                    required>
                                @error('alternative_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="alternative_name">Nama Alternative</label>
                                <input type="text" name="alternative_name" id="alternative_name"
                                    class="form-control @error('alternative_name') is-invalid @enderror"
                                    value="{{ old('alternative_name', $alternativeNonAcademic->alternative_name) }}"
                                    required>
                                @error('alternative_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-right mt-4">
                                <a href="{{ route('alternative.index') }}" class="btn btn-default">Batal</a>
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
