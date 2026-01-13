<?php 
include_once "includes/header.php";
include_once "includes/sidebar.php";
$activities =[
    ["id"=>1, "user"=>"Audry Wakanda", "activite"=>"Création d'une entreprise", "detail"=>"Entreprise XYZ ajoutée", "date"=>"2026-01-12 08:50"],
    ["id"=>2, "user"=>"Jean Claude", "activite"=>"Abonnement", "detail"=>"Plan Premium activé pour Entreprise ABC", "date"=>"2026-01-12 09:20"],
    ["id"=>3, "user"=>"Audry Wakanda", "activite"=>"Modification", "detail"=>"Rôle Utilisateur modifié", "date"=>"2026-01-12 10:00"],
];
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Activités utilisateurs</h4>
                    <button class="btn btn-primary" onclick="location.reload();"><i class="fas fa-sync me-1"></i> Actualiser</button>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
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
include_once "includes/footer.php";
?>