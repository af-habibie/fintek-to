@extends('layouts.app')

@section('title')
    Fintek | Barang | Create
@endsection

@section('js')    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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
                    
                    reader.readAsDataURL(input.files[0]);
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
                            <div class="col-6 h4 font-weight-bold">Barang - Create</div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('barangs.index') }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-backspace"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">
                        <form action="{{ route('barangs.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang<span class="text-danger">*</span></label>
                            <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Nama Barang" class="form-control @error('nama_barang') is-invalid @enderror">
                            @error('nama_barang') <code>{{ $message }}</code> @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga_per_unit">Harga Per Unit<span class="text-danger">*</span></label>
                            <input type="harga_per_unit" name="harga_per_unit" value="{{ old('harga_per_unit') }}" placeholder="Harga Per Unit" class="form-control @error('harga_per_unit') is-invalid @enderror">
                            @error('harga_per_unit') <code>{{ $message }}</code> @enderror
                        </div>
                        <div class="form-group">
                                <label for="photo" class="d-block">Photo<span class="text-danger">*</span></label>
                                <div class="row mb-3">
                                    <div class="col-6"><img src="{{ asset('img/users/noimage.jpg') }}" width="200" class="rounded-circle" alt=""></div>
                                    <div class="col-6 text-right"><img class="d-none" width="100" id="preview" src="" alt="Preview"></div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="photo" id="photo">
                                    <label class="custom-file-label" for="photo">Browse file</label>
                                </div>
                                @error('photo') <code>{{ $message }}</code> @enderror
                            </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection