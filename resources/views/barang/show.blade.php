@extends('layouts.app')

@section('title')
FinTek | Barang | Details #{{ $barang->id }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6 h4 font-weight-bold">Barang Detail | {{ $barang->nama_barang }}</div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('barangs.index') }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-backspace"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('img/barangs/' . ($barang->photo == '' ? 'noimage.jpg' : $barang->photo)) }}" width="250" alt="{{ $barang->name }}">
                            </div>
                            <div class="col-8">
                                <table class="table table-bordered table-hover table-striped mb-0">
                            <tbody>
                                <tr>
                                    <th>#ID</th>
                                    <td>{{ $barang->id }}</td>
                                </tr>
                                <tr>
                                    <th>#NAMA BARANG</th>
                                    <td>{{ $barang->nama_barang }}</td>
                                </tr>
                                <tr>
                                    <th>#HARGA PER UNIT</th>
                                    <td>@currency($barang->harga_per_unit)</td>
                                </tr>
                                <tr>
                                    <th>#CREATED</th>
                                    <td>{{ $barang->created_at }} ({{ $barang->created_at->diffForHumans() }})</td>
                                </tr>
                                <tr>
                                    <th>#UPDATED</th>
                                    <td>{{ $barang->updated_at }} ({{ $barang->updated_at->diffForHumans() }})</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection