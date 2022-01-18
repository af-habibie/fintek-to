@extends('layouts.app')

@section('title')
    FinTek | User | Edit ID #{{ $user->id }}
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
                        <div class="col-6 h4 font-weight-bold">User - Edit | #{{ $user->name }}</div>
                        <div class="col-6 text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-backspace"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{ $user->name }}" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                                @error('name') <code>{{ $message }}</code> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" value="{{ $user->email }}" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                                @error('email') <code>{{ $message }}</code> @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" value="{{ old('password') }}" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                                @error('password') <code>{{ $message }}</code> @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo" class="d-block">Photo</label>
                                <div class="row mb-3">
                                    <div class="col-6"><img src="{{ asset('img/users/' . ($user->photo == '' ? 'noimage.jpg' : $user->photo)) }}" width="200" class="rounded-circle" alt="{{ $user->name }}"></div>
                                    <div class="col-6 text-right"><img class="d-none rounded-circle" width="200" id="preview" src="" alt="Preview"></div>
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