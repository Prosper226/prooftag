<div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="admin-logo">
                        <a href="#"><img src="img/logo/log.png" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-0 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav mai-top-nav">
                            <li class="nav-item"><a href="dashboard.php" class="nav-link">ADMINISTRATION</a>
                            </li>
                           
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">CITOYENS <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                <div role="menu" class="dropdown-menu animated flipInX">
                                    <a href="citizens-list.php" class="dropdown-item">Consultation</a>
                                    <!-- <a href="#" class="dropdown-item">Modifications</a> -->
                                    <a href="citizens-statistic.php" class="dropdown-item">Statistiques</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">UTILISATEURS <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                <div role="menu" class="dropdown-menu animated flipInX">
                                    <a href="users-list.php" class="dropdown-item">Consultation</a>
                                    <!-- <a href="#" class="dropdown-item">Modifications</a> -->
                                    <!-- <a href="#" class="dropdown-item">Statistiques</a> -->
                                </div>
                            </li>

                           
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
                    <div class="header-right-info">
                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                            
                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                    <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                    <span class="admin-name"><?php echo $_SESSION['user']->login ?></span>
                                    <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                </a>
                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                    <li><a href="#"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>Mon Profile</a>
                                    </li>
                                     
                                
                                    <li><a href="logout.php"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Se deconnecter</a>
                                    </li>
                                </ul>
                            </li>
            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>