@extends('templates.base')
@section('title', 'Site Page Manager')
@section('content')
<x-topbar />
<div class="container">
    <x-admin-navbar />
    <div class="my-3 d-flex justify-content-between">
        <h3>List Site Pages</h3>
        <a href="{{route('pages.create')}}" class="text-decoration-none btn btn-outline-primary"><i
                class="bi bi-file-plus">
                New</i></a>
    </div>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><a href="" class="text-decoration-none">Mark</a></td>
                <td>ss-ss</td>
                <td>{{Carbon\Carbon::now()->format('d-m-Y')}}</td>
                <td class="d-flex">
                    <a href="" class="me-2 btn btn-success"><i class="bi bi-pencil"></i></a>
                    <form action="" method="post">
                        <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>
</div>
<x-footer />
@endsection