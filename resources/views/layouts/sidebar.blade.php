<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName()==='home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            @if(auth()->user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link  {{ Route::currentRouteName()==='users.index' ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Users
                </a>
            </li>
            @endif
            @if(auth()->user()->isMember())
            <li class="nav-item {{ Route::currentRouteName()==='attendances.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('attendances.index') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Attendance
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>
