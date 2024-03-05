                <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
                <nav id="sidebarMenu" class="custom-sidebar col-md-3 col-lg-2 d-md-block navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-selected' : '' }}" href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-table-columns me-1"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dishes.create' ? 'bg-selected' : '' }}" href="{{ route('admin.dishes.create') }}">
                                    <i class="fa-solid fa-utensils me-1"></i> Crea piatto
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
