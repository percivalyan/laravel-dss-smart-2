@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="header">
                    <h4 class="title">Ubah Password</h4>
                </div>
                <div class="content">
                    <form action="{{ route('password.change') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Password Saat Ini</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirm" class="form-control" required>
                        </div>

                        <div class="text-right">
                            <a href="{{ route('dashboard') }}" class="btn btn-default">Batal</a>
                            <button type="submit" class="btn btn-info btn-fill">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
