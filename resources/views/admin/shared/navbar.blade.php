<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
    <div class="row justify-content-between">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">BoolPress</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap ms-2">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</header>
