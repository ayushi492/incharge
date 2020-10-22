<nav class="pcoded-navbar theme-horizontal navbar-blue ">
    <div class="navbar-wrapper ">
        <div class="navbar-brand header-logo">

            <a class="mobile-menu" id="mobile-collapse" href="#"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar ">
                <?php
                //if admin not looged in
                if($_SESSION['incharge_ovp']!='admin')
                {
                    //if permission for dashboard
                    if($rows['dashboard']==1)
                    { ?>
                        <li class="nav-item">
                            <a href="index.php?action=dashboard" class="nav-link"><span class="pcoded-micon"> <i class="fas fa-home"></i></span><span class="pcoded-mtext"> Dashboard </span></a>
                        </li>
                    <?php
                    }
                    //if permission for either view or add charger
                    if($rows['add_charger']==1 || $rows['view_charger']==1){?>
                        <li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-charging-station"></i></span><span class="pcoded-mtext">Chargers</span></a>
                            <ul class="pcoded-submenu">
                                <?php
                                //if permission of add charger
                                if($rows['add_charger']==1)
                                { ?>
                                    <li class=""><a href="index.php?action=add_charger" class="">Add Chargers </a></li>
                                    <?php
                                }
                                //if permission of view charger
                                if($rows['view_charger']==1)
                                { echo'<li class=""><a href="index.php?action=view_charger" class="">View Chargers </a></li>';
                                } ?>
                            </ul>
                        </li>
                    <?php }
                    //if permission of site information
                    if($rows['view_sites']==1 || $rows['view_site_region']==1 || $rows['view_site_division']==1)
                    { ?>
                        <li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-map-marked-alt"></i></span><span class="pcoded-mtext">Site Information</span></a>
                            <ul class="pcoded-submenu">
                                <?php
                                if($rows['view_site_region']==1)
                                { echo'<li class=""><a href="index.php?action=view_site_region" class="">Site Region</a></li>'; }
                                if($rows['view_site_division']==1)
                                { echo'<li class=""><a href="index.php?action=view_site_division" class="">Site Division</a></li>'; }
                                 if($rows['view_site_group']==1)
                                { echo'<li class=""><a href="index.php?action=view_site_group" class="">Site Group</a></li>';}
                                if($rows['view_sites']==1)
                                { echo'<li class=""><a href="index.php?action=view_sites" class=""> Site</a></li>'; }    ?>
                            </ul>
                        </li>
                    <?php
                    }
                }
                //if admin looged in
                else if($_SESSION['incharge_ovp']=='admin'){
                ?>
                <li class="nav-item">
                    <a href="index.php?action=dashboard" class="nav-link"><span class="pcoded-micon"> <i class="fas fa-home"></i></span><span class="pcoded-mtext"> Dashboard </span></a>
                </li>
                <li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-charging-station"></i></span><span class="pcoded-mtext">Chargers</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="index.php?action=add_charger" class="">Add Chargers </a></li>
                        <li class=""><a href="index.php?action=view_charger" class="">View Chargers </a></li>
                    </ul>
                </li>
                <li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-map-marked-alt"></i></span><span class="pcoded-mtext">Site Information</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="index.php?action=view_site_region" class="">Site Region</a></li>
                        <li class=""><a href="index.php?action=view_site_division" class="">Site Division</a></li>
                        <li class=""><a href="index.php?action=view_site_group" class="">Site Group</a></li>
                        <li class=""><a href="index.php?action=view_sites" class=""> Site</a></li>
                    </ul>
                </li>
                <li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-users"></i></span><span class="pcoded-mtext">Manage Users</span></a>
                    <ul class="pcoded-submenu">

                        <li class=""><a href="index.php?action=add_users" class="">Add Users </a></li>
                        <li class=""><a href="index.php?action=view_users" class="">View Users </a></li>

                    </ul>
                </li>
                <?php
                } ?>
                <!--<li class="nav-item">
                <a href="index.php?action=view_charger" class="nav-link"><span class="pcoded-micon"><i class="fas fa-charging-station"></i></span><span class="pcoded-mtext"> View Charger </span></a>
                </li>-->

                <!--<li class="nav-item">
                <a href="index.php?action=view_sites" class="nav-link"><span class="pcoded-micon"><i class="fas fa-charging-station"></i></span><span class="pcoded-mtext"> Site </span></a>
                </li>

                <li class="nav-item">
                <a href="index.php?action=view_site_group" class="nav-link"><span class="pcoded-micon"><i class="fas fa-sitemap"></i></i></span><span class="pcoded-mtext"> Site Group </span></a>
                </li>

                <li class="nav-item">
                <a href="index.php?action=view_site_division" class="nav-link"><span class="pcoded-micon"><i class="fas fa-object-ungroup"></i></i></span><span class="pcoded-mtext"> Site Division </span></a>
                </li>


                <li class="nav-item">
                <a href="index.php?action=view_site_region" class="nav-link"><span class="pcoded-micon"><i class="fas fa-map-marked-alt"></i></i></span><span class="pcoded-mtext"> Site Region </span></a>
                </li>-->










            </ul>

        </div>
    </div>
</nav>


<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a href="#" class="b-brand">

            <img src="assets/images/logo-dashbig.png" alt="" class="logo images">
            <img src="assets/images/logo-dashsmall.png" alt="" class="logo-thumb images">
        </a>
        <a class="mobile-menu" id="mobile-collapse1" href="#"><span></span></a>

    </div>
    <a class="mobile-menu" id="mobile-header" href="#">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <a href="#" class="mob-toggler"></a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">

            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li></li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span>Welcome Administrator</span>
                            <a href="logout.php" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>