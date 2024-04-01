@extends('templates.base')
@section('title', 'Site Page Manager')
@section('content')
<x-topbar />
<div class="container mt-3">
    <div class="row ">
        <div class="col">
            <div class="d-flex justify-content-between">
                <a href="{{route('pages.index')}}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i>
                    Back</a>
                <button type="submit" class="btn btn-outline-primary page-submit"><i class="bi bi-file"></i>
                    Save</button>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <form class="page-form-submit" action="{{route('pages.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="{{old('title')}}" name="title"
                        class="form-control @error('title')is-invalid @enderror" id="title" placeholder="Page Title">
                    @error('title')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <span>Content</span>
                @error('content')
                <div class="alert alert-danger mt-1">
                    {{$message}}
                </div>
                @enderror
                <textarea id="editor" name="content">{{old('content')}}</textarea>
            </form>
        </div>
    </div>

</div>
@endsection