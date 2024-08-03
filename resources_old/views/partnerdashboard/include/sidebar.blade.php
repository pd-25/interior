                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul id="side-menu">
                            <!-- <li class="menu-title">Navigation</li> -->
                            <li>
                                <a href="{{ route('partner-dashboard') }}">
                                    <i data-feather="home"></i>
                                    <span> Dashboards </span>
                                </a>
                            </li>
                            <li class="menu-title mt-2"></li>
                            <li>
                                <a href="{{ route('partner_renovation_pending') }}">
                                    <i data-feather="arrow-right-circle"></i>
                                    <span> Pending Request </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('partner_renovation_completed') }}">
                                    <i data-feather="arrow-right-circle"></i>
                                    <span> Completed Request </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i data-feather="log-out"></i>
                                    <span> Logout </span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->
