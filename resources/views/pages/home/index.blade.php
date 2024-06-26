@extends('templates.base')
@section('title', 'Drop and share your files easily.')
@section('metaDescription', 'Drop and share your files easily. Drop2share is an unlimited file-sharing service.
Dropshare
allows you to share your files around the world. No annoying Pop up, no malware inside.')
@section('content')
<x-topbar />
{{-- Hero start --}}
<div class="container-fluid px-4 text-center" style=" padding: 100px">
    <x-logo />
    <h1 class="display-5 fw-bold text-body-emphasis">Drop2share</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Drop and share your files easily. Drop2share is an unlimited file-sharing service.
            Dropshare
            allows you to share your files around the world. No annoying Pop up, no malware inside.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center align-items-center">
            <a href="{{route('my-files.create')}}" class="btn btn-primary px-4 gap-3">Upload File</a>
            <span class="mx-2">OR</span>
            @if (auth()->check())
            <a href="{{route('my-files.index')}}" class="btn btn-success px-4 gap-3">Manage Files</a>
            @else
            <a href="{{route('registration.register')}}" class="btn btn-info px-4">Sign Up</a>

            @endif
        </div>
    </div>
</div>
{{-- Hero end --}}
{{-- Features start --}}
<div>
    <div class="container px-4 mb-3" id="features">
        <h2 class="pb-2 border-bottom">Features</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
            <div class="col d-flex align-items-start glassmorphs py-2 px-2">
                <i class="bi bi-hdd-stack text-body-secondary flex-shrink-0 me-3 fs-3"></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Unlimited Storage</h3>
                    <p>Don't worry about storage limitations, this service has unlimited storage.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start glassmorphs py-2 px-2">
                <i class="bi bi-key text-body-secondary flex-shrink-0 me-3 fs-3"></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Protected File Share</h3>
                    <p>Protect your file using a password for file downloads.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start glassmorphs py-2 px-2">
                <i class="bi bi-clock text-body-secondary flex-shrink-0 me-3 fs-3"></i>

                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Time-Based File Auto-Deletion</h3>
                    <p>We have a feature to allow deleting files automatically if time is expired.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start glassmorphs py-2 px-2">
                <i class="bi bi-card-checklist text-body-secondary flex-shrink-0 me-3 fs-3"></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">Easy File Management</h3>
                    <p>Easy to use, like upload, re-download, and delete files.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start glassmorphs py-2 px-2">
                <i class="bi bi-window text-body-secondary flex-shrink-0 me-3 fs-3"></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">No Pop Up Ads</h3>
                    <p>No pop-up ad feature has been added.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start glassmorphs py-2 px-2">
                <i class="bi bi-bug text-body-secondary flex-shrink-0 me-3 fs-3"></i>
                <div>
                    <h3 class="fw-bold mb-0 fs-4 text-body-emphasis">No Malware</h3>
                    <p>No malware embedded.</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Features end --}}
    <div class="container py-2 my-2">
        <div class="row">
            <div class="col col-lg-6 mx-auto">
                <h2 class="text-center">Search File</h2>
                <form action="{{route('search')}}" method="get">
                    <div class="form-floating mb-3">
                        <input name="q" type="text" required class="form-control" id="floatingInput"
                            placeholder="Search...">
                        <label for="floatingInput">Search</label>
                    </div>
                    <button class="btn btn-primary rounded w-50 mx-auto d-block" type="submit">Search</button>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- Files Section start --}}
<div class="container">
    <div class="row d-flex">
        <div class="col-lg-6 ">
            <div class="d-flex justify-content-between align-items-center mb-1 border-bottom">
                <h2>Latest Upload</h2>
                <a href="{{route('latest')}}" class="text-decoration-none fs-5">More Files</a>
            </div>
            <table class="table table-striped">
                <tbody>
                    @foreach ($latestFiles as $file)
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white fw-normal"
                                href="{{route('showDetailFile', ['file' => $file->slug])}}">
                                <p class="m-0 text-break fs-5"><i class="bi bi-file-earmark"></i>
                                    {{str($file->name)->limit(60)}}
                                </p>
                                <small>Size: {{formatBytes($file->size)}} Uploaded:
                                    {{$file->created_at->format('d-m-Y')}},
                                    Downloaded: {{formatNumberInKNotation($file->total_download)}}</small>
                            </a>
                        </th>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-between align-items-center mb-1 border-bottom">
                <h2>Popular Files</h2>
                <a href="{{route('popular')}}" class="text-decoration-none fs-5">More Files</a>
            </div>
            <table class="table table-striped">
                <tbody>
                    @foreach ($popularFiles as $file)
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white fw-normal"
                                href="{{route('showDetailFile', ['file' => $file->slug])}}">
                                <p class="m-0 text-break fs-5"><i class="bi bi-file-earmark"></i>
                                    {{str($file->name)->limit(60)}}
                                </p>
                                <small>Size: {{formatBytes($file->size)}} Uploaded:
                                    {{$file->created_at->format('d-m-Y')}},
                                    Downloaded: {{formatNumberInKNotation($file->total_download)}}</small>
                            </a>
                        </th>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>
{{-- Files Section end --}}
<x-footer />
@endsection