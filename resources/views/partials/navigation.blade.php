<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_brand">
        <a href="" class="brand-logo">
            <img alt="Logo" class="w-65px" src="{{ asset('assets/images/st_trese.png') }}" />
        </a>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                <li class="menu-item {{ !request()->routeIs('home') ?: 'menu-item-active' }}" aria-haspopup="true">
                    <a href="{{ route('home') }}}" class="menu-link">
                        <i class="menu-icon flaticon2-cube"></i>
                        <span class="menu-text">Home</span>
                    </a>
                </li>
                <li class="menu-item {{ !request()->routeIs('household.*') ?: 'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('household.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-shelter"></i>
                        <span class="menu-text">Household</span>
                    </a>
                </li>
                <li class="menu-item {{ !request()->routeIs('resident.*') ?: 'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('resident.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-calendar-3"></i>
                        <span class="menu-text">Resident</span>
                    </a>
                </li>
                <li class="menu-item {{ !request()->routeIs('reports.*') ?: 'menu-item-active' }}" aria-haspopup="true">
                    <a href="#" class="menu-link">
                        <i class="menu-icon flaticon2-document"></i>
                        <span class="menu-text">Reports</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
