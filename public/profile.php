<?php 
require_once '../includes/header.php';
require_once '../includes/sidebar.php';
?>
<div class="page-wrapper">

<div class="page-content">

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Profil Utilisateur</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Tableau de bord</a></li>
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>public/admin/utilisateurs/">Utilisateurs</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div>                                
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row justify-content-center">
        <div class="col-md-4">
            <!-- Carte Profil -->
            <div class="card">  
                <div class="card-body p-4 rounded text-center img-bg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="mb-3">
                        <span class="badge bg-success">
                            <i class="las la-check-circle me-1"></i> Actif
                        </span>
                    </div>
                </div><!--end card-body-->
                
                <div class="position-relative">
                    <div class="shape overflow-hidden text-card-bg">
                        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="card-body mt-n6">
                    <div class="row align-items-center">                                        
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <div class="position-relative">
                                    <img src="<?= IMAGES_URL ?>users/avatar-5.jpg" alt="" class="rounded-circle img-fluid" width="100">
                                    <div class="position-absolute top-50 start-100 translate-middle">
                                        <div class="thumb-sm border border-3 border-white bg-success rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="las la-user text-white fs-12"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-3 align-self-end"> 
                                    <h5 class="m-0 fs-3 fw-bold">Jean Ndayishimiye</h5>
                                    <p class="text-muted mb-0">Administrateur</p>                                                                                                                                 
                                </div><!--end media body-->
                            </div><!--end media-->
                        </div><!--end col-->
                    </div><!--end row-->
                    
                    <div class="row align-items-center mt-4">                                        
                        <div class="col-lg-12">
                            <div class="mt-3">
                                <div class="text-body mb-2 d-flex align-items-center">
                                    <i class="las la-user-tag fs-18 me-2 text-muted"></i>
                                    <span class="text-body fw-semibold">Rôle:</span> 
                                    <span class="badge bg-primary ms-2">Administrateur</span>
                                </div>                                    
                                
                                <div class="text-muted mb-2 d-flex align-items-center">
                                    <i class="las la-envelope fs-18 me-2"></i>
                                    <span class="text-body fw-semibold">Email:</span>
                                    <a href="mailto:jean.ndayishimiye@example.com" class="text-primary text-decoration-underline ms-2">
                                        jean.ndayishimiye@example.com
                                    </a>
                                </div>
                                
                                <div class="text-body mb-3 d-flex align-items-center">
                                    <i class="las la-phone fs-18 me-2 text-muted"></i>
                                    <span class="text-body fw-semibold">Téléphone:</span> 
                                    <span class="ms-2">+257 79 123 456</span>
                                </div>  
                                
                                <div class="text-body mb-3 d-flex align-items-center">
                                    <i class="las la-calendar fs-18 me-2 text-muted"></i>
                                    <span class="text-body fw-semibold">Date d'inscription:</span> 
                                    <span class="ms-2">15/01/2024</span>
                                </div>                                  
                                
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-primary flex-fill">
                                        <i class="las la-envelope me-1"></i> Envoyer un message
                                    </button> 
                                    <button type="button" class="btn btn-outline-primary flex-fill" onclick="editerProfil()">
                                        <i class="las la-edit me-1"></i> Modifier
                                    </button> 
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->  
            </div><!--end card--> 
            
            <!-- Carte Informations Personnelles -->
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">                      
                            <h4 class="card-title">Informations Personnelles</h4>                      
                        </div><!--end col-->
                        <div class="col-auto">                      
                            <a href="#" class="float-end text-muted d-inline-flex text-decoration-underline" onclick="editerInformations()">
                                <i class="las la-edit-pencil fs-18 me-1"></i>Modifier
                            </a>                      
                        </div><!--end col-->
                    </div><!--end row-->                                  
                </div><!--end card-header-->
                
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-0">                                        
                        <li class="mb-2">
                            <i class="las la-id-card me-2 text-secondary fs-20 align-middle"></i> 
                            <b>Matricule</b> : EMP-2024-001
                        </li>
                        <li class="mb-2">
                            <i class="las la-birthday-cake me-2 text-secondary fs-20 align-middle"></i> 
                            <b>Date de naissance</b> : 15/06/1985
                        </li>
                        <li class="mb-2">
                            <i class="las la-venus-mars me-2 text-secondary fs-20 align-middle"></i> 
                            <b>Genre</b> : Masculin
                        </li>
                        <li class="mb-2">
                            <i class="las la-map-marker me-2 text-secondary fs-20 align-middle"></i> 
                            <b>Adresse</b> : Bujumbura, Burundi
                        </li>
                        <li class="mb-2">
                            <i class="las la-briefcase me-2 text-secondary fs-20 align-middle"></i> 
                            <b>Poste</b> : Gérant Principal
                        </li>
                        <li class="mb-2">
                            <i class="las la-building me-2 text-secondary fs-20 align-middle"></i> 
                            <b>Département</b> : Administration
                        </li>
                        <li class="mb-2">
                            <i class="las la-calendar-check me-2 text-secondary fs-20 align-middle"></i> 
                            <b>Date d'embauche</b> : 01/01/2023
                        </li>
                        <li class="mb-2">
                            <i class="las la-language me-2 text-secondary fs-20 align-middle"></i> 
                            <b>Langues</b> : Français, Kirundi, Anglais
                        </li>
                    </ul> 
                    
                    <!-- Statistiques d'activité -->
                    <div class="row justify-content-center mt-4">
                        <div class="col text-center border-end">
                                            <span class="thumb-md justify-content-center d-flex align-items-center bg-primary text-white rounded-circle mx-auto mb-1">
                                                <i class="las la-sign-in-alt"></i>
                                            </span>
                                            <p class="mb-0 fw-semibold">Dernière connexion</p>
                                            <h6 class="m-0 fw-bold">Aujourd'hui</h6>
                                            <small class="text-muted">10:45 AM</small>
                                        </div><!--end col-->
                                        <div class="col text-center">
                                            <span class="thumb-md justify-content-center d-flex align-items-center bg-success text-white rounded-circle mx-auto mb-1">
                                                <i class="las la-tasks"></i>
                                            </span>
                                            <p class="mb-0 fw-semibold">Tâches complétées</p>
                                            <h6 class="m-0 fw-bold">156</h6>
                                            <small class="text-muted">Ce mois</small>
                                        </div><!--end col-->
                    </div><!--end row-->       
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div><!--end col--> 
        
        <div class="col-md-8">
            <!-- Onglets -->
            <ul class="nav nav-tabs mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link fw-medium active" data-bs-toggle="tab" href="#activites" role="tab" aria-selected="true">
                        <i class="las la-history me-1"></i> Activités récentes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" data-bs-toggle="tab" href="#permissions" role="tab" aria-selected="false">
                        <i class="las la-shield-alt me-1"></i> Permissions
                    </a>
                </li>                                                
                <li class="nav-item">
                    <a class="nav-link fw-medium" data-bs-toggle="tab" href="#statistiques" role="tab" aria-selected="false">
                        <i class="las la-chart-bar me-1"></i> Statistiques
                    </a>
                </li>
            </ul>
            
            <!-- Contenu des onglets -->
            <div class="tab-content">
                <!-- Onglet Activités -->
                <div class="tab-pane active" id="activites" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Journal des Activités</h4>
                        </div>
                        <div class="card-body">
                            <div class="activity-feed">
                                <?php
                                $activites = [
                                    ['icon' => 'la-user-plus', 'color' => 'success', 'action' => 'a créé un nouvel utilisateur', 'heure' => '10:30', 'details' => 'Marie Uwimana - Comptable'],
                                    ['icon' => 'la-file-invoice-dollar', 'color' => 'info', 'action' => 'a approuvé une dépense', 'heure' => '09:45', 'details' => 'Dépense #D-2024-056 - 250.000 FBU'],
                                    ['icon' => 'la-box', 'color' => 'primary', 'action' => 'a ajouté un nouveau produit', 'heure' => 'Hier 16:20', 'details' => 'Ordinateur Portable Dell - Stock: 15'],
                                    ['icon' => 'la-shopping-cart', 'color' => 'warning', 'action' => 'a effectué une vente', 'heure' => 'Hier 14:15', 'details' => 'Vente #V-2024-089 - 1.250.000 FBU'],
                                    ['icon' => 'la-chart-line', 'color' => 'info', 'action' => 'a généré un rapport', 'heure' => 'Hier 11:00', 'details' => 'Rapport mensuel des ventes'],
                                    ['icon' => 'la-user-edit', 'color' => 'secondary', 'action' => 'a modifié un profil', 'heure' => '04/02 09:30', 'details' => 'Profil de Paul Niyonkuru'],
                                ];
                                
                                foreach($activites as $activite):
                                ?>
                                <div class="feed-item mb-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <span class="avatar avatar-sm bg-<?= $activite['color'] ?>-subtle text-<?= $activite['color'] ?> rounded-circle">
                                                <i class="las <?= $activite['icon'] ?> fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1"><?= $activite['action'] ?></h6>
                                            <p class="text-muted mb-0"><?= $activite['details'] ?></p>
                                            <small class="text-muted">
                                                <i class="las la-clock me-1"></i><?= $activite['heure'] ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="text-center mt-3">
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    <i class="las la-history me-1"></i> Voir tout l'historique
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Onglet Permissions -->
                <div class="tab-pane" id="permissions" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modules d'Accès</h4>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $modules = [
                                        ['Dashboard', true],
                                        ['Produits', true],
                                        ['Ventes', true],
                                        ['Stock', true],
                                        ['Dépenses', true],
                                        ['Clients', true],
                                        ['Formations', true],
                                        ['Rapports', true],
                                        ['Utilisateurs', true],
                                    ];
                                    
                                    foreach($modules as $module):
                                    ?>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="module_<?= strtolower($module[0]) ?>" 
                                               <?= $module[1] ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="module_<?= strtolower($module[0]) ?>">
                                            <span class="fw-semibold"><?= $module[0] ?></span>
                                            <small class="text-muted d-block">Accès complet au module</small>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Actions Autorisées</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="action_create" checked>
                                                <label class="form-check-label" for="action_create">
                                                    Créer
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="action_read" checked>
                                                <label class="form-check-label" for="action_read">
                                                    Lire
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="action_update" checked>
                                                <label class="form-check-label" for="action_update">
                                                    Modifier
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="action_delete" checked>
                                                <label class="form-check-label" for="action_delete">
                                                    Supprimer
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="action_export">
                                                <label class="form-check-label" for="action_export">
                                                    Exporter
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="action_import">
                                                <label class="form-check-label" for="action_import">
                                                    Importer
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <button class="btn btn-primary w-100" onclick="enregistrerPermissions()">
                                            <i class="las la-save me-1"></i> Enregistrer les permissions
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Onglet Statistiques -->
                <div class="tab-pane" id="statistiques" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 fw-semibold">Tâches complétées</p>
                                            <h3 class="my-2 fs-24 fw-bold">156</h3>
                                            <p class="mb-0 text-truncate text-muted">
                                                <i class="las la-arrow-up text-success fs-18"></i>
                                                <span class="text-dark fw-semibold">+12%</span> ce mois
                                            </p>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                                <i class="las la-tasks fs-30 align-self-center text-muted"></i>
                                            </div>                                                                    
                                        </div>
                                    </div> 
                                </div><!--end card-body--> 
                            </div><!--end card-->   
                        </div><!--end col-->
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 fw-semibold">Ventes effectuées</p>
                                            <h3 class="my-2 fs-24 fw-bold">45</h3>
                                            <p class="mb-0 text-truncate text-muted">
                                                <i class="las la-shopping-cart text-primary fs-18"></i>
                                                <span class="text-dark fw-semibold">850.000 FBU</span> de CA
                                            </p>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                                <i class="las la-shopping-bag fs-30 align-self-center text-muted"></i>
                                            </div>                                                                    
                                        </div>
                                    </div> 
                                </div><!--end card-body--> 
                            </div><!--end card-->   
                        </div><!--end col-->
                    </div><!--end row-->
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 fw-semibold">Dépenses approuvées</p>
                                            <h3 class="my-2 fs-24 fw-bold">23</h3>
                                            <p class="mb-0 text-truncate text-muted">
                                                <i class="las la-wallet text-warning fs-18"></i>
                                                <span class="text-dark fw-semibold">Total:</span> 1.250.000 FBU
                                            </p>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                                <i class="las la-file-invoice-dollar fs-30 align-self-center text-muted"></i>
                                            </div>                                                                    
                                        </div>
                                    </div> 
                                </div><!--end card-body--> 
                            </div><!--end card-->   
                        </div><!--end col-->
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <p class="text-dark mb-1 fw-semibold">Utilisateurs créés</p>
                                            <h3 class="my-2 fs-24 fw-bold">8</h3>
                                            <p class="mb-0 text-truncate text-muted">
                                                <i class="las la-user-plus text-info fs-18"></i>
                                                Dernier: <span class="text-dark fw-semibold">Marie U.</span>
                                            </p>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                                <i class="las la-user-circle fs-30 align-self-center text-muted"></i>
                                            </div>                                                                    
                                        </div>
                                    </div> 
                                </div><!--end card-body--> 
                            </div><!--end card-->   
                        </div><!--end col-->
                    </div><!--end row-->
                    
                    <!-- Graphique d'activité -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Activité Mensuelle</h4>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="activiteChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end tab-content--> 
        </div><!--end col-->                                                       
    </div><!--end row-->
