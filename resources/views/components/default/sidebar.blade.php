<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Kabupaten Gowa</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">St</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Page Data</li>
            @if(session('role') == 'admin')
                <li class="{{ $menu == 'admin' ? 'active' : ''}}"><a class="nav-link" href="{{ route('user.index') }}"><i
                            class="fas fa-users"></i><span>Administrator</span></a></li>
                <li class="{{ $menu == 'uji' ? 'active' : ''}}"><a class="nav-link" href="{{ route('uji.index') }}"><i
                            class="fas fa-print"></i><span>Uji SAW Method</span></a></li>
                <li class="{{ $menu == 'disabilitas' ? 'active' : ''}}"><a class="nav-link"
                        href="{{ route('disabilitas.index') }}"><i class="fas fa-print"></i><span>Data
                            Disabilitas</span></a></li>
            @endif

            <li class="{{ $menu == 'warga' ? 'active' : ''}}"><a class="nav-link" href="{{ route('warga.index') }}"><i
                        class="fas fa-print"></i><span>Data Warga</span></a></li>
            <li class="{{ $menu == 'kodepos' ? 'active' : ''}}"><a class="nav-link"
                    href="{{ route('kodepos.index') }}"><i class="fas fa-print"></i><span>Data Daerah Gowa</span></a>
            </li>
        </ul>
    </aside>
</div>