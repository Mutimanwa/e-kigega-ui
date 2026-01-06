
   <!-- leftbar-tab-menu -->
    <div class="startbar d-print-none">
        <!--start brand-->
        <div class="brand">
            <a href="index.php" class="logo">
                <!-- <span>
                    <img src="<?= IMAGES_URL ?>logos/logo.png" alt="logo-small" class="logo-sm" />
                </span>
                <span class="bg-light d-none d-lg-inline-block border rounded-circle ovverflow-hidden">
                    <img src="<?= IMAGES_URL ?>logos/logo.png" height="50" alt="logo-large" class="" />
                    <img src="<?= IMAGES_URL ?>logos/logo.png" alt="logo-large" class="logo-lg logo-dark" />
                </span> -->
             
            </a>
        </div>
        <!--end brand-->
        <!--start startbar-menu-->
        <div class="startbar-menu">
            <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
                <div class="d-flex align-items-start flex-column w-100">
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-auto w-100">
                        <li class="menu-label mt-2">
                            <span>Tableau de bord</span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="iconoir-report-columns menu-icon"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="produits/">
                                <i class="iconoir-box menu-icon"></i>
                                <span>Gestion de produits</span>
                            </a>
                        </li>
                    
                        <!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="depenses/">
                               <i class="iconoir-wallet menu-icon"></i>
                                <span>Gestion des Depenses</span>
                                <!-- <span class="badge text-bg-pink ms-auto">03</span> -->
                            </a>
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="clients/">
                                <i class="iconoir-user-square menu-icon"></i>
                                <span>Gestion des clients</span>
                               
                            </a>
                        </li>
                         <!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="ventes">
                                <i class="iconoir-shopping-bag menu-icon"></i>
                                <span>Gestion des Ventes</span>
                            </a>
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="stock/">
                               <i class="iconoir-database menu-icon"></i>

                                <span>Gestion de stock</span>
                              
                            </a>
                        </li>
                        
                        <!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="iconoir-truck menu-icon"></i>

                                <span class="me-2">Fournisseurs </span>
                                <span class="badge text-bg-blue ms-auto">comming soon</span>
                            </a>
                        </li>

                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>Systeme</span>
                        </li>
                         <!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="utilisateurs/">
                                <i class="iconoir-user-circle menu-icon"></i>

                                <span>Utilisateurs</span>
                            </a>
                        </li>
                        <!--end nav-item-->

                       
                    </ul>
                    <!--end navbar-nav--->
                    <div class="update-msg text-center">
                        <div
                            class="d-flex justify-content-center bg-light align-items-center thumb-xxl update-icon-box rounded-circle mx-auto">
                            <!-- <i class="iconoir-peace-hand h3 align-self-center mb-0 text-primary"></i> -->
                            <img src="<?= IMAGES_URL ?>logos/logo.png" alt="" class="" height="130" />
                        </div>
                        <h5 class="mt-3">
                            Today's <span class="text-white">$2450.00</span>
                        </h5>
                        <p class="mb-3 text-muted">Today's best Investment for you.</p>
                        <a href="javascript: void(0);" class="btn text-primary shadow-sm rounded-pill px-3">Upgarde now</a>
                    </div>
                </div>
            </div>
            <!--end startbar-collapse-->
        </div>
        <!--end startbar-menu-->
    </div>