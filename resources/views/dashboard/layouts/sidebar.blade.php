<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('books-admin') ? 'active' : '' }}" href="books-admin">
                    <span data-feather="book"></span>
                    Books
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('book-list') ? 'active' : '' }}" href="book-list">
                    <span data-feather="book"></span>
                    Book list
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="categories">
                    <span data-feather="shopping-cart"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="users">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('requests') ? 'active' : '' }}" href="requests">
                    <span data-feather="check-square"></span>
                    Request List
                </a>
            </li>
        </ul>

    </div>
</nav>
