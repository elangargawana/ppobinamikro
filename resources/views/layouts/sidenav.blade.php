{{-- Aside --}}
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"><a href="./index.html" class="brand-link"><span class="brand-text fw-light">PPOB
                INAmikro</span></a></div>
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="{{ url('/') }}" class="nav-link"> <i
                            class="nav-icon bi bi-house"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item"> <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">PAGES</li>

                <li class="nav-item"> <a href="{{ route('category.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-tag-fill"></i>
                        <p>Product Category</p>
                    </a> </li>



                <li class="nav-item"> <a href="{{ route('product.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-bag-fill"></i>
                        <p>Product</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{ route('productprice.index') }}" class="nav-link"> <i
                            class="nav-icon bi bi-wallet-fill"></i>
                        <p>Product Price</p>
                    </a> </li>

                <li class="nav-item"> <a href="{{ route('prefix.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-sticky-fill"></i>
                        <p>Prefix</p>
                    </a> </li>

                <hr class="my-3 text-white" />

                <li class="nav-item"> <a href="" class="nav-link">
                        <i class="nav-icon bi bi-diagram-3"></i>
                        <p>Diagram</p>
                    </a> </li>

                <hr class="my-3 text-white" />

                <li class="nav-item">
                    <a onclick="document.getElementById('logout-form').submit()" href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-arrow-left"></i>
                        <p>Sign Out</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<form id="logout-form" method="POST" action="{{ route('logout') }}">
    @csrf
    @method('delete')
</form>
{{-- End Aside --}}
