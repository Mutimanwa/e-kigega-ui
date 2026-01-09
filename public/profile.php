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
        <div class="col-md-6">
            <!-- Carte Profil -->
            <div class="card">  
                <div class="card-body p-4 rounded text-center img-bg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    
                </div><!--end card-body-->
                
               
                
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
                                <div class="flex-grow-1 text-truncate ms-3 mb-1 align-self-end"> 
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
                                
                                    <button type="button" class="btn btn-outline-primary flex-fill" onclick="editerProfil()">
                                        <i class="las la-edit me-1"></i> Modifier
                                    </button> 
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->  
            </div><!--end card--> 
            
            
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
                            
                            
                        </div>
                        
                            <div class="col-md-6">
                                
                                <div class="mb-3">
                                    <label for="editAncienMotDePasse" class="form-label">Ancien mot de passe</label>
                                    <input type="password" class="form-control" id="editAncienMotDePasse" placeholder="Votre ancien mot de passe">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="editNouveauMotDePasse" class="form-label">Nouveau mot de passe</label>
                                    <input type="password" class="form-control" id="editNouveauMotDePasse" placeholder="Entrer le nouveau mot de passe">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="editStatut" class="form-label">Confirmer le Nouveau Mot de passe</label>
                                    <input type="password" class="form-control" id="editStatut" placeholder="Confirmer le nouveau mot de passe"   >
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

</script>


<?php 
require_once '../includes/footer.php';
?>