 <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                     <li class="{{ request()->segment(1) == '/' ? 'mm-active' : '' }}">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="true">
                            <i class="icon icon-single-04"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false" class="{{ request()->segment(1) == '/' ? 'mm-collapse mm-show' : '' }}">
                            <li class="{{ request()->segment(1) == '/' ? 'mm-active' : '' }}">
                                <a class="{{ request()->segment(1) == '/' ? 'mm-active' : '' }}" href="{{ url('/') }}">Dashboard</a>
                            </li>
                            <li class="{{ request()->segment(1) == '/laporan' ? 'mm-active' : '' }}">
                                <a class="{{ request()->segment(1) == '/laporan' ? 'mm-active' : '' }}" href="{{ url('/laporan') }}">Laporan</a>
                            </li>
                        </ul>
                        
                    </li>

                    {{-- <li class="{{ request()->segment(1) == '/' ? 'mm-active' : '' }}">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="true">
                            <i class="icon icon-single-04"></i>
                            <span class="nav-text">Pencatatan Keuangan</span>
                        </a>
                        <ul aria-expanded="false" class="{{ request()->segment(1) == '/' ? 'mm-collapse mm-show' : '' }}">
                            <li class="{{ request()->segment(1) == '/' ? 'mm-active' : '' }}">
                                <a class="{{ request()->segment(1) == '/' ? 'mm-active' : '' }}" href="{{ url('/') }}">
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="{{ route('pencatatan-keuangan.index') }}" aria-expanded="false">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="nav-text">Pencatatan Keuangan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('data-pengeluaran.index') }}" aria-expanded="false">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="nav-text">Pengeluaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('data-pemasukkan.index') }}" aria-expanded="false">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="nav-text">Pemasukkan</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('data-pemasukkan.index') }}" aria-expanded="false">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="nav-text">Laporan</span>
                        </a>
                    </li> --}}


                </ul>
            </div>


        </div>