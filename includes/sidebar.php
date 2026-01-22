<?php
// includes/sidebar.php
require_once 'menu_functions.php';
?>

<!-- leftbar-tab-menu -->
<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="<?php echo BASE_URL; ?>" class="logo">
            <span>

                E-Kigega
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
                        class="update-icon-box rounded-circle mx-auto d-flex justify-content-center align-items-center">
                        <img src="<?= IMAGES_URL ?>logos/ekigega-logo1.png" alt="E-Kigega Logo" class="logo-img" />
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

<style>
    .logo {
        font-family: 'Helvetica Neue',
            Helvetica,
            Arial,
            sans-serif;
        font-size: 26px;
        font-weight: 300;
        letter-spacing: 0.35em;
        text-transform: uppercase;
        white-space: nowrap;

        background: linear-gradient(135deg, #0066FF, #00D4FF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

        transition: all 0.3s ease;
    }


    /* Texte complet quand menu élargi */
    .startbar .brand .logo span {

        transition: all 0.3s;
        white-space: nowrap;
        overflow: hidden;
    }

    /* Menu réduit → afficher seulement "E" */
    .startbar:not(:hover) .brand .logo span {
        font-size: 25px;
        width: 1ch;
        /* ne garde qu'un caractère */
        display: inline-block;
        justify-content: center;
    }

    .update-icon-box {
        width: 150px;
        /* largeur du cercle */
        height: 150px;
        /* hauteur = largeur pour faire un cercle parfait */
        background-color: #f8f9fa;
        /* bg-light équivalent */
        border-radius: 50%;
        /* cercle */
        overflow: hidden;
        /* pour que l'image ne dépasse pas */
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        /* centre horizontalement */
    }

    /* Ajuster l'image */
    .update-icon-box img.logo-img {
        width: 80%;
        /* ou height: 80% si tu veux respecter hauteur */
        height: auto;
        object-fit: cover;
        /* pour que l'image garde ses proportions */
        border-radius: 50%;
        /* optionnel si tu veux que l'image soit aussi ronde */
    }
</style>