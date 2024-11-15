<div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">
        <x-application-logo />
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200" icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200" icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">{{ __('MENU') }}</li>
    
            <li>
                <a href="{{ route('dashboard.index') }}" class="navItem {{ (request()->is('dashboard*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>{{ __('Home') }}</span>
                    </span>
                </a>
            </li>
            <li class="{{
                request()->routeIs('category.index') ||
                request()->routeIs('brand.index') ||
                request()->routeIs('unit.index') ||
                request()->routeIs('customer_group.index') ||
                request()->routeIs('coupon.index') ||
                request()->routeIs('customer.index') ? 'active' : ''
            }}">
                <a href="#" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:circle-stack"></iconify-icon>
                        <span>Data Master</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu first-letter:">
                    <li class="navItem {{ request()->routeIs('category.index') ? 'active' : '' }}">
                        <a href="{{ route('category.index') }}">Category</a>
                    </li>
                    <li class="navItem {{ request()->routeIs('coupon.index') ? 'active' : '' }}">
                        <a href="{{ route('coupon.index') }}">Coupon</a>
                    </li>
                    <li class="navItem {{ request()->routeIs('brand.index') ? 'active' : '' }}">
                        <a href="{{ route('brand.index') }}">Brand</a>
                    </li>
                    <li class="navItem {{ request()->is('unit*') ? 'active' : '' }}">
                        <a href="{{route('unit.index')}}">Unit</a>
                    </li>
                    <li class="navItem {{ request()->is('customer_group*') ? 'active' : '' }}">
                        <a href="{{route('customer_group.index')}}">Customer Group</a>
                    </li>
                    <li class="navItem {{ request()->is('customer*') ? 'active' : '' }}">
                        <a href="{{route('customer.index')}}">Customer</a>
                    </li>
                    <li class="navItem {{ request()->is('supplier*') ? 'active' : '' }}">
                        <a href="{{route('supplier.index')}}">Supplier</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="{{ route('purchaseorder.index') }}" class="navItem {{ (request()->is('purchaseorder*')) ? 'active' : '' }}">
                    <span class="flex items
                    -center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:shopping-bag"></iconify-icon>
                        <span>{{ __('Purchase Order') }}</span>
                    </span>
                </a>
                <ul class="sidebar-submenu first-letter:">
                    <li class="navItem {{ request()->is('purchaseorder*') ? 'active' : '' }}">
                        <a href="{{ route('purchaseorder.index') }}">Purchase Order</a>
                    </li>
                   
                </ul>
            </li>   
            <li>
                <a href="{{ route('salesorder.index') }}" class="navItem {{ (request()->is('salesorder*')) ? 'active' : '' }}">
                    <span class="flex items
                    -center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:shopping-cart"></iconify-icon>
                        <span>{{ __('Sales Order') }}</span>
                    </span>
                </a>
                <ul class="sidebar-submenu first-letter:">
                    <li class="navItem {{ request()->is('salesorder*') ? 'active' : '' }}">
                        <a href="{{ route('salesorder.index') }}">Kasir</a>
                    </li>
                   
                </ul>
            </li>   
            <li>
                <a href="{{ route('suratjalan.index') }}" class="navItem {{ (request()->is('suratjalan*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:forward"></iconify-icon>
                        <span>{{ __('Surat Jalan') }}</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('product.index') }}" class="navItem {{ (request()->is('product*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="iconoir:gift"></iconify-icon>
                        <span>{{ __('Product') }}</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('database-backups.index') }}" class="navItem {{ (request()->is('database-backups*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="iconoir:database-backup"></iconify-icon>
                        <span>{{ __('Database Backup') }}</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('general-settings.show') }}" class="navItem {{ (request()->is('general-settings*')) || (request()->is('users*')) || (request()->is('roles*')) || (request()->is('profiles*')) || (request()->is('permissions*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="material-symbols:settings-outline"></iconify-icon>
                        <span>{{ __('Settings') }}</span>
                    </span>
                </a>
            </li>
        </ul>
        <div class="bg-slate-900 mb-10 mt-24 p-4 relative text-center rounded-2xl text-white" id="sidebar_bottom_wizard">
            <img src="/images/svg/rabit.svg" alt="" class="mx-auto relative -mt-[73px]">
            <div class="max-w-[160px] mx-auto mt-6">
                <div class="widget-title font-Inter mb-1">Unlimited Access</div>
                <div class="text-xs font-light font-Inter">
                    Upgrade your system to business plan
                </div>
            </div>
            <div class="mt-6">
                <button class="bg-white hover:bg-opacity-80 text-slate-900 text-sm font-Inter rounded-md w-full block py-2 font-medium">
                    Upgrade
                </button>
            </div>
        </div>
    </div>
</div>