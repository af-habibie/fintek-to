@extends('layouts.app')

@section('title')
    FinTek | Transaksi | Edit ID #{{ $transaksi->id }}
@endsection

@section('js')    
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6 h4 font-weight-bold">Transaksi - Edit | #{{ $transaksi->id }}</div>
                        <div class="col-6 text-right">
                                <a href="{{ route('transaksis.index') }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-backspace"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaksis.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                                <label for="pembeli">Pembeli</label>
                                <select class="form-control @error('pembeli') is-invalid @enderror" name="pembeli" >
                                    @if (count($user) > 0)
                                        @foreach ($user as $item)
                                            <option value="{{ $item->name }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('pembeli') <code>{{ $message }}</code> @enderror
                            </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="nama_barang" value="{{ $transaksi->nama_barang }}" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror">
                            @error('nama_barang') <code>{{ $message }}</code> @enderror
                        </div>
                        <div class="form-group">
                                <label for="jumlah_barang">Jumlah Barang</label>
                                <input type="text" value="{{ $transaksi->jumlah_barang }}" name="jumlah_barang" placeholder="jumlah_barang" class="form-control @error('jumlah_barang') is-invalid @enderror">
                                @error('jumlah_barang') <code>{{ $message }}</code> @enderror
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="text" value="{{ $transaksi->total_harga }}" name="total_harga" placeholder="total_harga" class="form-control @error('total_harga') is-invalid @enderror">
                                @error('total_harga') <code>{{ $message }}</code> @enderror
                            </div>
                        
                        <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection