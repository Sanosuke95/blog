<header class="p-3 text-bg-primary">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="{{ route('contact.create') }}" class="nav-link px-2 text-white">Contact</a></li>
                <li><a href="{{ route('about') }}" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2">Login</button>
                <button type="button" class="btn btn-warning">Sign-up</button>
            </div>
        </div>
    </div>
    {{-- <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
        </button>
        <ul class="dropdown-menu mx-0 border-0 shadow w-220px" data-bs-theme="dark">
            <li><a class="dropdown-item" href="{{ route('posts.create') }}">New Post</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div> --}}
</header>
