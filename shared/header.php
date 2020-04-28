<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item"><em class="nav-link"><?php
            if($_SESSION['branch']!=NULL)
            {
                echo $gym->getBranchs()[$_SESSION['branch']]->getCity();
            }
            ?></em></li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Settings</span>
                <div class="dropdown-divider"></div>
                <a href="myprofile.php" class="dropdown-item">
                    My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="../Controller/logout.php" class="dropdown-item">
                    Logout
                </a>

            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->