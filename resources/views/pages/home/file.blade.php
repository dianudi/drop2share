@extends('templates.base')
@section('title', 'Download ' . $file->name)
@section('content')
<x-topbar />
<div class="container">
    <div class="row my-5">
        <div class="col col-lg-6 mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="currentColor"
                class="bi bi-file-earmark-text mx-auto d-block mb-4" viewBox="0 0 16 16">
                <path
                    d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                <path
                    d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
            </svg>
            <table class="table table-striped">
                <tbody>

                    <tr>
                        <td scope="col">Name:</td>
                        <td scope="col">{{$file->name}}</td>
                    </tr>
                    <tr>
                        <td scope="col">Size:</td>
                        <td scope="col">{{formatBytes($file->size)}}</td>
                    </tr>
                    <tr>
                        <td scope="col">Uploaded at:</td>
                        <td scope="col">{{$file->created_at->diffForHumans()}}</td>
                    </tr>
                    <tr>
                        <td scope="col">User:</td>
                        <td scope="col"><a class="text-decoration-none"
                                href="{{route('detailUserFiles', ['user' => $file->user->name])}}">{{$file->user->name}}</a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Downloaded:</td>
                        <td scope="col">{{$file->total_download}}</td>
                    </tr>

                </tbody>
            </table>
            @if (session()->has('errorUnlockFile'))
            <div class="alert alert-danger" role="alert">
                {{session('errorUnlockFile')}}
            </div>
            @endif


            @if ($file->password && !session()->has('fileId'))
            <button class="btn btn-primary rounded-pill mx-auto w-100 py-2 px-4" data-bs-toggle="modal"
                data-bs-target="#unlockFileModal">Unlock</button>
            @else
            <a class="text-decoration-none btn btn-primary rounded-pill mx-auto py-2 px-4 d-block"
                href="{{route('downloadFile', ['file' => $file->slug])}}">Download</a>
            @endif
            <div class="my-3">
                <h3>Share on</h3>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{request()->fullUrl()}}"><i
                        class="bi bi-facebook" style="font-size: 35px"></i></a>
                <a href="whatsapp://send/?text={{request()->fullUrl()}}"><i class="bi bi-whatsapp mx-2 text-success"
                        style="font-size: 35px"></i></a>
                <a
                    href="https://t.me/share/url/?url={{request()->fullUrl()}}&text=Download%20{{$file->name}}%20{{config('app.name')}}"><i
                        class="bi bi-telegram" style="font-size: 35px"></i></a>
                <div class="my-1">
                    <input type="text" class="form-control form-control-sm rounded" value="{{request()->fullUrl()}}">
                </div>

            </div>
        </div>
    </div>
</div>
<x-unlock-file-modal slug="{{$file->slug}}" />
<x-footer />
@endsection