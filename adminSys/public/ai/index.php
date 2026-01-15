<?php
include_once "./../../includes/header.php";
include_once "./../../includes/sidebar.php";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Gestion de l'IA</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">E-kigega</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item"><a href="#">Super Admin</a>
                        </li>
                        <li class="breadcrumb-item active">l'IA</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted mb-1">Entreprises utilisant l’IA</p>
                    <h4 class="fw-semibold">48 / 86</h4>
                    <span class="text-success fs-12">+12 ce mois</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted mb-1">Actions IA générées</p>
                    <h4 class="fw-semibold">3 284</h4>
                    <span class="text-info fs-12">Ce mois</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted mb-1">Taux d’adoption IA</p>
                    <h4 class="fw-semibold">56%</h4>
                    <span class="text-success fs-12">↗ progression</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted mb-1">Décisions assistées IA</p>
                    <h4 class="fw-semibold">1 042</h4>
                    <span class="text-warning fs-12">Ventes / Stocks</span>
                </div>
            </div>
        </div>

    </div>

    <div class="card">
    <div class="card-header">
        <h4 class="card-title">Utilisation de l’IA par module</h4>
    </div>
    <div class="card-body">
        <table class="table mb-0" id="datatable_2">
            <thead class="table-light">
                <tr>
                    <th>Module</th>
                    <th>Entreprises</th>
                    <th>Actions IA</th>
                    <th>Impact</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Prévision de ventes</td>
                    <td>42</td>
                    <td>1 254</td>
                    <td><span class="badge bg-success-subtle text-success">Élevé</span></td>
                </tr>
                <tr>
                    <td>Gestion de stock</td>
                    <td>38</td>
                    <td>972</td>
                    <td><span class="badge bg-info-subtle text-info">Moyen</span></td>
                </tr>
                <tr>
                    <td>Analyse dépenses</td>
                    <td>29</td>
                    <td>658</td>
                    <td><span class="badge bg-warning-subtle text-warning">Variable</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Impact mesuré de l’IA</h4>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                📉 Réduction des ruptures de stock :
                <strong>−23%</strong>
            </li>
            <li class="list-group-item">
                📈 Augmentation moyenne des ventes :
                <strong>+14%</strong>
            </li>
            <li class="list-group-item">
                💰 Optimisation des dépenses :
                <strong>−9%</strong>
            </li>
            <li class="list-group-item">
                ⏱ Gain de temps opérationnel :
                <strong>−31%</strong>
            </li>
        </ul>
    </div>
</div>
<div class="card border-warning">
    <div class="card-header bg-warning-subtle">
        <h4 class="card-title">Alertes IA</h4>
    </div>
    <div class="card-body">
        <ul>
            <li>
                ⚠️ Stock critique détecté chez
                <strong>Entreprise #A023</strong>
            </li>
            <li>
                ⚠️ Chute anormale des ventes
                <strong>(−18%)</strong> cette semaine
            </li>
            <li>
                ⚠️ Dépenses élevées non justifiées
                <strong>(Fournitures)</strong>
            </li>
        </ul>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Recommandations IA</h4>
    </div>
    <div class="card-body">
        <div class="alert alert-info">
            ➜ Augmenter le stock du produit
            <strong>Riz local 25kg</strong>
            (demande en hausse prévue)
        </div>

        <div class="alert alert-success">
            ➜ Réduction possible des dépenses
            <strong>Transport</strong> de 12%
        </div>

        <div class="alert alert-warning">
            ➜ Former les utilisateurs de
            <strong>Entreprise #B014</strong>
            (faible usage IA)
        </div>
    </div>
</div>

    <?php
$pageLibs = [
    LIBS_URL . 'simple-datatables/umd/simple-datatables.js',
    JS_URL . 'pages/datatables.init.js'
];
include_once "./../../includes/footer.php";
?>
