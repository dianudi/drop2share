@extends('templates.base')
@section('title', 'My Account')
@section('content')
<x-topbar />
<div class="container mt-2">
    @if(session()->has('failed') || session()->has('status'))
    <div class="alert alert-{{session()->has('failed') ? 'danger' : 'success'}} text-center" role="alert">
        {{session('failed') ? session('failed') : session('status')}}
    </div>
    @endif
    <div class="row">
        <div class="col-xs-12 col-lg-6 mb-1">
            <div class="fs-3">Information</div>
            <ul class="list-group">
                <li class="list-group-item">Account Name: {{$user->name}}</li>
                <li class="list-group-item">Username: {{$user->username}}</li>
                <li class="list-group-item">Email: {{$user->email}}</li>
                <li class="list-group-item">Total Files: {{$user->files->count()}}</li>
                <li class="list-group-item">Joined : {{$user->created_at->format('d M Y')}}</li>
            </ul>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Account</h5>

                    @if (session()->has('updateAccount'))
                    <div class="alert alert-success" role="alert">
                        {{session('updateAccount')}}
                    </div>
                    @endif

                    <p class="card-text">Edit your basic account information.</p>
                    <form method="POST" action="{{route('account.update')}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Name" value="{{old('name') ? old('name') : $user->name}}">
                            @error('name')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control @error('name') is-invalid @enderror"
                                id="username" placeholder="Username"
                                value="{{old('name') ? old('name') : $user->username}}">
                            @error('username')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="username">Username</label>
                        </div>
                        <button class="btn btn-outline-primary">Change Account Detail</button>
                    </form>
                </div>
            </div>


        </div>
        <div class="col-xs-12 col-lg-6">
            <div class="fs-3">Credential</div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Email</h5>
                    <p class="card-text">Renew your account email.</p>
                    @if (session()->has('updateEmail'))
                    <div class="alert alert-success" role="alert">
                        {{session('updateEmail')}}
                    </div>
                    @endif
                    <form action="{{route('account.email')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{old('email')}}" id="floatingInput" placeholder="name@example.com">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <label for="floatingInput">New Email address</label>
                        </div>
                        <div class="form-floating clearfix">
                            <input type="password" name="confirm_password"
                                class="form-control @error('confirm_password') is-invalid @enderror"
                                id="currentPassword" placeholder="Password">
                            @error('confirm_password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <label for="currentPassword">Current Password</label>
                            <div class="float-end">
                                <a href="{{route('account.recovery')}}" class="text-decoration-none fs-6">Forgot
                                    Password?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Change Email</button>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Password</h5>
                    @if (session()->has('updatePassword'))
                    <div class="alert alert-success" role="alert">
                        {{session('updatePassword')}}
                    </div>
                    @endif
                    <p class="card-text">Change your account password.</p>
                    <form method="POST" action="{{route('account.password')}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-floating clearfix">
                            <input type="password" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                id="currentPassword" placeholder="***">
                            <label for="currentPassword">Current Password</label>
                            @error('current_password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="float-end">
                                <a href="{{route('account.recovery')}}" class="text-decoration-none fs-6">Forgot
                                    Password?</a>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="newPassword"
                                placeholder="Password">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <label for="newPassword">New Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password') is-invalid @enderror" id="confirmNewPassword"
                                placeholder="Password">
                            <label for="confirmNewPassword">Confirm New Password</label>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Change Password</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Delete Account</h5>
                    <p class="card-text">This will Delete your account and all uploaded files.</p>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#confirmDeletion">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<x-confirm-deletion-modal />
<x-footer />
@endsection