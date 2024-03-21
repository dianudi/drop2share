@extends('templates.base')
@section('title', 'Upload New File')
@section('content')
<x-topbar />
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h1 class="text-center">Upload New File</h1>
            <form action="{{route('my-files.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label">Select file to upload</label>
                    <input class="form-control @error('file') is-invalid @enderror" name="file" type="file"
                        id="formFile">
                    @error('file')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="floatingInput" value="{{old('name')}}" placeholder="lorem ipsum">
                    <label for="floatingInput">Name</label>
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <small><span class="text-danger">*</span> Optional, if you want to protect this file.</small>
                    @error('password')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="date" name="delete_at" value="{{old('delete_at')}}"
                        class="form-control @error('delete_at') is-invalid @enderror" id="floatingInput">
                    <label for="floatingInput">Delete At</label>
                    <small><span class="text-danger">*</span> Optional, if you want schedule delete automaticly.</small>
                </div>
                <button class="btn btn-primary w-100 mt-3">Upload</button>
            </form>
        </div>
    </div>
</div>
@endsection