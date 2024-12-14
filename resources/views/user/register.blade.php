@extends('auth')
@section('content')
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card rounded-4 shadow-lg">
                        <div class="card-body">
                            <h2 class="text-center">Registrasi</h2>
                            @if ($errors->any())
                                @foreach ($errors->all() as $err)
                                    <p class="alert alert-danger">{{ $err }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('register.action') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label>Nama <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="nama" value="{{ old('nama') }}"
                                        placeholder="Masukkan nama lengkap" required />
                                </div>
                                <div class="mb-3">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                        placeholder="Masukkan email" required />
                                </div>
                                <div class="mb-3">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password"
                                        placeholder="Masukkan password" required />
                                </div>
                                <div class="mb-3">
                                    <label>Konfirmasi Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password_confirm"
                                        placeholder="Masukkan kembali password" required />
                                </div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <button class="btn btn-primary" type="submit">Register</button>
                                    <a class="btn btn-info" href="{{ route('login') }}">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
