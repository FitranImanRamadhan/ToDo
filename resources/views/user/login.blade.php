@extends('auth')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card rounded-4 shadow-lg">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{ asset('assets1/img/LOGO_TODO.png') }}" alt="login form" class="img-fluid rounded-start-4" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form action="{{ route('login.action') }}" method="POST">
                                    @csrf
                                    <h5 class="fw-normal mb-4" style="letter-spacing: 1px;">Masuk</h5>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" class="form-control form-control-lg" name="email" required />
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" class="form-control form-control-lg" name="password" required />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                    </div>

                                    <a class="small text-muted" href="{{ route('register') }}">Tidak punya akun? kalik disini</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
