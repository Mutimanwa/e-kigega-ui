<?php include_once __DIR__ . "/../config/constantes.php";
include_once __DIR__ . "/../includes/functions.php";
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr" data-startbar="dark" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <title>E-Kigega</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta
        content="Platefome de gestion finaciere permettant d'accompagner les utilisateurs de la recolte a la commercilisation"
        name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= IMAGES_URL ?>logos/ekigega-logo.png" />

    <!-- App css -->
    <link href="<?= CSS_URL ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= CSS_URL ?>icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= CSS_URL ?>app.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="<?= CSS_URL ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= CSS_URL ?>icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= CSS_URL ?>app.min.css" rel="stylesheet" type="text/css" />

    <!-- datatables -->
    <link href="<?= LIBS_URL ?>simple-datatables/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Top Bar Start -->
    <div class="topbar d-print-none">
        <div class="container-fluid">
            <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li>
                        <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                            <i class="iconoir-menu"></i>
                        </button>
                    </li>
                    <li class="hide-phone app-search">
                        <form role="search" action="#" method="get">
                            <input type="search" name="search" class="form-control top-search mb-0"
                                placeholder="Rechercher..." />
                            <button type="submit"><i class="iconoir-search"></i></button>
                        </form>
                    </li>
                </ul>
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false" data-bs-offset="0,19">
                            <img src="<?= IMAGES_URL ?>flags/french_flag.jpg" alt="" class="thumb-sm rounded-circle">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><img src="<?= IMAGES_URL ?>flags/french_flag.jpg" alt=""
                                    height="15" class="me-2">Français</a>
                            <a class="dropdown-item" href="#"><img src="<?= IMAGES_URL ?>flags/burundi-flag.png" alt=""
                                    height="15" class="me-2">Kirundi</a>
                        </div>
                    </li>
                    <!--end topbar-language-->
                    <!-- theme switcher -->
                    <li class="topbar-item">
                        <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
                            <i class="iconoir-half-moon dark-mode"></i>
                            <i class="iconoir-sun-light light-mode"></i>
                        </a>
                    </li>
                    <!-- notification -->
                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false" data-bs-offset="0,19">
                            <i class="iconoir-bell"></i>
                            <span class="alert-badge"></span>
                        </a>
                        <div class="dropdown-menu stop dropdown-menu-end dropdown-lg py-0">
                            <h5
                                class="dropdown-item-text m-0 py-3 d-flex justify-content-between align-items-center border-bottom">
                                Notifications
                                <a href="#" class="badge text-body-tertiary badge-pill">
                                    <i class="iconoir-plus-circle fs-4"></i>
                                </a>
                            </h5>
                            <!-- Notifications -->
                            <div class="ms-0" style="max-height: 230px" data-simplebar>
                                <div class="tab-content" id="myTabContent">
                                    <div>
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-wolf fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">
                                                        Your order is placed
                                                    </h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing and
                                                        industry.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a><!--end-item-->

                                    </div>
                                </div>
                            </div>
                            <!-- All-->
                            <a href="notifications.php"
                                class="dropdown-item text-center text-dark fs-13 py-2 border-top">
                                View All <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false" data-bs-offset="0,19">
                            <img src="<?= IMAGES_URL ?>users/avatar-1.jpg" alt="" class="thumb-md rounded-circle" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                            <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                                <div class="flex-shrink-0">
                                    <img src="<?= IMAGES_URL ?>users/avatar-1.jpg" alt=""
                                        class="thumb-md rounded-circle" />
                                </div>
                                <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                                    <h6 class="my-0 fw-medium text-dark fs-13">
                                        William Martin
                                    </h6>
                                    <small class="text-muted mb-0">Front End Developer</small>
                                </div>
                                <!--end media-body-->
                            </div>
                            
                            <div class="dropdown-divider mt-0"></div>
                            <small class="text-muted px-2 pb-1 d-block">Account</small>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="las la-user fs-18 me-1 align-text-bottom"></i>
                                Profile</a>
                            <a class="dropdown-item" href="pages-faq.html"><i
                                    class="las la-question-circle fs-18 me-1 align-text-bottom"></i>
                                Centre d'aide</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item text-danger" href="<?= BASE_URL ?>public/login.php"><i
                                    class="las la-power-off fs-18 me-1 align-text-bottom"></i>
                                Déconnexion</a>
                        </div>
                    </li>
                </ul>
                <!--end topbar-nav-->
            </nav>
            <!-- end navbar-->
        </div>
    </div>
    <!-- Top Bar End -->