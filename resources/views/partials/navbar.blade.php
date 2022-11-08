<nav class="navbar navbar-expand-lg navbar-light fw-bolder shadow" style="background-color: #fff ;">
    <div class="container">
        <div>
            <img src="https://www.malasngoding.com/wp-content/uploads/2020/03/pavicon.png" width="50px">
            <a class="navbar-brand fs-3" href="/nav">My<span style="color: red">Blog</span></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page"
                        href="/home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="/blog">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}"
                        href="/categories">CATEGORIES</a>
                </li>

                {{-- jika user sudah melakukan login/autentifikasi --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar"></i> My
                                    Dashboard </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item" href="/logout"><i
                                        class="bi bi-box-arrow-left"></i>
                                    Logout </a></button>
                            </form>
                        </ul>
                        {{-- jika user belum melakukan login --}}
                    @else
                    <li class="nav-item">
                        <a href="/login" class="btn btn-primary rounded-pill fw-bold">LOGIN <i
                                class="bi bi-box-arrow-in-right"></i></a>
                    </li>
                @endauth


            </ul>
        </div>
    </div>
</nav>
