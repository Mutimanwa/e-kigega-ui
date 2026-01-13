<?php 
include_once "includes/header.php";
include_once "includes/sidebar.php";

$maintenances = [
    ["id"=>1, "equipement"=>"Serveur principal", "type"=>"Hardware", "description"=>"Redémarrage programmé", "statut"=>"En cours", "date"=>"2026-01-12 08:00"],
    ["id"=>2, "equipement"=>"Base de données", "type"=>"Software", "description"=>"Mise à jour SQL", "statut"=>"Terminé", "date"=>"2026-01-11 14:30"],
    ["id"=>3, "equipement"=>"Routeur réseau", "type"=>"Network", "description"=>"Contrôle de bande passante", "statut"=>"En attente", "date"=>"2026-01-13 09:00"],
];
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Maintenance</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMaintenance">
                        <i class="fas fa-plus me-1"></i> Ajouter Maintenance
                    </button>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Équipement</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Statut</th>
                                    <th>Date & Heure</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($maintenances as $m): ?>
                                <tr>
                                    <td><?= htmlspecialchars($m['equipement']) ?></td>
                                    <td><?= htmlspecialchars($m['type']) ?></td>
                                    <td><?= htmlspecialchars($m['description']) ?></td>
                                    <td>
                                        <?php
                                        $statusClass = match($m['statut']) {
                                            "En cours" => "bg-warning-subtle text-warning",
                                            "Terminé" => "bg-success-subtle text-success",
                                            "En attente" => "bg-secondary-subtle text-secondary",
                                            default => "bg-light text-dark"
                                        };
                                        ?>
                                        <span class="badge rounded <?= $statusClass ?>"><?= $m['statut'] ?></span>
                                    </td>
                                    <td><?= date("d-m-Y H:i", strtotime($m['date'])) ?></td>
                                    <td class="text-end">
                                        <a href="#" class="edit-maintenance" data-bs-toggle="modal" data-bs-target="#editMaintenance" data-id="<?= $m['id'] ?>">
                                            <i class="las la-pen text-secondary fs-18" title="Modifier"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <i class="las la-trash-alt text-secondary fs-18" title="Supprimer"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2 d-flex justify-content-between align-items-center">
                        <button class="btn btn-primary">Ajouter Maintenance</button>
                        <ul class="pagination mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal exemple pour ajouter une maintenance -->
<div class="modal fade" id="addMaintenance" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une maintenance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Équipement</label>
                    <input type="text" class="form-control" placeholder="Nom de l'équipement">
                </div>
                <div class="mb-2">
                    <label>Type</label>
                    <select class="form-select">
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Network</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Description de la maintenance"></textarea>
                </div>
                <div class="mb-2">
                    <label>Statut</label>
                    <select class="form-select">
                        <option>En attente</option>
                        <option>En cours</option>
                        <option>Terminé</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label>Date & Heure</label>
                    <input type="datetime-local" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </form>
    </div>
</div>


<?php 
include_once "includes/footer.php";
?>