@extends('adminlayout')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body text-center">
            <h1>Selamat datang, {{ Auth::user()->nama }}!</h1>
            <p>di aplikasi todolist.</p>
        </div>
    </div>
</div>
@endsection