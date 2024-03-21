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
        <div class="col p-3">
            <div class="row">
                <div class="col-12 col-lg-4 card">
                    <div class="card-body">
                        <h5 class="card-title">Total Files</h5>
                        <p class="card-text">16k Files</p>

                    </div>
                </div>
                <div class="col-12 col-lg-4 card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">5K Users</p>
                    </div>
                </div>
                <div class="col-12 col-lg-4 card">
                    <div class="card-body">
                        <h5 class="card-title">Total File Downloaded</h5>
                        <p class="card-text">5M Downloaded</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer />
@endsection