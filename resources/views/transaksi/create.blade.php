@extends('layouts.app')

@section('title')
    Fintek | Barang | Create
@endsection

@section('js')    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6 h4 font-weight-bold">Transaksi - Create</div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('transaksis.index') }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-backspace"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">
                        <form action="{{ route('transaksis.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                                <label for="pembeli">User<span class="text-danger">*</span></label>
                                <select class="form-control @error('pembeli') is-invalid @enderror" name="pembeli">
                                    @if (count($user) > 0)
                                        <option value="">Nama Pembeli ...</option>
                                        @foreach ($user as $item)
                                            <option value="{{ $item->name}}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('pembeli') <code>{{ $message }}</code> @enderror
                            </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang<span class="text-danger">*</span></label>
                            <input type="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Nama Barang" class="form-control @error('nama_barang') is-invalid @enderror">
                            @error('nama_barang') <code>{{ $message }}</code> @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah Barang<span class="text-danger">*</span></label>
                            <input type="jumlah_barang" name="jumlah_barang" value="{{ old('jumlah_barang') }}" placeholder="Jumlah Barang" class="form-control @error('jumlah_barang') is-invalid @enderror">
                            @error('jumlah_barang') <code>{{ $message }}</code> @enderror
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total Barang<span class="text-danger">*</span></label>
                            <input type="total_harga" name="total_harga" value="{{ old('total_harga') }}" placeholder="Total Harga" class="form-control @error('total_harga') is-invalid @enderror">
                            @error('total_harga') <code>{{ $message }}</code> @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection