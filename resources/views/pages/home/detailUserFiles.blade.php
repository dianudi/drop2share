@extends('templates.base')
@section('title', $user->name . '\'s files')

@section('content')
<x-topbar />
<div class="container mt-2">
    <div class="row">
        <div class="col col-md-10 mx-auto">
            <div class="d-flex justify-content-center">
                <div class="card" style="min-width: 360px">
                    <div class="card-header">
                        User Profile
                    </div>
                    <div class="card-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="currentColor"
                            class="bi bi-person-fill mx-auto d-block my-3" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td scope="col">Name:</td>
                                    <td scope="col">{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Total Uploaded Files:</td>
                                    <td scope="col">{{$user->files->count()}}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Total Downloaded Files:</td>
                                    <td scope="col">{{$user->files->sum('total_download')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-body-secondary">
                        Joined : {{$user->created_at->format('d M Y')}}
                    </div>
                </div>
            </div>
            <h2 class="my-2">Files</h2>
            @if (!$user->files->isEmpty())
            <table class="table table-striped">
                <tbody>
                    @foreach ($user->files as $file)
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white"
                                href="{{route('showDetailFile', ['file' => $file->slug])}}">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> {{$file->name}} @if($file->password)
                                    <i class="bi bi-lock text-warning"></i> @else @endif
                                </p>
                                <small>
                                    {{formatBytes($file->size)}} /
                                    {{$file->created_at->format('d M Y')}} /
                                    <i class="bi bi-download"></i>
                                    {{formatNumberInKNotation($file->total_download)}}</small>
                            </a>
                        </th>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @else
            <div>
                <p class="text-center fs-3">Currently, the files are not available.</p>
            </div>
            @endif

        </div>
    </div>
</div>
<x-footer />
@endsection