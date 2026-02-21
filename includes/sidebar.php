<?php
// includes/sidebar.php
require_once 'menu_functions.php';
?>

<!-- leftbar-tab-menu -->
<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand ">
        <a href="#" class="logo">
            <span >
                <img src="<?= IMAGES_URL ?>logos/logo-small.png" height="50" alt="E-Kigega Logo" class="logo-sm" />
            </span>
            <span>
                <img src="<?= IMAGES_URL ?>logos/logo.png" alt="E-Kigega Logo" class="logo-lg" />
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
                    <?php echo generate_menu(); ?>
                </ul>
                <!--end navbar-nav--->

                <div class="update-msg text-center">
                    <div
                        class="update-icon-box bg-light rounded-circle mx-auto d-flex justify-content-center align-items-center">
                        <img src="<?= IMAGES_URL ?>logos/logo-small.png" alt="E-Kigega Logo" height="80" class="" />
                    </div>



                    <h5 class="mt-3">
                        Bienvenue, <span class="text-white">
                            <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Utilisateur'); ?>
                        </span>
                    </h5>
                    <p class="mb-3 text-muted">
                        <?php echo APP_NAME; ?> v
                        <?php echo APP_VERSION; ?>
                    </p>
                    <a href="<?php echo BASE_URL; ?>logout.php"
                        class="btn text-primary shadow-sm rounded-pill px-3">Déconnexion</a>
                </div>
            </div>
        </div>
        <!--end startbar-collapse-->
    </div>
    <!--end startbar-menu-->
</div>

<!--end startbar-->
<div class="startbar-overlay d-print-none"></div>
<!-- end leftbar-tab-menu-->
