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
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Journal système</h4>
                    <button class="btn btn-primary" onclick="location.reload();"><i class="fas fa-sync me-1"></i> Actualiser</button>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
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
include_once "includes/footer.php";
?>