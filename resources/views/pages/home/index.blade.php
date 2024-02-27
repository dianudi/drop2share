@extends('templates.base')
@section('title', 'Drop and share your files easily.')

@section('content')
<x-topbar />
{{-- Hero start --}}
<div class="px-4  text-center" style="background-image: linear-gradient(120deg, darkviolet, salmon); padding: 100px">
    <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="currentColor"
        class="bi bi-cloud-download-fill text-info" viewBox="0 0 16 16">
        <path
            d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708" />
    </svg>
    <h1 class="display-5 fw-bold text-body-emphasis">Dropshare</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Drop and share your files easily. Dropshare is an unlimited file-sharing service. Dropshare
            allows you to share your files around the world. No annoying Pop up, no malware inside.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center align-items-center">
            <a href="#features" class="btn btn-primary px-4 gap-3">Get Started</a>
            <span class="mx-2">OR</span>
            @if (auth()->check())
            <a href="{{route('my-files.index')}}" class="btn btn-success px-4 gap-3"> Go To My Files</a>
            @else
            <a href="{{route('registration.register')}}" class="btn btn-info px-4">Sign Up</a>

            @endif
        </div>
    </div>
</div>
{{-- Hero end --}}
{{-- Features start --}}
<div class="container px-4 py-5" id="features">
    <h2 class="pb-2 border-bottom">Features</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
        <div class="col d-flex align-items-start">
            <i class="bi bi-hdd-stack text-body-secondary flex-shrink-0 me-3 fs-3"></i>
            <div>
                <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Unlimited Storage</h3>
                <p>Don't worry about storage limitations, this service has unlimited storage.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-key text-body-secondary flex-shrink-0 me-3 fs-3"></i>
            <div>
                <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Protected File Share</h3>
                <p>Protect your file using a password for file downloads.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-clock text-body-secondary flex-shrink-0 me-3 fs-3"></i>

            <div>
                <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Time-Based File Auto-Deletion</h3>
                <p>We have a feature to allow deleting files automatically if time is expired.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-card-checklist text-body-secondary flex-shrink-0 me-3 fs-3"></i>
            <div>
                <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Easy File Management</h3>
                <p>Easy to use, like upload, re-download, and delete files.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-window text-body-secondary flex-shrink-0 me-3 fs-3"></i>
            <div>
                <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">No Pop Up Ads</h3>
                <p>NNo pop-up ad feature has been added.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-bug text-body-secondary flex-shrink-0 me-3 fs-3"></i>
            <div>
                <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">No Malware</h3>
                <p>No malware embbedded.</p>
            </div>
        </div>
    </div>
</div>
{{-- Features end --}}
{{-- Files Section start --}}
<div class="container">
    <div class="row d-flex">
        <div class="col-lg-6 ">
            <div class="d-flex justify-content-between align-items-center mb-1 border-bottom">
                <h2>Latest Upload</h2>
                <a href="{{route('latest')}}" class="text-decoration-none fs-5">More</a>
            </div>
            <table class="table table-striped">
                <tbody>
                    {{-- @foreach ($files as $file) --}}
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="#">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File
                                </p>
                                <small>Size: 1MB Uploaded:
                                    20-02-2024,
                                    Downloaded:
                                    1k+</small>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="#">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File
                                </p>
                                <small>Size: 1MB Uploaded:
                                    20-02-2024,
                                    Downloaded:
                                    1k+</small>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="#">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File
                                </p>
                                <small>Size: 1MB Uploaded:
                                    20-02-2024,
                                    Downloaded:
                                    1k+</small>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="#">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File
                                </p>
                                <small>Size: 1MB Uploaded:
                                    20-02-2024,
                                    Downloaded:
                                    1k+</small>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="#">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File
                                </p>
                                <small>Size: 1MB Uploaded:
                                    20-02-2024,
                                    Downloaded:
                                    1k+</small>
                            </a>
                        </th>
                    </tr>
                    {{-- @endforeach --}}

                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-between align-items-center mb-1 border-bottom">
                <h2>Popular Files</h2>
                <a href="{{route('popular')}}" class="text-decoration-none fs-5">More</a>
            </div>
            <table class="table table-striped">
                <tbody>
                    {{-- @foreach ($files as $file) --}}
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="#">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File
                                </p>
                                <small>Size: 1MB Uploaded:
                                    20-02-2024,
                                    Downloaded:
                                    1k+</small>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="#">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File
                                </p>
                                <small>Size: 1MB Uploaded:
                                    20-02-2024,
                                    Downloaded:
                                    1k+</small>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="#">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File
                                </p>
                                <small>Size: 1MB Uploaded:
                                    20-02-2024,
                                    Downloaded:
                                    1k+</small>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="#">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File
                                </p>
                                <small>Size: 1MB Uploaded:
                                    20-02-2024,
                                    Downloaded:
                                    1k+</small>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white" href="#">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> Test File
                                </p>
                                <small>Size: 1MB Uploaded:
                                    20-02-2024,
                                    Downloaded:
                                    1k+</small>
                            </a>
                        </th>
                    </tr>
                    {{-- @endforeach --}}

                </tbody>
            </table>
        </div>

    </div>
</div>
{{-- Files Section end --}}
{{-- Counter start --}}

{{-- Counter end --}}
<x-footer />
@endsection