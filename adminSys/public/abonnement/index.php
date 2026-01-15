<?php
include_once "./../../includes/header.php";
include_once "./../../includes/sidebar.php";

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Abonnements</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                        <li class="breadcrumb-item"><a href="#">Super Admin</a></li>
                        <li class="breadcrumb-item active">Abonnements</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Plans d'Abonnement</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlan">
                    <i class="fas fa-plus me-1"></i> Ajouter un Plan
                </button>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0"  id="datatable_1">
                        <thead class="table-light">
                            <tr>
                                <th>Nom du Plan</th>
                                <th>Prix</th>
                                <th>Durée</th>
                                <th>Modules Inclus</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Plan Basic</td>
                                <td>50.000 Fbu</td>
                                <td>1 Mois</td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary">Comptabilité</span>
                                    <span class="badge bg-success-subtle text-success">Facturation</span>
                                </td>
                                <td>15 Mar 2024</td>
                                <td><span class="badge bg-success-subtle text-success">Actif</span></td>
                                <td class="text-end">
                                    <a href="#" class="me-2 edit-user" title="Modifier" data-bs-toggle="modal" data-bs-target="#editPlan">
                                         <i class="las la-pen  fs-18"
           data-bs-toggle="tooltip"
           data-bs-placement="top"
           title="Modifier"></i>
                                    </a>
                                    <a href="#" title="Supprimer" data-bs-toggle="modal" data-bs-target="#deletePlan">
                                        <i class="las la-trash-alt text-danger fs-18" data-bs-toggle="tooltip"
           data-bs-placement="top"
           title="Supprimer"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Plan Pro</td>
                                <td>120.000 Fbu</td>
                                <td>3 Mois</td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary">Comptabilité</span>
                                    <span class="badge bg-success-subtle text-success">Facturation</span>
                                    <span class="badge bg-warning-subtle text-warning">Rapports Avancés</span>
                                </td>
                                <td>15 Mar 2024</td>
                                <td><span class="badge bg-success-subtle text-success">Actif</span></td>
                                <td class="text-end">
                                    <a href="#" class="me-2 edit-user" title="Modifier" data-bs-toggle="modal" data-bs-target="#editPlan">
                                         <i class="las la-pen  fs-18"
           data-bs-toggle="tooltip"
           data-bs-placement="top"
           title="Modifier"></i>
                                    </a>
                                    <a href="#" title="Supprimer" data-bs-toggle="modal" data-bs-target="#deletePlan">
                                        <i class="las la-trash-alt text-danger fs-18 " data-bs-toggle="tooltip"
           data-bs-placement="top"
           title="Supprimer"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Plan Entreprise</td>
                                <td>350.000 Fbu</td>
                                <td>12 Mois</td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary">Comptabilité</span>
                                    <span class="badge bg-success-subtle text-success">Facturation</span>
                                    <span class="badge bg-warning-subtle text-warning">Rapports Avancés</span>
                                    <span class="badge bg-info-subtle text-info">Support Prioritaire</span>
                                </td>
                                <td>15 Mar 2024</td>
                                <td><span class="badge bg-success-subtle text-success">Actif</span></td>
                                <td class="text-end">
                                    <a href="#" class="me-2 edit-user" title="Modifier" data-bs-toggle="modal" data-bs-target="#editPlan">
                                          <i class="las la-pen  fs-18"
           data-bs-toggle="tooltip"
           data-bs-placement="top"
           title="Modifier"></i>
                                    </a>
                                    <a href="#" title="Supprimer" data-bs-toggle="modal" data-bs-target="#deletePlan">
                                        <i class="las la-trash-alt text-danger fs-18" data-bs-toggle="tooltip"
           data-bs-placement="top"
           title="Supprimer"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

               
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajouter Plan -->
<div class="modal fade" id="addPlan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
               <form>

    <!-- Nom du Plan -->
    <div class="mb-3">
        <label for="planName" class="form-label">Nom du Plan</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-box"></i>
            </span>
            <input type="text" id="planName" class="form-control"
                   placeholder="Ex : Plan Basic">
        </div>
    </div>

    <!-- Prix -->
    <div class="mb-3">
        <label for="planPrice" class="form-label">Prix (Fbu)</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-money-bill-wave"></i>
            </span>
            <input type="number" id="planPrice" class="form-control"
                   placeholder="Ex : 50000">
            <span class="input-group-text">Fbu</span>
        </div>
    </div>

    <!-- Durée -->
    <div class="mb-3">
        <label for="planDuration" class="form-label">Durée</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-clock"></i>
            </span>
            <select id="planDuration" class="form-select">
                <option value="1">1 Mois</option>
                <option value="3">3 Mois</option>
                <option value="12">12 Mois</option>
            </select>
        </div>
    </div>

    <!-- Modules Inclus -->
    <div class="mb-3">
        <label for="planModules" class="form-label">Modules Inclus</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-layer-group"></i>
            </span>
            <select id="planModules" class="form-select" multiple>
                <option value="comptabilite">Comptabilité</option>
                <option value="facturation">Facturation</option>
                <option value="rapports">Rapports Avancés</option>
                <option value="support">Support Prioritaire</option>
            </select>
        </div>
        <small class="text-muted">Maintenez Ctrl (Windows) ou Cmd (Mac) pour sélectionner plusieurs</small>
    </div>

    <!-- Bouton -->
    <button type="submit" class="btn btn-primary w-100">
        <i class="fas fa-save me-1"></i> Ajouter Plan
    </button>

