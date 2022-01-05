<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('images/icon/logo.png') }}" alt="Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{ url('/dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Admin Dasboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                {{-- <li>
                                    <a href="{{ url('/dashboard') }}">Admin Dashboard</a>
                                </li> --}}
                               {{--  <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li> --}}
                            </ul>
                        </li>
                        <li class="{{ ($category_name === 'category') ? 'active' : '' }}">
                            <a href="{{ url('admin/category') }}">
                                <i class="fas fa-list"></i>Categories</a>
                        </li>
                        <li class="{{ ($category_name === 'subcategory') ? 'active' : '' }}">
                            <a href="{{ url('admin/subcategory') }}">
                                <i class="fas fa-list"></i>Subcategories</a>
                        </li>
                        <li class="{{ ($category_name === 'products') ? 'active' : '' }}">
                            <a href="{{ url('admin/products') }}">
                                <i class="fas fa-file"></i>

                            Products
                        </a>
                        </li>

                        <li class="{{ ($category_name === 'coupon') ? 'active' : '' }}">
                            <a href="{{ url('admin/coupons') }}">
                               <i class="fas fa-percent"></i>
                            Coupon
                            
                        </a>
                        </li>

                        <li class="{{ ($category_name === 'brand') ? 'active' : '' }}">
                            <a href="{{ url('admin/brand') }}">
                               <i class="fas fa-tags"></i>
                           Brand
                            
                        </a>
                        </li>

                        <li class="{{ ($category_name === 'customer') ? 'active' : '' }}">
                            <a href="{{ url('admin/customer') }}">
                               <i class="fas fa-user"></i>
                           Customer
                            
                        </a>
                        </li>
                        <li class="{{ ($category_name === 'home_slider') ? 'active' : '' }}">
                            <a href="{{ url('admin/home_slider') }}">
                               <i class="fas fa-user"></i>
                           Home Slider
                            
                        </a>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->