<header class="custom-navbar navbar navbar-dark sticky-top flex-md-nowrap p-2 shadow">
    <div class="row justify-content-between font-secondary">
        @foreach ($restaurants_passare as $restaurant)
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('admin.dashboard') }}"><span
                    class="d-none d-lg-inline">Benvenuto</span>
                    <span>{{ $restaurant->user->name }}</span>
            </a>
        @endforeach
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-nav">

        <div class="nav-item text-nowrap ms-2">
            <a class="nav-link pe-2 text-white" href="{{ route('logout') }}"
                onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                {{ __('Esci') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</header>
