<nav class="navbar navbar-expand-lg border-bottom">
    <div class="container">
        <a class="navbar-brand" href="/"><i class="bi bi-cloud"></i> Drop2share</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{request()->path() == '/' ? 'active border-bottom border-white' : ''}}"
                        aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->path() == 'popular-files' ? 'active border-bottom border-white' : ''}}"
                        href="{{route('popular')}}">Popular
                        Files</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->path() == 'latest-upload' ? 'active border-bottom border-white' : ''}}"
                        href="{{route('latest')}}">Latest
                        Upload</a>
                </li>
                @if (auth()->check())
                <li class="nav-item">
                    <a class="nav-link {{request()->path() == 'my-files' ? 'active border-bottom border-white' : ''}}"
                        href="{{route('my-files.index')}}">My Files</a>
                </li>
                @endif
            </ul>
            {{-- <div class="input-group me-5" style="max-width: 500px">
                <input type="text" class="form-control border-white" style="background-color: rgba(255, 255, 255, 0.1)"
                    placeholder="Search Files" aria-label="Search Files" aria-describedby="button-addon2">
                <button class="btn btn-outline-white" type="button" id="button-addon2"><i
                        class="bi bi-search"></i></button>
            </div> --}}


            <ul class="navbar-nav mb-2 mb-lg-0 ">
                <li class="nav-item dropdown">
                    @if (auth()->check())
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{route('account')}}" class="dropdown-item">Account</a>
                        </li>
                        @if (auth()->user()->role === 'admin')
                        <li>
                            <a href="{{route('admin.index')}}" class="dropdown-item">Site Administration</a>
                        </li>
                        @endif
                        <li>
                            <form action="{{route('auth.signout')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item">Sign
                                    Out</button>

                            </form>
                        </li>


                    </ul>
                    @else
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        Sign In/Up
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('auth.signin')}}"><i
                                    class="bi bi-box-arrow-in-left"></i> Sign In</a></li>
                        <li><a class="dropdown-item" href="{{route('registration.showPage')}}"><i
                                    class="bi bi-person-plus"></i>
                                Sign
                                Up</a></li>
                    </ul>
                    @endif

                </li>

            </ul>
        </div>


    </div>
</nav>