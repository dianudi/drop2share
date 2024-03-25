<div class="container mt-auto">
        <footer class="d-flex flex-wrap justify-content-betwee align-items-center py-3 my-4 border-top">
                <p class="mb-0 text-body-secondary me-auto">&copy; {{date('Y')}} Drop2share</p>
                <ul class="nav">
                        <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Home</a></li>
                        @if (auth()->check())
                        <li class="nav-item"><a href="{{route('my-files.index')}}"
                                        class="nav-link px-2 text-body-secondary">My
                                        Files</a></li>
                        @endif
                        <li class="nav-item"><a href="{{route('page.show', ['page' => 'about'])}}"
                                        class="nav-link px-2 text-body-secondary">About</a></li>
                        <li class="nav-item"><a href="{{route('page.show', ['page' => 'contact'])}}"
                                        class="nav-link px-2 text-body-secondary">Contact</a></li>
                        <li class="nav-item"><a href="{{route('page.show', ['page' => 'privacy'])}}"
                                        class="nav-link px-2 text-body-secondary">Privacy</a></li>
                        <li class="nav-item"><a href="{{route('page.show', ['page' => 'term-of-use'])}}"
                                        class="nav-link px-2 text-body-secondary">Term of Use</a></li>
                </ul>
        </footer>
</div>