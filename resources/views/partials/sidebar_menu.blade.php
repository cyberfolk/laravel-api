<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-dark' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-gauge"></i>
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg-dark' : '' }}" href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-thumbtack"></i>
                    {{ __('Projects') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-dark' : '' }}" href="{{ route('admin.types.index') }}">
                    <i class="fa-solid fa-bookmark"></i>
                    Type
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <i class="fa-solid fa-tags"></i>
                    Tags
                </a>
            </li>

        </ul>
    </div>
</nav>
