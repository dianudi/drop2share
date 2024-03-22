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
                    @if ($user->role !== 'admin')

                    <form action="{{route('admin.accounts.deactive')}}" method="post" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button type="submit" class="btn btn-sm bg-primary"><i
                                class="bi bi-{{$user->active ? 'person-slash' : 'person'}}"></i></button>
                    </form>
                    <form action="{{route('admin.accounts.delete')}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button type="submit" class="btn btn-sm bg-danger"><i class="bi bi-trash"></i></button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<x-footer />
@endsection