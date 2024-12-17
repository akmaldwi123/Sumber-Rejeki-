@php
    $currentRouteName = Route::currentRouteName();
@endphp

@if(Auth::user()->role == 'admin')
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <!-- Add your image here -->
                    <div class="text-center py-3">
                        <img src="{{ Vite::asset('resources/images/SUMBERREJEKEIENERGY.png') }}" alt="Logo" class="img-fluid" style="width: 100%">
                    </div>
                    <hr>
                    <div class="nav">
                        <!-- Link untuk Stock -->
                        <a class="nav-link {{ $currentRouteName == 'stock.index' ? 'active' : '' }}" href="{{ route('stock.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Stock
                        </a>

                        <!-- Dropdown untuk Beli Barang -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBeliBarang"
                            aria-expanded="false" aria-controls="collapseBeliBarang">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Beli Barang
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseBeliBarang" aria-labelledby="headingBeliBarang"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ $currentRouteName == 'beli_barang.create' ? 'active' : '' }}" href="{{ route('beli_barang.create') }}">Form Pembelian</a>
                                <a class="nav-link {{ $currentRouteName == 'beli_barang.index' ? 'active' : '' }}" href="{{ route('beli_barang.index') }}">Daftar Pembelian</a>
                            </nav>
                        </div>

                        <!-- Link Transaksi Data -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Transaksi Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ $currentRouteName == 'barangmasuk.index' ? 'active' : '' }}" href="{{ route('barangmasuk.index') }}">Barang Masuk / Kembali</a>
                                <a class="nav-link {{ $currentRouteName == 'barangkeluar.index' ? 'active' : '' }}" href="{{ route('barangkeluar.index') }}">Barang Keluar</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        @php
            $currentRouteName = Route::currentRouteName();
        @endphp
        <!-- Konten khusus admin -->
    @elseif(Auth::user()->role == 'manager')
        <p>Ini adalah dashboard untuk manager.</p>
        <!-- Konten khusus manager -->

    @else
        <p>Role Anda tidak dikenal.</p>
    @endif



{{-- <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <!-- Add your image here -->
            <div class="text-center py-3">
                <img src="{{ Vite::asset('resources/images/SUMBERREJEKEIENERGY.png') }}" alt="Logo" class="img-fluid" style="width: 100%">
            </div>
            <hr>
            <div class="nav">
                <!-- Link untuk Stock -->
                <a class="nav-link {{ $currentRouteName == 'stock.index' ? 'active' : '' }}" href="{{ route('stock.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Stock
                </a>

                <!-- Dropdown untuk Beli Barang -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBeliBarang"
                    aria-expanded="false" aria-controls="collapseBeliBarang">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Beli Barang
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseBeliBarang" aria-labelledby="headingBeliBarang"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ $currentRouteName == 'beli_barang.create' ? 'active' : '' }}" href="{{ route('beli_barang.create') }}">Form Pembelian</a>
                        <a class="nav-link {{ $currentRouteName == 'beli_barang.index' ? 'active' : '' }}" href="{{ route('beli_barang.index') }}">Daftar Pembelian</a>
                    </nav>
                </div>

                <!-- Link Transaksi Data -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Transaksi Data
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ $currentRouteName == 'barangmasuk.index' ? 'active' : '' }}" href="{{ route('barangmasuk.index') }}">Barang Masuk / Kembali</a>
                        <a class="nav-link {{ $currentRouteName == 'barangkeluar.index' ? 'active' : '' }}" href="{{ route('barangkeluar.index') }}">Barang Keluar</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div> --}}
