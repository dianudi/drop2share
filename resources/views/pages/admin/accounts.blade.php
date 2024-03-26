@extends('templates.base')
@section('title', 'Admin Account Manager')
@section('content')
<x-topbar />
<div class="container">
    <x-admin-navbar />
    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Registered At</th>
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
                        <div class="">
                            <div>{{$user->name}} </div>
                            <div>
                                @if($user->role === 'admin')<small
                                    class="badge bg-primary d-inline me-1">admin</small>@endif<small
                                    class="d-inline badge bg-{{$user->active ? 'info' : 'danger'}}">{{$user->active ?
                                    'Active' :
                                    'Banned'}}</small>
                            </div>
                        </div>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('d-m-Y')}}</td>
                    <td>{{$user->files()->count()}}</td>
                    <td>{{formatBytes($user->files()->sum('size'))}}</td>
                    <td>
                        <div class="d-flex">
                            @if ($user->role !== 'admin')
                            <form action="{{route('admin.accounts.deactive')}}" method="post" class="d-inline me-1">
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
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<x-footer />
@endsection