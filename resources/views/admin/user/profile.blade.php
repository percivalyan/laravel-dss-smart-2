@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 offset-md-2">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Profil Pengguna</h4>
                        <p class="category">Detail akun pengguna</p>
                    </div>
                    <div class="content">
                        @if ($user)
                            <div class="form-group">
                                <label><strong>Nama:</strong></label>
                                <p>{{ $user->name }}</p>
                            </div>

                            <div class="form-group">
                                <label><strong>Email:</strong></label>
                                <p>{{ $user->email }}</p>
                            </div>

                            <div class="text-right">
                                <a href="{{ route('password.change') }}" class="btn btn-warning btn-fill"
                                    style="margin-left: 10px;">
                                    Ubah Password
                                </a>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-fill">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        @else
                            <div class="alert alert-danger">
                                Data pengguna tidak ditemukan.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
