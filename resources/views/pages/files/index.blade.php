@extends('templates.base')
@section('title', 'My Files')

@section('content')
<x-topbar />
<div class="container mt-2">
    <div class="row">
        <div class="col col-md-10 mx-auto">
            <div class="d-flex justify-content-between">
                <h1>My Files</h1>
                <a class="btn btn-primary rounded my-2" href="{{route('my-files.create')}}"><i class="bi bi-upload"></i>
                    <i class="bi bi-plus"></i></a>
            </div>
            <div class="d-flex justify-content-between fs-5">
                <p>Files: <span class="badge text-bg-primary">100</span></p>
                <p>Sizes: <span class="badge text-bg-success">1GB</span></p>
                <p>Downloaded: <span class="badge text-bg-info">10k+</span></p>
            </div>
            <table class="table table-striped">
                {{-- <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Size</th>
                        <th scope="col">Uploaded At</th>
                        <th scope="col">Downloaded</th>
                    </tr>
                </thead> --}}
                <tbody>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File Password<i
                                        class="bi bi-lock text-warning"></i></p>
                                <small>Size: 1MB Uploaded: 08 Feb 2024, Downloaded: 1000</small>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File Password 2<i
                                        class="bi bi-lock text-warning"></i></p>
                                <small>Size: 1MB Uploaded: 08 Feb 2024, Downloaded: 1000</small>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File </p>
                                <small>Size: 1MB Uploaded: 08 Feb 2024, Downloaded: 1000</small>
                            </a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection