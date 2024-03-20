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
                <button class="btn btn-outline-primary"><i class="bi bi-file"></i> Save</button>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <form action="{{route('pages.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title">
                </div>

                <span>Content</span>
                <div class="editor" data-bs-theme="dark">

                </div>
            </form>
        </div>
    </div>

</div>
@endsection