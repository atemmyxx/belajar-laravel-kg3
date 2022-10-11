<nav class="navbar navbar-expand-lg navbar-light fw-bolder shadow" style="background-color: #fff ;">
    <div class="container">
        <div>
            <img src="https://www.malasngoding.com/wp-content/uploads/2020/03/pavicon.png" width="50px">
            <a class="navbar-brand fs-3" href="/nav">Kampus<span style="color: red">Gratis</span></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page"
                        href="/home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'blog' ? 'active' : '' }}" href="/blog">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">CATEGORIES</a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="btn btn-primary rounded-pill fw-bold">LOGIN <i
                            class="bi bi-box-arrow-in-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

