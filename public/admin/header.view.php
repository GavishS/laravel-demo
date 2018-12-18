<nav class="navbar navbar-expand-lg navbar-expand-lg-1 bg-secondary text-uppercase nav_bar" id="mainNav">
    <div class="nav_menu ">

        <a class="navbar-brand" ><div class="color-w glocal_icon">GLOCAL</div></a>

        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse navbar-collapse-1 nav_bar_icon nav_bar_icon_size" id="navbarResponsive">
            <ul class="navbar_main navbar-nav ml-auto ipadpro_marign project_hover">       
                <li class="nav-item dropdown ">
                    <a class="nav-link height navbar_padding_main rounded js-scroll-trigger" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="navbar_icon_width icon_pad">Users <i class="fa fa-caret-down"></i></div>
                    </a>

                    <div class="nav_display dropdown_display_flex dropdown-menu p-0 p-1" aria-labelledby="navbarDropdown1">
                        <a href="#!/admin/employee" class="dropdown-item">Employee</a>

                        <a class="dropdown-item">Employer</a>
                    </div>

                </li>

            </ul>

            <ul class="navbar_main navbar-nav ml-auto ul-2 se_ul-2">
                <li class="nav-item dropdown right">
                    <a class="nav-link mob_padding_top last_icon mob_padding_bottom_1 navbar_padding_icon_symbol rounded js-scroll-trigger " id="navbarDropdown10" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="navbar_icon_width_symbols"><i class="fa fa-user fa-fw"></i>&nbsp<i class="fa fa-caret-down"></i></div>

                    </a>
                    <ul class="dropdown_team dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li>
                            <a ng-click="$CommanService.logout();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>

</nav>