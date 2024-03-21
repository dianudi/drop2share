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
                <th scope="col">Storage Usage</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ ($users ->currentpage()-1) * $users ->perpage() + $loop->index + 1 }}
                </th>
                <td>
                    <div class="d-flex justify-content-between">
                        <div>{{$user->name}} </div>
                        <div>
                            @if($user->role === 'admin')<small class="badge bg-primary me-1">admin</small>@endif<small
                                class="badge bg-{{$user->active ? 'info' : 'danger'}}">{{$user->active ? 'Active' :
                                'Banned'}}</small>
                        </div>
                    </div>
                </td>
                <td>{{$user->files()->count()}}</td>
                <td>{{formatBytes($user->files()->sum('size'))}}</td>
                <td>
                    <a class="btn btn-sm bg-primary"><i class="bi bi-pencil"></i></a>
                    <button class="btn btn-sm bg-secondary"><i
                            class="bi bi-{{$user->active ? 'person-slash' : 'person-check'}}"></i></button>
                    <button class="btn btn-sm bg-danger"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<x-footer />
@endsection