          <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{ url('dashboard') }}" class="logo-light">
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>
                
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line fs-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="user-image" width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal">{{ Auth::user()->name }} <i
                                        class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <a href="{{ route('logout') }}" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    
    <div class="leftside-menu">

            <!-- Brand Logo Dark -->
            <a href="{{ url('dashboard') }}" class="logo logo-dark" style="height: 120px; margin-top: 10px;">
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="dark logo" style="height: 100%; width: 100px;">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="small logo">
                </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Main</li>

                    <li class="side-nav-item">
                        <a href="{{ url('dashboard') }}" class="side-nav-link">
                            <i class="bi-speedometer"></i>
                            {{-- <span class="badge bg-success float-end">9+</span> --}}
                            <span> ड्यासबोर्ड </span>
                        </a>
                    </li>
                  
                    <li class="side-nav-item">
                        <a
                            data-bs-toggle="collapse"
                            href="#sidebarPages"
                            aria-expanded="false"
                            aria-controls="sidebarPages"
                            class="side-nav-link"
                        >
                           <i class="bi-files"></i>
                            <span>अपाङ्गता परिचय पत्र</span>
                            <span class="menu-arrow"></span>
                        </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="side-nav-second-level">
                                     <li class="{{ (request()->is('dashboard/*')) ? (request()->is('dashboard/printIndex') || request()->is('dashboard/disability-type') || request()->is('dashboard/disability-group')) ? '' : 'active' :''  }}">
                                        <a href="{{ route('applicant.index') }}">
                                            <i class="icon-book-open"></i> <span>अपाङ्गता परिचय पत्र</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->is('dashboard/disability-type')) ? 'active' :''  }}">
                                        <a href="{{ route('disability-type.index') }}">
                                            <i class="icon-book-open"></i> <span>अपांगताको प्रकार</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->is('dashboard/disability-group')) ? 'active' :''  }}">
                                        <a href="{{ route('disability-group.index') }}">
                                            <i class="icon-book-open"></i> <span>अपांगताको वर्गीकरण</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                     </li>
                    <li class="side-nav-item">
                        <a href="{{ route('print.index') }}" class="side-nav-link"> 
                            <i class="bi-printer"></i> <span>छाप्नुहोस्</span>
                        </a>
                    </li>

                      <li class="side-nav-item">
                        <a href="{{ route('user.index') }}" class="side-nav-link">
                            <i class="bi-person"></i>
                            <span> Users </span>
                        </a>
                    </li>

                      <li class="side-nav-item">
                        <a href="{{ route('employee.create') }}" class="side-nav-link">
                            <i class="bi-person"></i>
                            <span> My Details </span>
                        </a>
                    </li>

                     <li class="side-nav-item">
                      <a href="{{ route('password.index') }}" class="side-nav-link">
                                <i class="bi-lock"></i>
                                <span>Change Password</span>
                      </a>
                        </li>

                       <li class="side-nav-item">
                      <a href="{{ route('logout') }}" class="side-nav-link">
                                <i class="bi-box-arrow-right"></i>
                                <span>Logout</span>
                      </a>
                        </li>
                  
                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->