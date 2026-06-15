<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page" href="/home">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('books') ? 'active' : '' }}" href="/books">
                    <span data-feather="file"></span>
                    Books
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('categories-client') ? 'active' : '' }}" href="/categories-client">
                    <span data-feather="shopping-cart"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('request-rent-list') ? 'active' : '' }}" href="/request-rent-list ">
                    <span data-feather="layers"></span>
                    Your request list
                </a>
            </li>
        </ul>

    </div>
</nav>
