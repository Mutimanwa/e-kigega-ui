<?php 
include_once "./../../includes/header.php";
include_once "./../../includes/sidebar.php";
$activities =[
    ["id"=>1, "user"=>"Audry Wakanda", "activite"=>"Création d'une entreprise", "detail"=>"Entreprise XYZ ajoutée", "date"=>"2026-01-12 08:50"],
    ["id"=>2, "user"=>"Jean Claude", "activite"=>"Abonnement", "detail"=>"Plan Premium activé pour Entreprise ABC", "date"=>"2026-01-12 09:20"],
    ["id"=>3, "user"=>"Audry Wakanda", "activite"=>"Modification", "detail"=>"Rôle Utilisateur modifié", "date"=>"2026-01-12 10:00"],
];
?>

<div class="container-fluid mt-4">
      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Historique des activités</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">E-Kigega</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item"><a href="#">Super Admin</a>
                        </li>
                        <li class="breadcrumb-item active">Historique des activités</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Détails</h4>
                    <button class="btn btn-warning" onclick="location.reload();"><i class="fas fa-sync me-1"></i> Actualiser</button>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="datatable_2">
                            <thead class="table-light">
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Activité</th>
                                    <th>Détail</th>
                                    <th>Date et heure</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($activities as $act): ?>
                                <tr>
                                    <td><?= htmlspecialchars($act['user']) ?></td>
                                    <td><?= htmlspecialchars($act['activite']) ?></td>
                                    <td><?= htmlspecialchars($act['detail']) ?></td>
                                    <td><?= date("d-m-Y H:i", strtotime($act['date'])) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
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