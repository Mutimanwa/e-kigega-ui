<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Tableau de bord</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">E-kigega</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">Tableau de bord</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-globe-img">
                <div class="card-body">
                    <div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-16 fw-semibold">Solde global</span>

                        </div>

                        <h4 class="my-2 fs-24 fw-semibold">122.5692.00 <small class="font-14">Fbu</small></h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="p-1 border-dashed border-theme-color rounded">
                                <h5 class="mt-1 mb-0 fw-medium">Entreprises</h5>
                                <h5 class="text-muted">30</h5>
                            </div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div class="p-1 border-dashed border-theme-color rounded">
                                <h5 class="mt-1 mb-0 fw-medium">Utilisateurs</h5>
                                <h5 class="text-muted">80</h5>
                            </div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div class="p-1 border-dashed border-theme-color rounded">
                                <h5 class="mt-1 mb-0 fw-medium">Plan actif</h5>
                                <h5 class="text-muted">3</h5>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-md-6 col-lg-4">
            <div class="card bg-corner-img">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-9">
                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Plan basic</p>
                            <h4 class="mt-1 mb-0 fw-medium">8659.50 Fbu</h4>
                        </div>
                        <!--end col-->
                        <div class="col-3 align-self-center">
                            <div
                                class="d-flex justify-content-center align-items-center thumb-md border-dashed border-danger rounded mx-auto">
                                <i class="iconoir-send-dollars fs-22 align-self-center mb-0 text-danger"></i>
                            </div>
                        </div>
                        <!--end col-->
                    </div>

                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
            <div class="card bg-corner-img">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-9">
                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Plan Normal</p>
                            <h4 class="mt-1 mb-0 fw-medium">5523.50 Fbu</h4>
                        </div>
                        <!--end col-->
                        <div class="col-3 align-self-center">
                            <div
                                class="d-flex justify-content-center align-items-center thumb-md border-dashed border-danger rounded mx-auto">
                                <i class="iconoir-dollar-circle fs-22 align-self-center mb-0 text-danger"></i>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
            <div class="card bg-corner-img">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-9">
                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Plan premuim</p>
                            <h4 class="mt-1 mb-0 fw-medium">450.50 Fbu</h4>
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
        </div><!--end col-->
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Abonnement par version</h4>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div>
                <div class="card-body pt-0">
                    <div id="customers" class="apex-charts"></div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Historique des abonnements</h4>
                            <p class="text-muted mb-0 fs-12">
                                Suivi des abonnements et paiements des entreprises
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle">


                            <thead class="table-light">
                                <tr>
                                    <th>Entreprise</th>
                                    <th>Référence</th>
                                    <th>Plan</th>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>


                            <tbody>


                                <tr>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="logos/company.png" class="me-2 rounded" height="36"
                                                alt="Entreprise">
                                            <div>
                                                <h6 class="mb-0 fs-14">E-Kigega SARL</h6>
                                                <small class="text-muted">Burundi</small>
                                            </div>
                                        </div>
                                    </td>


                                    <td>
                                        <a href="#" class="text-primary fw-medium">
                                            SUB-2024-001
                                        </a>
                                    </td>


                                    <td>
                                        <span class="badge bg-info-subtle text-info">
                                            Plan Pro
                                        </span>
                                    </td>


                                    <td>
                                        20 Juil 2024<br>
                                        <small class="text-muted">15:25</small>
                                    </td>


                                    <td>
                                        <strong>560 USD</strong>
                                    </td>


                                    <td>
                                        <span class="badge bg-success-subtle text-success">
                                            Payé
                                        </span>
                                    </td>

                                    <td class="text-end">
                                        <a href="#" class="text-secondary me-2" title="Voir facture">
                                            <i class="iconoir-eye fs-18"></i>
                                        </a>
                                        <a href="#" class="text-secondary me-2" title="Télécharger">
                                            <i class="iconoir-download fs-18"></i>
                                        </a>
                                        <a href="#" class="text-danger" title="Annuler">
                                            <i class="iconoir-trash fs-18"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div> <!--end col-->

    </div><!--end row-->

</div>
<!-- container -->



<?php
$pageLibs = [
    "assets/libs/apexcharts/apexcharts.min.js",
    "assets/js/pages/payment.init.js"
];
include_once "includes/footer.php";
?>