</div><!-- container -->

<!-- Modal Édition Profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier le Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="profileForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editNom" class="form-label">Nom complet *</label>
                                <input type="text" class="form-control" id="editNom" value="Jean Ndayishimiye" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="editEmail" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="editEmail" value="jean.ndayishimiye@example.com" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="editTelephone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="editTelephone" value="+257 79 123 456">
                            </div>
                            
                            <div class="mb-3">
                                <label for="editRole" class="form-label">Rôle *</label>
                                <select class="form-select" id="editRole" required>
                                    <option value="admin">Administrateur</option>
                                    <option value="comptable">Comptable</option>
                                    <option value="responsable">Responsable</option>
                                    <option value="employe">Employé</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editPoste" class="form-label">Poste</label>
                                <input type="text" class="form-control" id="editPoste" value="Gérant Principal">
                            </div>
                            
                            <div class="mb-3">
                                <label for="editDepartement" class="form-label">Département</label>
                                <input type="text" class="form-control" id="editDepartement" value="Administration">
                            </div>
                            
                            <div class="mb-3">
                                <label for="editAdresse" class="form-label">Adresse</label>
                                <textarea class="form-control" id="editAdresse" rows="2">Bujumbura, Burundi</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="editStatut" class="form-label">Statut</label>
                                <select class="form-select" id="editStatut">
                                    <option value="actif">Actif</option>
                                    <option value="inactif">Inactif</option>
                                    <option value="suspendu">Suspendu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="las la-save me-1"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser le graphique d'activité
    initialiserGraphiqueActivite();
});

