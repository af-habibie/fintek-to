@extends('layouts.app')

@section('title')
    FinTek | Barang | Edit ID #{{ $barang->id }}
@endsection

@section('js')    
    <script>
        $(function() {
            $("#photo").change(function() {
                imagePreview(this);
            });

            function imagePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                        $("#preview").removeClass("d-none");
                        $('#preview').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
        });
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6 h4 font-weight-bold">Barang - Edit | #{{ $barang->nama_barang }}</div>
                        <div class="col-6 text-right">
                                <a href="{{ route('barangs.index') }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-backspace"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barangs.update', $barang->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" value="{{ $barang->nama_barang }}" name="nama_barang" placeholder="Name" class="form-control @error('nama_barang') is-invalid @enderror">
                                @error('nama_barang') <code>{{ $message }}</code> @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga_per_unit">Email</label>
                                <input type="text" value="{{ $barang->harga_per_unit }}" name="harga_per_unit" placeholder="harga_per_unit" class="form-control @error('harga_per_unit') is-invalid @enderror">
                                @error('harga_per_unit') <code>{{ $message }}</code> @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo" class="d-block">Photo</label>
                                <div class="row mb-3">
                                    <div class="col-6"><img src="{{ asset('img/barangs/' . ($barang->photo == '' ? 'noimage.jpg' : $barang->photo)) }}" width="200" alt="{{ $barang->name }}"></div>
                                    <div class="col-6 text-right"><img class="d-none" width="200" id="preview" src="" alt="Preview"></div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="photo" id="photo">
                                    <label class="custom-file-label" for="photo">Browse file</label>
                                </div>
                                @error('photo') <code>{{ $message }}</code> @enderror
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection