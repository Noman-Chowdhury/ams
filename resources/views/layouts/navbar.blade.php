<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Attendance Mangement System</a>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a class="btn btn-primary">Sign out</a>
            </form>
        </div>
    </div>
</header>