function editerProfil() {
    const modal = new bootstrap.Modal(document.getElementById('editProfileModal'));
    modal.show();
}

function editerInformations() {
    // Ici, vous ouvririez un modal pour éditer les informations personnelles
    alert('Fonctionnalité d\'édition des informations personnelles');
}

function enregistrerPermissions() {
    // Collecter les permissions
    const permissions = {
        modules: {
            dashboard: document.getElementById('module_dashboard').checked,
            produits: document.getElementById('module_produits').checked,
            ventes: document.getElementById('module_ventes').checked,
            stock: document.getElementById('module_stock').checked,
            depenses: document.getElementById('module_dépenses').checked,
            clients: document.getElementById('module_clients').checked,
            formations: document.getElementById('module_formations').checked,
            rapports: document.getElementById('module_rapports').checked,
            utilisateurs: document.getElementById('module_utilisateurs').checked,
        },
        actions: {
            create: document.getElementById('action_create').checked,
            read: document.getElementById('action_read').checked,
            update: document.getElementById('action_update').checked,
            delete: document.getElementById('action_delete').checked,
            export: document.getElementById('action_export').checked,
            import: document.getElementById('action_import').checked,
        }
    };
    
    // Simuler l'enregistrement
    console.log('Permissions à enregistrer:', permissions);
    
    // Afficher un message de succès
    showToast('Permissions enregistrées avec succès', 'success');
}

function initialiserGraphiqueActivite() {
    const ctx = document.getElementById('activiteChart').getContext('2d');
    
    // Données de test
    const data = {
        labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'],
        datasets: [
            {
                label: 'Tâches complétées',
                data: [35, 42, 38, 45],
                borderColor: '#727cf5',
                backgroundColor: 'rgba(114, 124, 245, 0.1)',
                fill: true,
                tension: 0.4
            },
            {
                label: 'Ventes',
                data: [8, 12, 10, 15],
                borderColor: '#0acf97',
                backgroundColor: 'rgba(10, 207, 151, 0.1)',
                fill: true,
                tension: 0.4
            },
            {
                label: 'Dépenses approuvées',
                data: [5, 8, 6, 4],
                borderColor: '#fa5c7c',
                backgroundColor: 'rgba(250, 92, 124, 0.1)',
                fill: true,
                tension: 0.4
            }
        ]
    };
    
    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Quantité'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Semaines du mois'
                    }
                }
            }
        }
    };
    
    // Vérifier si Chart.js est disponible
    if (typeof Chart !== 'undefined') {
        new Chart(ctx, config);
    }
}

// Gestion du formulaire de profil
document.getElementById('profileForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = {
        nom: document.getElementById('editNom').value,
        email: document.getElementById('editEmail').value,
        telephone: document.getElementById('editTelephone').value,
        role: document.getElementById('editRole').value,
        poste: document.getElementById('editPoste').value,
        departement: document.getElementById('editDepartement').value,
        adresse: document.getElementById('editAdresse').value,
        statut: document.getElementById('editStatut').value
    };
    
    // Simuler l'enregistrement
    console.log('Profil à mettre à jour:', formData);
    
    // Fermer le modal
    bootstrap.Modal.getInstance(document.getElementById('editProfileModal')).hide();
    
    // Afficher un message de succès
    showToast('Profil mis à jour avec succès', 'success');
    
    // Recharger les données (dans une vraie app, vous feriez une requête AJAX)
    setTimeout(() => {
        location.reload();
    }, 1500);
});

