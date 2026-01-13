<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Entreprises et Abonnement</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">E-kigega</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">Entreprises
                        </li><!--end nav-item-->

                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="card bg-globe-img">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fs-16 fw-semibold">Revenus mensuels</span>
                    </div>

                    <h4 class="my-2 fs-24 fw-semibold">
                        12 256 900 <small class="font-14">Fbu</small>
                    </h4>

                    <p class="mb-0 text-muted fw-semibold">
                        <span class="text-success">
                            <i class="fas fa-arrow-up me-1"></i> +8.4%
                        </span>
                        par rapport au mois précédent
                    </p>
                </div>
            </div>
        </div>

       <div class="col-md-12 col-lg-8">
    <div class="row">

        <!-- Total entreprises -->
        <div class="col-lg-4">
            <div class="card bg-corner-img">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-muted text-uppercase mb-0 fs-13">
                                Entreprises enregistrées
                            </p>
                            <h4 class="mt-1 mb-0 fw-medium">86</h4>
                        </div>
                        <div class="col-3">
                            <div class="thumb-md border-dashed rounded text-center">
                                <i class="iconoir-building fs-22 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Entreprises actives -->
        <div class="col-lg-4">
            <div class="card bg-corner-img">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-muted text-uppercase mb-0 fs-13">
                                Entreprises actives
                            </p>
                            <h4 class="mt-1 mb-0 fw-medium">80</h4>
                        </div>
                        <div class="col-3">
                            <div class="thumb-md border-dashed rounded text-center">
                                <i class="iconoir-check-circle fs-22 text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Taux d'activation -->
        <div class="col-lg-4">
            <div class="card bg-corner-img">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-muted text-uppercase mb-0 fs-13">
                                Taux d’activation
                            </p>
                            <h4 class="mt-1 mb-0 fw-medium">93%</h4>
                        </div>
                        <div class="col-3">
                            <div class="thumb-md border-dashed rounded text-center">
                                <i class="iconoir-graph-up fs-22 text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

    </div><!--end row-->

   <div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="card-title">Entreprises abonnées</h4>
            </div>
        </div>
    </div>

    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Entreprise</th>
                        <th>Secteur</th>
                        <th>Plan</th>
                        <th>Date d’inscription</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                   
                        <tr>
                            <td>Agro Burundi</td>
                            <td>Agriculture</td>
                            <td>
                                <span class="badge bg-info-subtle text-info">
                                    Premium
                                </span>
                            </td>
                            <td>20 Jul 2024'</td>
                            <td>
                                
                                    <span class="badge bg-success-subtle text-success">Actif</span>
                                
                            </td>
                            <td >
                                <a href="#" title="Voir"><i class="iconoir-eye fs-18 text-primary me-2"></i></a>
                                <a href="#" title="Modifier"><i class="iconoir-edit fs-18 text-warning me-2"></i></a>
                                <a href="#" title="Suspendre"><i class="iconoir-trash fs-18 text-danger"></i></a>
                            </td>
                        </tr>
                    
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between mt-3">
            <span class="text-muted fs-13">
                Total : 1 entreprises
            </span>
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><a class="page-link">Précédent</a></li>
                <li class="page-item active"><a class="page-link">1</a></li>
                <li class="page-item"><a class="page-link">2</a></li>
                <li class="page-item"><a class="page-link">Suivant</a></li>
            </ul>
        </div>
    </div>
</div>

</div><!-- container -->

<?php
include_once "includes/footer.php";
?>