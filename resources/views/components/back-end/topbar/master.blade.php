 <!-- Topbar Start -->
 <div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <!--notification-->
        <x-back-end.topbar.notification></x-back-end.topbar.notification>


        <!--messages-->
        <x-back-end.topbar.message></x-back-end.topbar.notification>
        
        <!--profile-->
        <x-back-end.topbar.profile></x-back-end.topbar.notification>
        

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                <i class="mdi mdi-settings-outline noti-icon"></i>
            </a>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="#" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo.png')}}" alt="" height="22">
                <!-- <span class="logo-lg-text-dark">Uplon</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-lg-text-dark">U</span> -->
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="24">
            </span>
        </a>

        <a href="#" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="22">
                <!-- <span class="logo-lg-text-dark">Uplon</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-lg-text-dark">U</span> -->
                <img src="{{asset('assets/images/logo-sm-light.png')}}" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>

        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>
    </ul>
</div>
<!-- end Topbar -->