<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-4">
                <a href="{{ route("home") }}" id="logo">
                    <img src="{{ asset("assets/img/logo.png") }}" alt="quickfood-logo" width="190" height="23" class="d-none d-sm-block">
                    <img src="{{ asset("assets/img/logo_mobile.png") }}" alt="quickfood-logo-mobile" width="59" height="23" alt="" class="d-block d-sm-none">
                </a>
            </div>
            <nav class="col-md-10 col-sm-8 col-xs-8">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{ asset("assets/img/logo.png") }}" width="190" height="23" alt="logo-header-mobile">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                    <ul>
                        <li><a href="{{ route("home") }}">Početna</a></li>
                        <li><a href="{{ route("menu") }}">Meni</a></li>
                        <li><a href="{{ route("about") }}">O nama</a></li>

                        @if(!session()->has("user"))
                            <li><a href="#" data-toggle="modal" data-target="#register">Registruj se</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#login_2">Uloguj se</a></li>
                        @else
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu"><i class="fas fa-user-circle"></i> <i class="icon-down-open-mini"></i>Vaš nalog</a>
                                <ul>
                                    <li><a href="{{ route("orders.index") }}">Porudžbine</a></li>
                                    @if(session()->get("user")->role->role == "Admin")
                                        <li><a href="{{ route("admin") }}">Admin panel</a></li>
                                    @endif
                                    @if(session()->get("user")->role->role == "Employee")
                                        <li><a href="#">Porudžbine</a></li>
                                    @endif
                                    <li><a href="#">Podešavanja</a></li>
                                    <li><a href="{{ route("logout") }}">Izloguj se</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
