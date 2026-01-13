<?php

    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    session_start();

    require_once('./../../../backend/function/function.php');
    $role="ADMIN";

    //================== gerer les session 
    if(requireRole($role)==="Accès interdit"){
        header("Location: ./../../../index.php");
        session_destroy();
    }

    //=========== verifier l'abonnement de cet entreprise
    $url="./../../../index.php";
    abonnement($url);

    //================== fetch les produits
    $clients=getApi('/api/partners/') ?? [];
    if (!is_array($clients)) {
      echo "<div class='alert alert-danger'>API error</div>";
      $clients = [];
    } 
include "../../../includes/header.php";
include "../../../includes/sidebar.php";

?>

<!-- Page Content Start -->
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Rapports & Statistiques</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Rapports</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filtres de Rapport -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="dateDebut" class="form-label">Date Début</label>
                                        <input type="date" class="form-control" id="dateDebut"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="dateFin" class="form-label">Date Fin</label>
                                        <input type="date" class="form-control" id="dateFin"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="typeRapport" class="form-label">Type de Rapport</label>
                                        <select class="form-select" id="typeRapport">
                                            <option value="ventes">Ventes</option>
                                            <option value="depenses">Dépenses</option>
                                            <option value="stock">Stock</option>
                                            <option value="clients">Clients</option>
                                            <option value="complet">Complet</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-3 d-flex align-items-end">
                                        <button class="btn btn-primary me-2" onclick="genererRapport()">
                                            <i class="las la-filter me-1"></i> Filtrer
                                        </button>
                                        <button class="btn btn-success" onclick="exporterRapport()">
                                            <i class="las la-file-export me-1"></i> Exporter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques Principales -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
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
                                        <i class="iconoir-dollar-circle fs-22 align-self-center mb-0 text-primary"></i>
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
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">
                                        Ventes du Mois
                                    </p>
                                    <h4 class="mt-1 mb-0 fw-medium">300 <small>commandes</small></h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-success rounded mx-auto">
                                        <i class="iconoir-cart fs-22 align-self-center mb-0 text-success"></i>
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
                <div class="col-xl-3 col-md-6">
                       <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">
                                        Dépenses
                                    </p>
                                    <h4 class="mt-1 mb-0 fw-medium">300000 FBU </h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-warning rounded mx-auto">
                                        <i class="iconoir-wallet fs-22 align-self-center mb-0 text-warning"></i>
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
                <div class="col-xl-3 col-md-6">
                      <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">
                                        Bénéfice Net
                                    </p>
                                    <h4 class="mt-1 mb-0 fw-medium">300000 FBU </h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-warning rounded mx-auto">
                                        <i class="iconoir-graph-up fs-22 align-self-center mb-0 text-warning"></i>
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
            </div>

            <!-- Graphiques Principaux -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Évolution des Ventes & Dépenses</h4>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="icofont-calendar fs-5 me-1"></i> Année 2024
                                            <i class="las la-angle-down ms-1"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Ce
                                                Mois</a>
                                            <a class="dropdown-item" href="#">Ce
                                                Trimestre</a>
                                            <a class="dropdown-item" href="#">Cette
                                                Année</a>
                                            <a class="dropdown-item" href="#">Personnalisé</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="reports"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Répartition des Ventes</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="balance"></div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="text-center">
                                        <p class="text-muted mb-1">Produits</p>
                                        <h5 class="mb-0">72%</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <p class="text-muted mb-1">Services</p>
                                        <h5 class="mb-0">28%</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tableaux de Données -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Top 5 Produits</h4>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-outline-primary" onclick="exporterCSV('produits')">
                                        <i class="las la-download me-1"></i> CSV
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Produit</th>
                                            <th class="text-center">Ventes</th>
                                            <th class="text-end">Revenu</th>
                                            <th class="text-center">Marge</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-xs">
                                                            <span
                                                                class="avatar-title bg-primary-subtle text-primary rounded">
                                                                <i class="iconoir-box"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Ordinateur</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-primary-subtle text-primary">20</span>
                                            </td>
                                            <td class="text-end fw-semibold">
                                                1200000 FBU
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-success-subtle text-success">30%</span>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-end">
                                                <a href="<?= BASE_URL ?>public/admin/produits/"
                                                    class="btn btn-sm btn-link">
                                                    Voir tous les produits
                                                </a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Top 5 Clients</h4>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-outline-primary" onclick="exporterCSV('clients')">
                                        <i class="las la-download me-1"></i> CSV
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Client</th>
                                            <th class="text-center">Commandes</th>
                                            <th class="text-end">Montant Total</th>
                                            <th class="text-center">Dernière</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-xs">
                                                            <span
                                                                class="avatar-title bg-success-subtle text-success rounded-circle">
                                                                <i class="iconoir-user"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Calvin</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-info-subtle text-info">15</span>
                                            </td>
                                            <td class="text-end fw-semibold">
                                                1500000 FBU
                                            </td>
                                            <td class="text-center">
                                                15/06/2024
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-end">
                                                <a href="<?= BASE_URL ?>public/admin/clients/"
                                                    class="btn btn-sm btn-link">
                                                    Voir tous les clients
                                                </a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rapports Détails -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Rapport Détail des Ventes</h4>
                                </div>
                                <div class="col-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                            data-bs-toggle="dropdown">
                                            <i class="las la-print me-1"></i> Imprimer
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Format
                                                A4</a>
                                            <a class="dropdown-item" href="#">Format
                                                A3</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Générer PDF</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tableau-rapport">
                                    <thead>
                                        <tr class="bg-light">
                                            <th>Date</th>
                                            <th>Référence</th>
                                            <th>Client</th>
                                            <th>Produit</th>
                                            <th class="text-end">Quantité</th>
                                            <th class="text-end">Prix Unitaire</th>
                                            <th class="text-end">Total</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>12/13/2021</td>
                                            <td>V-2024-001</td>
                                            <td>Client 1</td>
                                            <td>Produit A</td>
                                            <td class="text-end">5</td>
                                            <td class="text-end">100.000 FBU</td>
                                            FBU</td>
                                            <td class="text-end fw-bold">10000 FBU
                                            </td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success">
                                                    Payé
                                                </span>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot class="table-light">
                                        <tr>
                                            <td colspan="6" class="text-end fw-bold">Total Général:</td>
                                            <td class="text-end fw-bold">12.845.000 FBU</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="alert alert-info">
                                        <h5 class="alert-heading"><i class="las la-info-circle me-2"></i>Informations
                                        </h5>
                                        <p class="mb-0">Ce rapport inclut toutes les ventes effectuées pendant la
                                            période sélectionnée.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button class="btn btn-primary" onclick="exporterExcel()">
                                            <i class="las la-file-excel me-1"></i> Exporter Excel
                                        </button>
                                        <button class="btn btn-success" onclick="exporterPDF()">
                                            <i class="las la-file-pdf me-1"></i> Exporter PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal d'Export -->
            <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exportModalLabel">Options d'Export</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exportFormat" class="form-label">Format</label>
                                <select class="form-select" id="exportFormat">
                                    <option value="csv">CSV (Excel)</option>
                                    <option value="pdf">PDF</option>
                                    <option value="excel">Excel (XLSX)</option>
                                    <option value="json">JSON</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exportDateRange" class="form-label">Période</label>
                                <select class="form-select" id="exportDateRange">
                                    <option value="mois">Ce mois</option>
                                    <option value="trimestre">Ce trimestre</option>
                                    <option value="annee" selected>Cette année</option>
                                    <option value="personnalise">Personnalisé</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Inclure</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeStats" checked>
                                    <label class="form-check-label" for="includeStats">Statistiques</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeGraphs" checked>
                                    <label class="form-check-label" for="includeGraphs">Graphiques</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeDetails" checked>
                                    <label class="form-check-label" for="includeDetails">Détails</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-primary" onclick="confirmerExport()">Exporter</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $pageLibs = [
                
                LIBS_URL . "apexcharts/apexcharts.min.js",
                JS_URL . "pages/index.init.js",
                LIBS_URL . "simple-datatables/umd/simple-datatables.js",
                JS_URL . "pages/datatables.init.js"
            ];
            include "../../../includes/footer.php"; ?>