@extends('templates.base')
@section('title', 'Admin Overview')
@section('content')
<x-topbar />
<div class="container">
    <x-admin-navbar />
    <div class="row mt-3">
        <div class="col-11 mx-auto border rounded px-2 py-2">
            <span>Disk Usage</span>
            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="{{$diskuse}}"
                aria-valuemin="0" style="height: 20px" aria-valuemax="100">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                    style="width: {{$diskuse}}%;">{{formatBytes($disktotal -
                    $diskfree)}} ({{$diskuse}}%) /{{formatBytes($disktotal)}}</div>
            </div>


        </div>
    </div>
    <div class="row">
        <div class="col my-2">
            <div class="row g-3">
                <div class="col-12 col-lg-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Files</h5>
                            <p class="card-text">{{formatNumberInKNotation($filetotal)}} Files</p>

                        </div>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">{{formatNumberInKNotation($usertotal)}} Users</p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Downloaded</h5>
                            <p class="card-text">{{formatNumberInKNotation($downloadtotal)}} Downloaded</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-1">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Latest File</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Recent Uploaded</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Uploaded At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestFiles as $file)
                            <tr>
                                <td>{{str($file->name)->limit(20)}}</td>
                                <td>{{$file->user->name}}</td>
                                <td>{{$file->created_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">New Users</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Recent registered users</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Registered At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestUsers as $user)
                            <tr>
                                <td>{{str($user->name)->limit(20)}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->created_at->format('d-M-Y')}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top Download</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Trending Download</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Downloaded</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topDownloaded as $file)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{str($file->name)->limit(20)}}</td>
                                <td>{{$file->user->name}}</td>
                                <td>{{formatNumberInKNotation($file->total_download)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<x-footer />
@endsection