</form>

            </div>
        </div>
    </div>
</div>

<!-- Modal Modifier Plan (similaire) -->
<div class="modal fade" id="editPlan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier le Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
               <form>

    <!-- Nom du Plan -->
    <div class="mb-3">
        <label for="editPlanName" class="form-label">Nom du Plan</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-box"></i>
            </span>
            <input type="text" id="editPlanName" class="form-control"
                   value="Plan Basic">
        </div>
    </div>

    <!-- Prix -->
    <div class="mb-3">
        <label for="editPlanPrice" class="form-label">Prix (Fbu)</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-money-bill-wave"></i>
            </span>
            <input type="number" id="editPlanPrice" class="form-control"
                   value="50000">
            <span class="input-group-text">Fbu</span>
        </div>
    </div>

    <!-- Durée -->
    <div class="mb-3">
        <label for="editPlanDuration" class="form-label">Durée</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-clock"></i>
            </span>
            <select id="editPlanDuration" class="form-select">
                <option value="1" selected>1 Mois</option>
                <option value="3">3 Mois</option>
                <option value="12">12 Mois</option>
            </select>
        </div>
    </div>

    <!-- Modules Inclus -->
    <div class="mb-3">
        <label for="editPlanModules" class="form-label">Modules Inclus</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-layer-group"></i>
            </span>
            <select id="editPlanModules" class="form-select" multiple>
                <option value="comptabilite" selected>Comptabilité</option>
                <option value="facturation" selected>Facturation</option>
                <option value="rapports">Rapports Avancés</option>
                <option value="support">Support Prioritaire</option>
            </select>
        </div>
        <small class="text-muted">
            Maintenez Ctrl (Windows) ou Cmd (Mac) pour modifier la sélection
        </small>
    </div>

    <!-- Bouton -->
    <button type="submit" class="btn btn-primary w-100">
        <i class="fas fa-pen me-1"></i> Modifier Plan
    </button>

</form>

            </div>
        </div>
    </div>
</div>

<!-- Modal Supprimer Plan -->
<div class="modal fade" id="deletePlan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer le Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body text-center">
                <p>Êtes-vous sûr de vouloir supprimer ce plan ?</p>
                <button class="btn btn-danger me-2">Supprimer</button>
                <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
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


   <!-- js pour le tooltip -->
    <script>
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>
