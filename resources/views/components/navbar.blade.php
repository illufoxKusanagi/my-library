<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0077ff;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Weebs Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'home' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'about' ? 'active' : '' }}" href="/about">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Blog</a>
                </li>
            </ul>
            @auth
                <ul class="navbar-nav me-2 mb-2 mb-lg-0 d-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Wellcome back {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="logout">
                                    @csrf
                                    <button action="" type="submit" class="dropdown-item"><i
                                            class="bi bi-box-arrow-in-right"></i> Logout</button>
                                </form>
                            </li>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav me-2 mb-2 mb-lg-0 d-flex">
                    <form action="login">
                        @csrf
                        <button action="" type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i>
                            Login</button>
                    </form>
                </ul>
                </ul>
            @endauth
            {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">login</button>
            </form> --}}
        </div>
    </div>
</nav>
