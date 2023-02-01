<nav class="navbar-wrapper">
    <div class="navbar-wrapper-area">
        <div class="navbar__left">
            <button class="navbar__expand pe-3">
                <i class="las la-bars"></i>
            </button>
            <button class="navbar__mobile_expand pe-3">
                <i class="las la-bars"></i>
            </button>
        </div>
        <div class="navbar__right">
            <ul class="navbar__action-list">
                <li>
                    <button class="version-btn">
                        <i class="las la-moon"></i>
                    </button>
                </li>
                <li class="fullscreen-list-btn">
                    <button class="fullscreen-btn">
                        <i class="fullscreen-open las la-compress" onclick="openFullscreen();"></i>
                        <i class="fullscreen-close las la-compress-arrows-alt" onclick="closeFullscreen();"></i>
                    </button>
                </li>
                <li class="notification-area">
                    <button class="notification-btn">
                        <i class="las la-bell"></i>
                        <span class="bell-badge">4</span>
                    </button>
                    <div class="notification-wrapper">
                        <div class="notification-header">
                            <h6 class="title">Notification</h6>
                            <span class="sub-title">You have 25 unread notification</span>
                        </div>
                        <ul class="notification-list">
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('assets/admin/')}}/images/1.jpg" alt="user">
                                </div>
                                <div class="content">
                                    <h6 class="title">Add money request from testagent <span>(AGENT)</span></h6>
                                    <span class="sub-title"><i class="las la-clock"></i> 6 days ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('assets/admin/')}}/images/1.jpg" alt="user">
                                </div>
                                <div class="content">
                                    <h6 class="title">Add money request from testagent <span>(AGENT)</span></h6>
                                    <span class="sub-title"><i class="las la-clock"></i> 6 days ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('assets/admin/')}}/images/1.jpg" alt="user">
                                </div>
                                <div class="content">
                                    <h6 class="title">Add money request from testagent <span>(AGENT)</span></h6>
                                    <span class="sub-title"><i class="las la-clock"></i> 6 days ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('assets/admin/')}}/images/1.jpg" alt="user">
                                </div>
                                <div class="content">
                                    <h6 class="title">Add money request from testagent <span>(AGENT)</span></h6>
                                    <span class="sub-title"><i class="las la-clock"></i> 6 days ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('assets/admin/')}}/images/1.jpg" alt="user">
                                </div>
                                <div class="content">
                                    <h6 class="title">Add money request from testagent <span>(AGENT)</span></h6>
                                    <span class="sub-title"><i class="las la-clock"></i> 6 days ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('assets/admin/')}}/images/1.jpg" alt="user">
                                </div>
                                <div class="content">
                                    <h6 class="title">Add money request from testagent <span>(AGENT)</span></h6>
                                    <span class="sub-title"><i class="las la-clock"></i> 6 days ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('assets/admin/')}}/images/1.jpg" alt="user">
                                </div>
                                <div class="content">
                                    <h6 class="title">Add money request from testagent <span>(AGENT)</span></h6>
                                    <span class="sub-title"><i class="las la-clock"></i> 6 days ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('assets/admin/')}}/images/1.jpg" alt="user">
                                </div>
                                <div class="content">
                                    <h6 class="title">Add money request from testagent <span>(AGENT)</span></h6>
                                    <span class="sub-title"><i class="las la-clock"></i> 6 days ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('assets/admin/')}}/images/1.jpg" alt="user">
                                </div>
                                <div class="content">
                                    <h6 class="title">Add money request from testagent <span>(AGENT)</span></h6>
                                    <span class="sub-title"><i class="las la-clock"></i> 6 days ago</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <button type="button" class="" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                    <span class="navbar-user">
                        <span class="navbar-user__thumb"><img src="{{ getImage(imagePath()['profile']['admin']['path'].'/'. auth()->user()->image, imagePath()['profile']['admin']['size'])}}" alt="user"></span>
                        <span class="navbar-user__info">
                        <span class="navbar-user__name">admin</span>
                        </span>
                        <span class="icon"><i class="las la-chevron-circle-down"></i></span>
                    </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                        <a href="{{ route('admin.logout') }}"
                        class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                            <span class="dropdown-menu__caption">Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="dashboard-title-part">
        <h5 class="title">{{ $pageTitle }}</h5>
        <div class="dashboard-path">
            {{-- <span class="main-path">Dashboards</span>
            <i class="las la-angle-right"></i>
            <span class="active-path g-color">Dashboard</span> --}}
        </div>
        <div class="view-prodact">
            @stack('breadcrumb-plugins')
        </div>
    </div>
</nav>
