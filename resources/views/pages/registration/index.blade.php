@extends('templates.base')

@section('title', 'Signup')
@section('content')
<div class="container-fluid">
    <div class="row vh-100">
        <div class="col d-flex flex-column justify-content-center align-items-center">
            <div class="text-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="currentColor"
                    class="bi bi-cloud-download-fill text-info" viewBox="0 0 16 16">
                    <path
                        d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708" />
                </svg>
                <h3 class="fs-2">Dropshare</h3>
            </div>
            <div class="border rounded p-4" style="min-width: 360px;">
                <h1 class="text-center mb-4">Signup</h1>
                <a class="text-decoration-none d-block border p-2 text-white mb-1" href="#"><i
                        class="bi bi-google p-2"></i>
                    Continue with Google</a>
                <a class="text-decoration-none d-block border p-2 text-white" href="#"><i
                        class="bi bi-facebook text-info fs-5 p-2"></i>
                    Continue with Facebook</a>
                <span class="my-2 d-block text-center fs-6">OR</span>
                <h2 class="text-center fs-3">Create Account</h2>
                <form class="mb-3" action="{{route('registration.register')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" aria-describedby="name" value="{{old('name')}}">
                        @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" aria-describedby="username" value="{{old('username')}}">
                        @error('username')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" aria-describedby="emailHelp" value="{{old('email')}}">
                        @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmation Password</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation">
                        @error('password_confirmation')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill w-100">Submit</button>
                </form>
                <span>By creating an account I agree to <a href="/p/tos">Term of Use</a>, <a
                        href="/p/privacy-policy">Privacy Policy</a>, <a href="/p/data-term"> Data
                        Processing Terms.</a></span>
                <a class="fs-6 text-decoration-none text-center d-block" href="{{route('auth.signin')}}">Already have an
                    account? Sign
                    in</a>
            </div>
        </div>
    </div>
</div>
@endsection