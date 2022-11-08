<header class="navbar navbar-light sticky-top bg-light flex-lg-nowrap p-0 shadow ">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">My<span style="color: red">Blog</span></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="navbar-nav ms-auto m-3">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link bg-danger fw-bold border-0 px-2" href="/logout"> logout
                    <span data-feather="log-out" class="align-text-bottom"></span></button>
            </form>
        </div>
    </div>
</header>
