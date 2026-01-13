<!-- leftbar-tab-menu -->
<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="<?= BASE_URL ?>index.php" class="logo">
            <span>
                <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                <img src="assets/images/logo-light.png" alt="logo-large" class="logo-lg logo-light">
                <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu">
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <!-- Navigation -->
                <ul class="navbar-nav mb-auto w-100">

                    <!-- ================= GLOBAL ================= -->
                    <li class="menu-label mt-2">
                        <span>Global</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>dashboard.php">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Dashboard Global</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>formations/formations.php">
                            <i class="iconoir-graduation-cap menu-icon"></i>
                            <span>Formations</span>
                        </a>
                    </li>

                    <!-- ================= ENTREPRISES ================= -->
                    <li class="menu-label mt-2">
                        <span>Entreprises</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>entreprise.php">
                            <i class="iconoir-building menu-icon"></i>
                            <span>Gestion des entreprises</span>
                        </a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>abonnement.php">
                            <i class="iconoir-building menu-icon"></i>
                            <span>Abonement et Plan</span>
                        </a>
                    </li>

                    <!-- ================= UTILISATEURS & ACCÈS ================= -->
                    <li class="menu-label mt-2">
                        <span>Utilisateurs & Accès</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>#sidebarUsers" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarUsers">
                            <i class="iconoir-group menu-icon"></i>
                            <span>Utilisateurs</span>
                        </a>
                        <div class="collapse" id="sidebarUsers">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>utilisateurs.php">Liste des utilisateurs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>roles.php">Rôles & Permissions</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- ================= MODULES & PARAMÈTRES ================= -->
                    <!-- <li class="menu-label mt-2">
                        <span>Configuration</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>#sidebarConfig" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarConfig">
                            <i class="iconoir-settings menu-icon"></i>
                            <span>Paramètres système</span>
                        </a>
                        <div class="collapse" id="sidebarConfig">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>modules.php">Modules</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>taxes.php">Taxes & Devise</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>documents.php">Documents & Templates</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->

                    <!-- ================= SUPERVISION ================= -->
                    <li class="menu-label mt-2">
                        <span>Supervision</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>#sidebarAudit" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAudit">
                            <i class="iconoir-shield-check menu-icon"></i>
                            <span>Audit & Sécurité</span>
                        </a>
                        <div class="collapse" id="sidebarAudit">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>logs.php">Logs système</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>activity.php">Activités</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- ================= MAINTENANCE ================= -->
                    <li class="menu-label mt-2">
                        <span>Système</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>backup.php">
                            <i class="iconoir-database-backup menu-icon"></i>
                            <span>Sauvegardes</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>maintenance.php">
                            <i class="iconoir-refresh menu-icon"></i>
                            <span>Maintenance</span>
                        </a>
                    </li>

                </ul>

                <!--end navbar-nav--->

            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->
</div><!--end startbar-->
<div class="startbar-overlay d-print-none"></div>
<!-- end leftbar-tab-menu-->

<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">