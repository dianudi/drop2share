<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-body-secondary">&copy; {{date('Y')}} Dropshare</p>


        <ul class="nav col-md-6 justify-content-end">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Home</a></li>
            @if (auth()->check())
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">My Files</a></li>
            @endif
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Term Of Service</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Privacy Policy</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contact</a></li>

        </ul>
    </footer>
</div>