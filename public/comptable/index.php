<?php

    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    session_start();

    require_once('./../../backend/function/function.php');

    $role = "COMPTABLE";
    $entreprise = $_SESSION['entreprise'] ?? null;

    // Vérifier l’accès
    if (requireRole($role) === "Accès interdit") {
        session_destroy();
        header("Location: ./../../index.php?error=Acces_interdit");
        exit;
    }

    // Vérifier l’abonnement (SUPER_ADMIN n’en a pas besoin)
    if ($_SESSION['role'] !== "SUPER_ADMIN") {
        abonnement("./../../index.php", $entreprise);
    }

    // Inclure le menu et header
    include "../../includes/header.php";
    include "../../includes/sidebar.php";

?>


<!-- Page Content Start -->
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Tableau de Bord</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                                <li class="breadcrumb-item"><a href="#">Comptable</a></li>
                                <!--end nav-item-->
                                <li class="breadcrumb-item active">Tableau de Bord</li>
                            </ol>
                        </div>
                    </div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
             <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-welcome-img overflow-hidden">
                                <div class="card-body">
                                    <div class="">
                                        <h3 class="text-white fw-semibold fs-20 lh-base">
                                            Bienvenue dans<br />E-Kigega Management
                                        </h3>
                                        <a href="<?= BASE_URL ?>public/comptable/rapports/"
                                            class="btn btn-sm btn-danger">Voir Rapports</a>
                                        <img src="<?= IMAGES_URL ?>extra/fund.png" alt="" class="mb-n4 float-end"
                                            height="107" />
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="card bg-globe-img">
                                <div class="card-body">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fs-16 fw-semibold">Caisse – Dépenses</span>
                                         
                                        </div>

                                        <h4 class="my-2 fs-24 fw-semibold">
                                            12.256.920 <small class="font-14">FBU</small>
                                        </h4>
                                        <p class="mb-3 text-muted fw-semibold">
                                            <span class="text-success"><i class="fas fa-arrow-up me-1"></i>8.5%</span>
                                            Croissance mensuelle
                                        </p>
                                        <a href="<?= BASE_URL ?>public/comptable/rapports/"><button type="button" class="btn btn-soft-warning" data-bs-toggle="modal"
                                            data-bs-target="#transferModal">
                                            Benéfices
                                        </button></a>
                                        <a href="<?= BASE_URL ?>public/comptable/depenses/" class="btn btn-soft-danger">
                                            Dépenses
                                        </a>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->
                <div class="col-lg-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="card bg-corner-img">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-9">
                                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">
                                                Chiffre d'Affaires
                                            </p>
                                            <h4 class="mt-1 mb-0 fw-medium">8.365.000 FBU</h4>
                                        </div>
                                        <!--end col-->
                                        <div class="col-3 align-self-center">
                                            <div
                                                class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                                <i
                                                    class="iconoir-dollar-circle fs-22 align-self-center mb-0 text-primary"></i>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-lg-6">
                            <div class="card bg-corner-img">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-9">
                                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">
                                               Ventes du Mois
                                            </p>
                                            <h4 class="mt-1 mb-0 fw-medium">722</h4>
                                        </div>
                                        <!--end col-->
                                        <div class="col-3 align-self-center">
                                            <div
                                                class="d-flex justify-content-center align-items-center thumb-md border-dashed border-info rounded mx-auto">
                                                <i class="iconoir-cart fs-22 align-self-center mb-0 text-info"></i>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-lg-6">
                            <div class="card bg-corner-img">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-9">
                                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">
                                                Produits Stock
                                            </p>
                                            <h4 class="mt-1 mb-0 fw-medium">181</h4>
                                        </div>
                                        <!--end col-->
                                        <div class="col-3 align-self-center">
                                            <div
                                                class="d-flex justify-content-center align-items-center thumb-md border-dashed border-warning rounded mx-auto">
                                                <i class="iconoir-box fs-22 align-self-center mb-0 text-warning"></i>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->

                        <div class="col-md-6 col-lg-6">
                            <div class="card bg-corner-img">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-9">
                                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">
                                                Fournisseurs
                                            </p>
                                            <h4 class="mt-1 mb-0 fw-medium">2</h4>
                                        </div>
                                        <!--end col-->
                                        <div class="col-3 align-self-center">
                                            <div
                                                class="d-flex justify-content-center align-items-center thumb-md border-dashed border-danger rounded mx-auto">
                                                <i class="iconoir-user fs-22 align-self-center mb-0 text-danger"></i>

                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

             <div class="row justify-content-center">
                <div class="col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Performances Mensuelles</h4>
                                </div>
                                <!--end col-->
                                <div class="col-auto">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icofont-calendar fs-5 me-1"></i> Ce Mois
                                            <i class="las la-angle-down ms-1"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Aujourd'hui</a>
                                            <a class="dropdown-item" href="#">Semaine dernière</a>
                                            <a class="dropdown-item" href="#">Mois dernier</a>
                                            <a class="dropdown-item" href="#">Cette année</a>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-header-->
                        <div class="card-body pt-0">
                            <div id="reports" class="apex-charts pill-bar"></div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Flux de Trésorerie</h4>
                                </div>
                                <!--end col-->
                                <div class="col-auto">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icofont-calendar fs-5 me-1"></i>
                                            Hebdomadaire<i class="las la-angle-down ms-1"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Aujourd'hui</a>
                                            <a class="dropdown-item" href="#">Hebdomadaire</a>
                                            <a class="dropdown-item" href="#">Mensuel</a>
                                            <a class="dropdown-item" href="#">Annuel</a>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-header-->
                        <div class="card-body pt-0">
                            <div id="cashflow" class="apex-charts"></div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="text-center">
                                        <p class="text-muted text-uppercase mb-0 fw-medium fs-13">
                                            Revenus
                                        </p>
                                        <h5 class="mt-1 mb-0 fw-medium">76%</h5>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-4">
                                    <div class="text-center">
                                        <p class="text-muted text-uppercase mb-0 fw-medium fs-13">
                                            Dépenses
                                        </p>
                                        <h5 class="mt-1 mb-0 fw-medium">23%</h5>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-4">
                                    <div class="text-center">
                                        <p class="text-muted text-uppercase mb-0 fw-medium fs-13">
                                            Autres
                                        </p>
                                        <h5 class="mt-1 mb-0 fw-medium">1%</h5>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="text-center mx-auto">
                                <img src="<?= IMAGES_URL ?>extra/rabit.png" alt="" class="d-inline-block"
                                    height="105" />
                            </div>
                            <div class="card-bg position-relative z-0">
                                <div class="p-3 bg-primary-subtle rounded position-relative">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="flex-shrink-0 bg-primary-subtle text-primary thumb-lg rounded-circle">
                                            <i class="iconoir-bright-star fs-3"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="my-0 fw-normal text-dark fs-13 mb-0">
                                                Vous avez 1.530.000 FBU restant...<a
                                                    href="<?= BASE_URL ?>public/comptable/rapports/"
                                                    class="text-primary fw-medium mb-0 text-decoration-underline">Voir
                                                    Détails</a>
                                            </h6>
                                        </div>
                                        <!--end media-body-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Top Produits</h4>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr class="">
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="me-2 align-self-center thumb-sm bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="iconoir-box fs-14"></i>
                                                    </div>
                                                    <h6 class="m-0 text-truncate">Ordinateurs</h6>
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 text-end">
                                                <span class="text-body ps-2 align-self-center text-end fw-medium">42
                                                    <span
                                                        class="badge rounded text-success bg-success-subtle">+15%</span></span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                        <tr class="">
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="me-2 align-self-center thumb-sm bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="iconoir-mobile fs-14"></i>
                                                    </div>
                                                    <h6 class="m-0 text-truncate">Téléphones</h6>
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 text-end">
                                                <span class="text-body ps-2 align-self-center text-end fw-medium">38
                                                    <span
                                                        class="badge rounded text-success bg-success-subtle">+9%</span></span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                        <tr class="">
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="me-2 align-self-center thumb-sm bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="iconoir-headset fs-14"></i>
                                                    </div>
                                                    <h6 class="m-0 text-truncate">Accessoires</h6>
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 text-end">
                                                <span class="text-body ps-2 align-self-center text-end fw-medium">28
                                                    <span
                                                        class="badge rounded text-danger bg-danger-subtle">-2%</span></span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                        <tr class="">
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="me-2 align-self-center thumb-sm bg-purple-subtle text-purple rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="iconoir-printer fs-14"></i>
                                                    </div>
                                                    <h6 class="m-0 text-truncate">Imprimantes</h6>
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 text-end">
                                                <span class="text-body ps-2 align-self-center text-end fw-medium">24
                                                    <span
                                                        class="badge rounded text-success bg-success-subtle">+8%</span></span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                        <tr class="">
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="me-2 align-self-center thumb-sm bg-danger-subtle text-danger rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="iconoir-network-left fs-14"></i>
                                                    </div>
                                                    <h6 class="m-0 text-truncate">Réseau</h6>
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 text-end">
                                                <span class="text-body ps-2 align-self-center text-end fw-medium">18
                                                    <span
                                                        class="badge rounded text-success bg-success-subtle">+5%</span></span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                        <tr class="">
                                            <td class="px-0 pb-0">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="me-2 align-self-center thumb-sm bg-secondary-subtle text-secondary rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="iconoir-hard-drive fs-14"></i>
                                                    </div>
                                                    <h6 class="m-0 text-truncate">Stockage</h6>
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 pb-0 text-end">
                                                <span class="text-body ps-2 align-self-center text-end fw-medium">15
                                                    <span
                                                        class="badge rounded text-danger bg-danger-subtle">-1%</span></span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                            <!--end /div-->
                            <hr class="hr-dashed" />
                            <div class="row">
                                <div class="col-lg-6 text-center">
                                    <div class="p-2 border-dashed border-theme-color rounded">
                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">
                                            Meilleur Vente
                                        </p>
                                        <h5 class="mt-1 mb-0 fw-medium text-success">
                                            42 unités
                                        </h5>
                                        <small>Ordinateurs</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6 text-center">
                                    <div class="p-2 border-dashed border-theme-color rounded">
                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">
                                            Moins Vendu
                                        </p>
                                        <h5 class="mt-1 mb-0 fw-medium text-danger">
                                            15 unités
                                        </h5>
                                        <small>Stockage</small>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 order-2 order-lg-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">État des Stocks</h4>
                                </div>
                                <!--end col-->
                                <div class="col-auto">
                                    <div class="p-2 border-dashed border-theme-color rounded">
                                        <h5 class="mt-1 mb-0 fw-medium">181</h5>
                                        <small class="text-muted">Produits</small>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="card-body pt-0">
                            <div id="balance" class="apex-charts"></div>
                            <div class="bg-light py-3 px-2 mb-0 mt-3 text-center rounded">
                                <h6 class="mb-0">
                                    <i class="icofont-calendar fs-5 me-1"></i> 01 Janvier 2024
                                    au 31 Décembre 2024
                                </h6>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-md-12 col-lg-6 order-1 order-lg-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Dernières Transactions</h4>
                                </div>
                                <!--end col-->
                                <div class="col-auto">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icofont-calendar fs-5 me-1"></i> Ce Mois
                                            <i class="las la-angle-down ms-1"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Aujourd'hui</a>
                                            <a class="dropdown-item" href="#">Semaine dernière</a>
                                            <a class="dropdown-item" href="#">Mois dernier</a>
                                            <a class="dropdown-item" href="#">Cette année</a>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                               <th>Client</th>
                                            <th>Produit</th>
                                            <th>Quantité</th>
                                            <th>Prix de vente</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                           
                                        </tr>
                                        <!--end tr-->
                                    </thead>
                                   <tbody>
                                        <tr>
                                            <td>Fer</td>
                                            <td>Aluminium</td>
                                            <td>10</td>
                                            <td>12000 FBu</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <span class="badge rounded text-warning bg-warning-subtle">
                                                    En attente
                                                </span>
                                            </td>

                                          
                                        </tr>
                                        <tr>
                                            <td>Jean</td>
                                            <td>Ordinateur</td>
                                            <td>5</td>
                                            <td>12000 FBu</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <span class="badge rounded text-success bg-success-subtle">
                                                    Payée
                                                </span>
                                            </td>

                                           
                                        </tr>
                                        <tr>
                                            <td>Marie</td>
                                            <td>Smartphone</td>
                                            <td>8</td>
                                            <td>12000 FBu</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <span class="badge rounded text-info bg-info-subtle">
                                                    Paiement partiel
                                                </span>
                                            </td>

                                           
                                        </tr>
                                        <tr>
                                            <td>Paul</td>
                                            <td>Tablette</td>
                                            <td>3</td>
                                            <td>12000 FBu</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <span class="badge rounded text-danger bg-danger-subtle">
                                                    Annulée
                                                </span>
                                            </td>

                                           
                                        </tr>
                                        <tr>
                                            <td>Lucie</td>
                                            <td>Imprimante</td>
                                            <td>2</td>
                                            <td>12000 FBu</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <span class="badge rounded text-primary bg-primary-subtle">
                                                    Remboursée
                                                </span>
                                            </td>

                                           
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                            <!--end /div-->
                            <div class="text-center mt-3">
                                <a href="<?= BASE_URL ?>public/comptable/ventes/" class="btn btn-warning">Voir toutes les
                                    ventes</a>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-md-6 col-lg-3 order-3 order-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Clients Fréquents</h4>
                                </div>
                                <!--end col-->
                                <div class="col-auto">
                                    <a href="<?= BASE_URL ?>public/comptable/clients/" class="btn btn-light">
                                        <i class="icofont-contact-add fs-5 me-1"></i> Nouveau
                                    </a>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr class="">
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    
                                                    <div class="flex-grow-1 text-truncate">
                                                        <h6 class="m-0 text-truncate">Dorian axcelle</h6>
                                                        <a href="#"
                                                            class="font-12 text-muted text-decoration-underline">8
                                                            commandes</a>
                                                    </div>
                                                    <!--end media body-->
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 text-end">
                                                <span
                                                    class="text-primary ps-2 align-self-center text-end fw-medium">3.325.000</span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                        <tr class="">
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    
                                                    <div class="flex-grow-1 text-truncate">
                                                        <h6 class="m-0 text-truncate">Audry Wakanda</h6>
                                                        <a href="#"
                                                            class="font-12 text-muted text-decoration-underline">6
                                                            commandes</a>
                                                    </div>
                                                    <!--end media body-->
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 text-end">
                                                <span
                                                    class="text-primary ps-2 align-self-center text-end fw-medium">2.548.000</span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                        <tr class="">
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                   
                                                    <div class="flex-grow-1 text-truncate">
                                                        <h6 class="m-0 text-truncate">Calvin Mkamba </h6>
                                                        <a href="#"
                                                            class="font-12 text-muted text-decoration-underline">5
                                                            commandes</a>
                                                    </div>
                                                    <!--end media body-->
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 text-end">
                                                <span
                                                    class="text-primary ps-2 align-self-center text-end fw-medium">2.985.000</span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                        <tr class="">
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    
                                                    <div class="flex-grow-1 text-truncate">
                                                        <h6 class="m-0 text-truncate">Onile orlando</h6>
                                                        <a href="#"
                                                            class="font-12 text-muted text-decoration-underline">4
                                                            commandes</a>
                                                    </div>
                                                    <!--end media body-->
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 text-end">
                                                <span
                                                    class="text-primary ps-2 align-self-center text-end fw-medium">1.845.000</span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                   
                                                    <div class="flex-grow-1 text-truncate">
                                                        <h6 class="m-0 text-truncate">Kenny CB</h6>
                                                        <a href="#"
                                                            class="font-12 text-muted text-decoration-underline">3
                                                            commandes</a>
                                                    </div>
                                                    <!--end media body-->
                                                </div>
                                                <!--end media-->
                                            </td>
                                            <td class="px-0 text-end">
                                                <span
                                                    class="text-primary ps-2 align-self-center text-end fw-medium">1.422.000</span>
                                            </td>
                                        </tr>
                                        <!--end tr-->
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                            <!--end /div-->
                            <div class="text-center mt-3">
                                <a href="<?= BASE_URL ?>public/comptable/clients/"
                                    class="btn btn-outline-warning btn-sm">Voir tous les clients</a>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <!-- Modal pour transfert -->
            <div class="modal fade" id="transferModal" tabindex="-1" aria-labelledby="transferModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="transferModalLabel">Transfert de Fonds</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="transferForm">
                                <div class="mb-3">
                                    <label for="fromAccount" class="form-label">De</label>
                                    <select class="form-select" id="fromAccount" required>
                                        <option value="">Sélectionner le compte source</option>
                                        <option value="main">Caisse Principale</option>
                                        <option value="secondary">Caisse Secondaire</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="toAccount" class="form-label">À</label>
                                    <select class="form-select" id="toAccount" required>
                                        <option value="">Sélectionner le compte destination</option>
                                        <option value="main">Caisse Principale</option>
                                        <option value="secondary">Caisse Secondaire</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Montant (FBU)</label>
                                    <input type="number" class="form-control" id="amount"
                                        placeholder="Entrer le montant" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" rows="2"
                                        placeholder="Description du transfert"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-warning"
                                onclick="processTransfer()">Transferer</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function processTransfer() {
                    const fromAccount = document.getElementById('fromAccount').value;
                    const toAccount = document.getElementById('toAccount').value;
                    const amount = document.getElementById('amount').value;
                    const description = document.getElementById('description').value;

                    if (!fromAccount || !toAccount || !amount) {
                        alert('Veuillez remplir tous les champs obligatoires');
                        return;
                    }

                    if (fromAccount === toAccount) {
                        alert('Les comptes source et destination doivent être différents');
                        return;
                    }

                    // Simulation de transfert
                    alert(`Transfert de ${amount} FBU de ${fromAccount} à ${toAccount} effectué avec succès!`);
                    $('#transferModal').modal('hide');
                    document.getElementById('transferForm').reset();
                }
            </script>
        </div>
        <!-- container -->

        <!-- page Content end -->

        <?php
        $pageLibs = [
            LIBS_URL . "apexcharts/apexcharts.min.js",
            JS_URL . "pages/index.init.js",
            JS_URL . "DynamicSelect.js"
        ];
        include "../../includes/footer.php";
        ?>