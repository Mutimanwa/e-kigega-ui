<?php 
include_once "includes/header.php";
include_once "includes/sidebar.php";

$logs = [
    ["id"=>1, "user"=>"Audry Wakanda", "action"=>"Connexion", "module"=>"Dashboard", "date"=>"2026-01-12 08:32"],
    ["id"=>2, "user"=>"Jean Claude", "action"=>"Création d'un utilisateur", "module"=>"Utilisateurs", "date"=>"2026-01-12 09:10"],
    ["id"=>3, "user"=>"Audry Wakanda", "action"=>"Modification d'un rôle", "module"=>"Rôles", "date"=>"2026-01-12 10:45"],
];
?>

<div class="container-fluid mt-4">
       <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Gestion des journales du système</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">E-kigega</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item"><a href="#">Super Admin</a>
                        </li>
                        <li class="breadcrumb-item active">Journales du système</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Journal système</h4>
                    <button class="btn btn-primary" onclick="location.reload();"><i class="fas fa-sync me-1"></i> Actualiser</button>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="datatable_2">
                            <thead class="table-light">
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Action</th>
                                    <th>Module</th>
                                    <th>Date et heure</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($logs as $log): ?>
                                <tr>
                                    <td><?= htmlspecialchars($log['user']) ?></td>
                                    <td><?= htmlspecialchars($log['action']) ?></td>
                                    <td><?= htmlspecialchars($log['module']) ?></td>
                                    <td><?= date("d-m-Y H:i", strtotime($log['date'])) ?></td>
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
    include_once "includes/footer.php";
    ?>