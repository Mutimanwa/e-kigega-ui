<!-- leftbar-tab-menu -->
<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="<?= BASE_URL ?>index.php" class="logo">
            <span>
                <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
            </span>
            <span>
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
                        <span>Vue d’ensemble</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>public/index.php">
                            <i class="iconoir-dashboard-speed menu-icon"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>public/formations/index.php">
                            <i class="iconoir-graduation-cap menu-icon"></i>
                            <span>Formations</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>public/ai/index.php">
                            <i class="iconoir-brain menu-icon"></i>
                            <span>Assistant IA</span>
                        </a>
                    </li>

                    <!-- ================= ENTREPRISES ================= -->
                    <li class="menu-label mt-2">
                        <span>Gestion des entreprises</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>public/entreprise/index.php">
                            <i class="iconoir-building menu-icon"></i>
                            <span>Entreprises</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>public/abonnement/index.php">
                            <i class="iconoir-credit-card menu-icon"></i>
                            <span>Abonnements & Plans</span>
                        </a>
                    </li>

                    <!-- ================= UTILISATEURS & ACCÈS ================= -->
                    <li class="menu-label mt-2">
                        <span>Utilisateurs & Accès</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarUsers">
                            <i class="iconoir-group menu-icon"></i>
                            <span>Gestion des utilisateurs</span>
                        </a>
                        <div class="collapse" id="sidebarUsers">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>public/utilisateurs/index.php">
                                        Liste des utilisateurs
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>public/roles/index.php">
                                        Rôles & Permissions
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- ================= SUPERVISION ================= -->
                    <li class="menu-label mt-2">
                        <span>Supervision & Sécurité</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarAudit" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarAudit">
                            <i class="iconoir-shield-check menu-icon"></i>
                            <span>Audit & Sécurité</span>
                        </a>
                        <div class="collapse" id="sidebarAudit">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>public/logs/index.php">
                                        Journaux système
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASE_URL ?>public/activite/index.php">
                                        Historique des activités
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- ================= SYSTÈME ================= -->
                    <li class="menu-label mt-2">
                        <span>Système</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>public/backup/index.php">
                            <i class="iconoir-database-backup menu-icon"></i>
                            <span>Sauvegardes</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>public/maintenance/index.php">
                            <i class="iconoir-settings menu-icon"></i>
                            <span>Maintenance système</span>
                        </a>
                    </li>

                </ul>
                <!--end navbar-nav-->

            </div>
        </div>
    </div>
</div>

<div class="startbar-overlay d-print-none"></div>
<!-- end leftbar-tab-menu -->

<div class="page-wrapper">
    <div class="page-content">
