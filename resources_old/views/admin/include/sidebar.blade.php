                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <!-- <li class="menu-title">Navigation</li> -->

                            <li>
                                <a href="#sidebarDashboard" data-bs-toggle="collapse">
                                    {{-- <span class="badge bg-success float-end">02</span> --}}
                                    <i data-feather="home"></i>
                                    <span> Dashboards </span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                            </li>
                            <li class="menu-title mt-2"></li>

                            <li>
                                <a href="#Banner" data-bs-toggle="collapse">
                                    <i data-feather="video"></i>
                                    <span> Banner Settings</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="Banner">
                                    <ul class="nav-second-level">
                                        <li><a href="{{ route('homebanner.index') }}">Home Banner</a></li>
                                        <li><a href="{{ route('subbanner.index') }}">Sub Banner</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#Booking" data-bs-toggle="collapse">
                                    <i data-feather="calendar"></i>
                                    <span>Booking </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="Booking">
                                    <ul class="nav-second-level">
                                        <li><a href="{{ route('homebookings') }}">Home</a></li>
                                        <li><a href="{{ route('officebookings') }}">Office</a></li>
                                        <li><a href="{{ route('retailbookings') }}"> Retail</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#Services" data-bs-toggle="collapse">
                                    <i data-feather="shopping-bag"></i>
                                    <span> Services </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="Services">
                                    <ul class="nav-second-level">
                                        <li><a href="{{ route('Categorielist') }}">Services List</a></li>
                                        <li><a href="{{ route('Serviceimagelist') }}">Services Image</a></li>
                                        <li><a href="{{ route('Servicecategorylist') }}">Services Category</a></li>
                                        <li><a href="{{ route('Servicebannerlist') }}">Services Banner</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#users" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Users </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="users">
                                    <ul class="nav-second-level">
                                        <li><a href="{{ route('customerlist') }}">Customer List</a></li>
                                        <li><a href="{{ route('partnerlist') }}">Partner List</a></li>
                                    </ul>
                                </div>
                            </li>


                            <li>
                                <a href="{{ route('bloglist') }}">
                                    <i data-feather="share-2"></i>
                                    <span> Blog Manager</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('testimonialslist') }}">
                                    <i data-feather="message-circle"></i>
                                    <span> Testimonials </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('aboutus') }}">
                                    <i data-feather="plus-square"></i>
                                    <span> About Us</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('contactus') }}">
                                    <i data-feather="map-pin"></i>
                                    <span>Contact Us</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('enquries.index') }}">
                                    <i data-feather="hash"></i>
                                    <span>Enquries</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->
