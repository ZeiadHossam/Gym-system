<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src="/GYM/public/img/<?php echo $gym->getGymImage(); ?>" alt="GYM Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text gymName font-weight-light"><?php echo $gym->getGymName(); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/GYM/public/img/<?php echo $loggedemployee->getImage(); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block"><?php echo $loggedemployee->getFirstName()." ".$loggedemployee->getLastName(); ?></a>
                <em class="text-lightblue"><?php echo $loggedemployee->getUsertype()->getName(); ?></em>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/GYM/home/index" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php  if ($pages[1]->get_access()=='1'){ ?>
                <li class="nav-item">
                    <a href="/GYM/Reception/showReception" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Reception
                        </p>
                    </a>
                </li>
                <?php } if ($pages[2]->get_access()=='1'){ ?>
                <li class="nav-item">
                    <a href="notifications.php" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Notifications
                        </p>
                    </a>
                </li>
                <?php } if ($pages[3]->get_access()=='1'){ ?>
                <li class="nav-item">
                    <a href="/GYM/member/viewMembers" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Members
                        </p>
                    </a>
                </li>
                <?php } if ($pages[4]->get_access()=='1'){ ?>
                <li class="nav-item">
                    <a href="/GYM/employee/showAllEmployees" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Employees
                        </p>
                    </a>
                </li>
                <?php } if ($pages[5]->get_access()=='1'){ ?>
                <li class="nav-item">
                    <a href="/GYM/contract/viewContracts"  class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Contracts
                        </p>
                    </a>
                </li>
                <?php } if ($pages[6]->get_access()=='1'){ ?>
                <li class="nav-item has-treeview" >
                    <a href="#" class="nav-link" >
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Administration
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/GYM/package/viewPackages" class="nav-link">
                                <i class="fas fa-boxes nav-icon"></i>
                                <p>Packages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/GYM/department/viewDepartments" class="nav-link">
                                <i class="fas fa-unlock nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/GYM/branch/viewBranches" class="nav-link">
                                <i class="far fa-address-book nav-icon"></i>
                                <p>Branches</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/GYM/paymentMethod/viewPaymentMethod" class="nav-link">
                                <i class="far fa-credit-card nav-icon"></i>
                                <p>Payment Methods</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } if ($pages[7]->get_access()=='1'){ ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/GYM/report/contract" class="nav-link">
                                <i class="far fa-file nav-icon"></i>
                                <p> Contracts</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/GYM/report/Sales" class="nav-link">
                                <i class="far fa-file nav-icon"></i>
                                <p>Sales</p>
                            </a>
                        </li>

                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>