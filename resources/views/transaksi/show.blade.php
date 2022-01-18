@extends('layouts.app')

@section('title')
FinTek | Transaksi | Details #{{ $transaksi->id }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6 h4 font-weight-bold">Transaksi Detail | #{{ $transaksi->id }}</div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('transaksis.index') }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-backspace"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <table class="table table-bordered table-hover table-striped mb-0">
                            <tbody>
                                <tr>
                                    <th>#ID</th>
                                    <td>{{ $transaksi->id }}</td>
                                </tr>
                                <tr>
                                    <th>#Pembeli</th>
                                    <td>{{ $transaksi->pembeli }}</td>
                                </tr>
                                <tr>
                                    <th>#NAMA BARANG</th>
                                    <td>{{ $transaksi->nama_barang }}</td>
                                </tr>
                                <tr>
                                    <th>#JUMLAH BARANG</th>
                                    <td>{{ $transaksi->jumlah_barang }}</td>
                                </tr>
                                <tr>
                                    <th>#TOTAL HARGA</th>
                                    <td>@currency($transaksi->total_harga)</td>
                                </tr>
                                <tr>
                                    <th>#CREATED</th>
                                    <td>{{ $transaksi->created_at }} ({{ $transaksi->created_at->diffForHumans() }})</td>
                                </tr>
                                <tr>
                                    <th>#UPDATED</th>
                                    <td>{{ $transaksi->updated_at }} ({{ $transaksi->updated_at->diffForHumans() }})</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection