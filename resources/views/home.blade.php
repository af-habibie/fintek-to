@extends('layouts.app')

@section('title')
FinTek - Easy Financial Tech
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body h2"><i class="fas fa-user"></i> | Entry Data User </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('users.index') }}">Continue</a>
                        <div class="small text-white"><i class="fas fa-angle-double-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body h2"><i class="fas fa-shopping-cart"></i> | Entry Data Barang </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link"href="{{ route('barangs.index') }}">Continue</a>
                        <div class="small text-white"><i class="fas fa-angle-double-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body h2"><i class="fas fa-money-check-alt"></i> | Entry Data Transaksi </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('transaksis.index') }}">Continue</a>
                        <div class="small text-white"><i class="fas fa-angle-double-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body h2"><i class="fas fa-book"></i> | Generate Laporan </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Continue</a>
                        <div class="small text-white"><i class="fas fa-angle-double-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
