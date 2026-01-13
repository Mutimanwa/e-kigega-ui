<?php 
include_once "includes/header.php";
include_once "includes/sidebar.php";
?>
<div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Sauvegarde de Données</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Sauvegarde</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Backup Système</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBackup">
                        <i class="fas fa-cloud-upload-alt me-1"></i> Créer un Backup
                    </button>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Date de Création</th>
                                    <th>Type</th>
                                    <th>Taille</th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>10 Janvier 2026 <span>03:25pm</span></td>
                                    <td>Complet</td>
                                    <td>1.2 GB</td>
                                    <td><span class="badge bg-success-subtle text-success">Succès</span></td>
                                    <td class="text-end">
                                        <a href="#" class="me-2" title="Télécharger">
                                            <i class="las la-download text-secondary fs-18"></i>
                                        </a>
                                        <a href="#" class="me-2" title="Restaurer">
                                            <i class="las la-sync-alt text-secondary fs-18"></i>
                                        </a>
                                        <a href="#" title="Supprimer">
                                            <i class="las la-trash-alt text-danger fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>05 Janvier 2026 <span>10:10am</span></td>
                                    <td>Différentiel</td>
                                    <td>450 MB</td>
                                    <td><span class="badge bg-warning-subtle text-warning">En attente</span></td>
                                    <td class="text-end">
                                        <a href="#" class="me-2" title="Télécharger">
                                            <i class="las la-download text-secondary fs-18"></i>
                                        </a>
                                        <a href="#" class="me-2" title="Restaurer">
                                            <i class="las la-sync-alt text-secondary fs-18"></i>
                                        </a>
                                        <a href="#" title="Supprimer">
                                            <i class="las la-trash-alt text-danger fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>01 Janvier 2026 <span>08:30am</span></td>
                                    <td>Complet</td>
                                    <td>1.1 GB</td>
                                    <td><span class="badge bg-success-subtle text-success">Succès</span></td>
                                    <td class="text-end">
                                        <a href="#" class="me-2" title="Télécharger">
                                            <i class="las la-download text-secondary fs-18"></i>
                                        </a>
                                        <a href="#" class="me-2" title="Restaurer">
                                            <i class="las la-sync-alt text-secondary fs-18"></i>
                                        </a>
                                        <a href="#" title="Supprimer">
                                            <i class="las la-trash-alt text-danger fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <button class="btn btn-outline-primary">Créer Nouveau Backup</button>
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
<!-- Modal Créer Backup -->
<div class="modal fade" id="createBackup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Créer un Backup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="backupType" class="form-label">Type de Backup</label>
                        <select id="backupType" class="form-select">
                            <option value="full">Complet</option>
                            <option value="diff">Différentiel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes (optionnel)</label>
                        <textarea id="notes" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Créer Backup</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
include_once "includes/footer.php";
?>