function showToast(message, type = 'info') {
    // Créer un toast Bootstrap
    const toastContainer = document.getElementById('toastContainer');
    if (!toastContainer) {
        const container = document.createElement('div');
        container.id = 'toastContainer';
        container.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999;';
        document.body.appendChild(container);
    }
    
    const toastId = 'toast-' + Date.now();
    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-white bg-${type} border-0`;
    toast.id = toastId;
    toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;
    
    document.getElementById('toastContainer').appendChild(toast);
    
    const bsToast = new bootstrap.Toast(toast, {
        autohide: true,
        delay: 3000
    });
    
    bsToast.show();
    
    toast.addEventListener('hidden.bs.toast', function () {
        toast.remove();
    });
}
</script>

<!-- Styles supplémentaires -->
<style>
.img-bg {
    min-height: 120px;
    position: relative;
}

.img-bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.1);
    border-radius: 0.375rem;
}

.activity-feed .feed-item {
    padding: 0.75rem;
    border-left: 2px solid #e9ecef;
    margin-left: 1rem;
}

.activity-feed .feed-item:last-child {
    border-left: 2px solid transparent;
}

.thumb-md {
    width: 48px;
    height: 48px;
}

.avatar-sm {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chart-container {
    position: relative;
    height: 250px;
}

.form-switch .form-check-input {
    width: 3em;
    height: 1.5em;
}

.form-switch .form-check-input:checked {
    background-color: var(--bs-primary);
    border-color: var(--bs-primary);
}
</style>

<?php 
require_once '../includes/footer.php';
?>