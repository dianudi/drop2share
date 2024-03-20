@extends('templates.base')
@section('title', 'Admin File Manager')
@section('content')
<x-topbar />
<div class="container">
    <x-admin-navbar />
    <table class="table table-sm table-responsive table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Total Files</th>
                <th scope="col">Total Download</th>
                <th scope="col">Storage Usage</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ ($users ->currentpage()-1) * $users ->perpage() + $loop->index + 1 }}
                </th>
                <td>{{$user->name}}</td>
                <td>{{$user->files()->count()}}</td>
                <td>{{$user->files()->sum('total_download')}}</td>
                <td>{{formatBytes($user->files()->sum('size'))}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection