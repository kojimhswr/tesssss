<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fas fa-tachometer-alt"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.packages.index' ? 'active' : '' }}" href="{{ route('admin.packages.index') }}">
                <i class="app-menu__icon fas fa-suitcase-rolling"></i>
                <span class="app-menu__label">Packages</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.ships.index' ? 'active' : '' }}" href="{{ route('admin.ships.index') }}">
                <i class="app-menu__icon fas fa-ship"></i>
                <span class="app-menu__label">Ships</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.regions.index' ? 'active' : '' }}" href="{{ route('admin.regions.index') }}">
                <i class="app-menu__icon fas fa-globe-europe"></i>
                <span class="app-menu__label">Regions</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}" href="{{ route('admin.attributes.index') }}">
                <i class="app-menu__icon fas fa-concierge-bell"></i>
                <span class="app-menu__label">Package Options</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>
