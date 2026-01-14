<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";

$maintenances = [
    ["id" => 1, "equipement" => "Serveur principal", "type" => "Hardware", "description" => "Redémarrage programmé", "statut" => "En cours", "date" => "2026-01-12 08:00"],
    ["id" => 2, "equipement" => "Base de données", "type" => "Software", "description" => "Mise à jour SQL", "statut" => "Terminé", "date" => "2026-01-11 14:30"],
    ["id" => 3, "equipement" => "Routeur réseau", "type" => "Network", "description" => "Contrôle de bande passante", "statut" => "En attente", "date" => "2026-01-13 09:00"],
];
?>

<div class="container-fluid mt-4">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Gestion des maintenances</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">E-kigega</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item"><a href="#">Super Admin</a>
                        </li>
                        <li class="breadcrumb-item active">Gestion des maintenances</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Details</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMaintenance">
                        <i class="fas fa-plus me-1"></i> Ajouter Maintenance
                    </button>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="datatable_2">
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
                                <?php foreach ($maintenances as $m): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($m['equipement']) ?></td>
                                        <td><?= htmlspecialchars($m['type']) ?></td>
                                        <td><?= htmlspecialchars($m['description']) ?></td>
                                        <td>
                                            <?php
                                            $statusClass = match ($m['statut']) {
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
                                            <a href="#" class="edit-maintenance" data-bs-toggle="modal"
                                                data-bs-target="#editMaintenance" data-id="<?= $m['id'] ?>">
                                                <i class="las la-pen  fs-18" data-bs-toggle="tooltip" title="Modifier"></i>
                                            </a>
                                            <a href="#" class="text-danger delete-btn" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal">
                                                <i class="las la-trash-alt  fs-18" data-bs-toggle="tooltip"
                                                    title="Supprimer"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- #region -->

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
                <!-- Équipement -->
                <div class="mb-3">
                    <label for="equipment" class="form-label">Équipement</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                        <input type="text" id="equipment" class="form-control" placeholder="Nom de l'équipement"
                            value="Serveur Principal" required>
                    </div>
                </div>

                <!-- Type -->
                <div class="mb-3">
                    <label for="maintenanceType" class="form-label">Type</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-tools"></i></span>
                        <select id="maintenanceType" class="form-select" required>
                            <option value="Hardware" selected>Hardware</option>
                            <option value="Software">Software</option>
                            <option value="Network">Network</option>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="maintenanceDesc" class="form-label">Description</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        <textarea id="maintenanceDesc" class="form-control" placeholder="Description de la maintenance"
                            rows="3">Remplacement du disque dur du serveur principal.</textarea>
                    </div>
                </div>

                <!-- Statut -->
                <div class="mb-3">
                    <label for="status" class="form-label">Statut</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                        <select id="status" class="form-select" required>
                            <option value="En attente" selected>En attente</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminé">Terminé</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </form>
    </div>
</div>




<!-- Modal pour modifier une maintenance -->
<div class="modal fade" id="editMaintenance" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier une maintenance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Équipement -->
                <div class="mb-3">
                    <label for="equipment" class="form-label">Équipement</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                        <input type="text" id="equipment" class="form-control" placeholder="Nom de l'équipement"
                            value="Serveur Principal" required>
                    </div>
                </div>

                <!-- Type -->
                <div class="mb-3">
                    <label for="maintenanceType" class="form-label">Type</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-tools"></i></span>
                        <select id="maintenanceType" class="form-select" required>
                            <option value="Hardware" selected>Hardware</option>
                            <option value="Software">Software</option>
                            <option value="Network">Network</option>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="maintenanceDesc" class="form-label">Description</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        <textarea id="maintenanceDesc" class="form-control" placeholder="Description de la maintenance"
                            rows="3">Remplacement du disque dur du serveur principal.</textarea>
                    </div>
                </div>

                <!-- Statut -->
                <div class="mb-3">
                    <label for="status" class="form-label">Statut</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                        <select id="status" class="form-select" required>
                            <option value="En attente" selected>En attente</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminé">Terminé</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </form>
    </div>
</div>


<?php
$pageLibs = [
    LIBS_URL . 'simple-datatables/umd/simple-datatables.js',
    JS_URL . 'pages/datatables.init.js'
];
include_once "includes/footer.php";
?>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el));
</script>