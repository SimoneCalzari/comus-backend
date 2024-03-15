                <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
                <nav id="sidebarMenu" class="custom-sidebar col-md-3 col-lg-2 d-md-block navbar-dark sidebar collapse font-secondary">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-selected' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-user-tie me-1"></i> Area amministrazione
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dishes.index' ? 'bg-selected' : '' }}"
                                    href="{{ route('admin.dishes.index') }}">
                                    <i class="fa-solid fa-utensils me-1"></i> Lista Piatti
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.orders.index' ? 'bg-selected' : '' }}"
                                    href="{{ route('admin.orders.index') }}">
                                    <i class="fa-solid fa-list me-1"></i> Lista ordini
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="http://127.0.0.1:8000/">
                                    <i class="fa-solid fa-backward me-2"></i>Area Benvenuto
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
