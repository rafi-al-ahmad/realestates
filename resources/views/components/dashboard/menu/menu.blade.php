<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{url('/')}}" class="app-brand-link">
            <span class="app-brand-logo demo">

                <svg id="Layer_1" style="width: 48; height:33;" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #133f69;
                            }

                            .cls-2 {
                                fill: #dfb675;
                            }
                        </style>
                    </defs>
                    <path class="cls-1" d="M5,3.73V28.88H23.67V3.73S5,3.64,5,3.73Z" />
                    <path class="cls-2" d="M9.46,7.72v5.52h3V11.33H20A1.6,1.6,0,0,1,21.66,13a1.3,1.3,0,0,1-1.5,1.43H9.46V18H20.71s1.77.27,1.77,1.77-1.7,1.64-1.7,1.64H12.46V19.37h-3V25H23.09A4.45,4.45,0,0,0,28,20.26s.14-4.16-3.41-4.16a3.59,3.59,0,0,0,2.59-3.81A4.33,4.33,0,0,0,23.5,7.72Z" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">{{env('APP_NAME')}}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>


    <ul class="menu-inner py-1">
        @foreach ($menuData as $menu)

        {{-- adding active and open class if child is active --}}

        {{-- menu headers --}}
        @if (isset($menu['menuHeader']))
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{ $menu['menuHeader'] }}</span>
        </li>

        @else

        {{-- active menu method --}}
        @php
        $activeClass = null;
        $currentRouteName = Route::currentRouteName();

        if ($currentRouteName === $menu['slug']) {
        $activeClass = 'active';
        } elseif (isset($menu['submenu'])) {
        if (gettype($menu['slug']) === 'array') {
        foreach ($menu['slug'] as $slug) {
        if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
        $activeClass = 'active open';
        }
        }
        } else {
        if (str_contains($currentRouteName, $menu['slug']) and strpos($currentRouteName, $menu['slug']) === 0) {
        $activeClass = 'active open';
        }
        }
        }
        @endphp

        {{-- main menu --}}
        <li class="menu-item {{$activeClass}}">
            <a href="{{ isset($menu['url']) ? url($menu['url']) : (isset($menu['route']) ? route($menu['route']) : 'javascript:void(0);') }}" class="{{ isset($menu['submenu']) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu['target']) and !empty($menu['target'])) target="_blank" @endif>
                @isset($menu['icon'])
                <i class="{{ $menu['icon'] }}"></i>
                @endisset
                <div>{{ isset($menu['name']) ? __($menu['name']) : '' }}</div>
                @isset($menu['badge'])
                <div class="badge bg-label-{{ $menu['badge'][0] }} rounded-pill ms-auto">{{ $menu['badge'][1] }}</div>

                @endisset
            </a>

            {{-- submenu --}}
            @isset($menu['submenu'])
            <x-dashboard.menu.sub-menu :menu="$menu['submenu']" />
            @endisset
        </li>
        @endif
        @endforeach
    </ul>

</aside>