@extends('templates.base')

@section('title', 'Signin')
@section('content')
<div class="container-fluid">
    <div class="row vh-100">
        <div class="col  d-flex flex-column justify-content-center align-items-center">
            <div class="text-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="currentColor"
                    class="bi bi-cloud-download-fill text-info" viewBox="0 0 16 16">
                    <path
                        d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708" />
                </svg>
                <h3 class="fs-3">Drop2share</h3>
            </div>
            <div class="rounded py-4 px-3 glass" style="min-width: 360px;">
                <h1 class="text-center mb-4">Signin</h1>
                <a class="text-decoration-none d-block border p-2 text-white mb-1"
                    href="{{route('auth.socialite', ['driver' => 'google'])}}"><i class="bi bi-google p-2"></i>
                    Continue with Google</a>
                <a class="text-decoration-none d-block border p-2 text-white"
                    href="{{route('auth.socialite', ['driver' => 'facebook'])}}"><i
                        class="bi bi-facebook text-info p-2"></i>
                    Continue with Facebook</a>
                <span class="my-2 d-block text-center fs-6">OR</span>
                <form class="mb-3" action="{{route('auth.signin')}}" method="POST" autocomplete="on">
                    @csrf
                    @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                    @endif
                    @error('email')
                    <div class="alert alert-danger text-center mx-auto" style="max-width: 300px">{{ $message }}
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                            value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="form-label">Password</label>
                            <a href="{{route('password.request')}}" class="text-decoration-none">Forgot Password?</a>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                    class="bi bi-eye text-white show-hide-eye p-1"></i></button>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill w-100">Signin</button>
                </form>
                <a class="fs-6 text-decoration-none text-center d-block" href="{{route('registration.register')}}">No
                    account? Sign
                    up</a>
            </div>
        </div>
    </div>
</div>
@endsection