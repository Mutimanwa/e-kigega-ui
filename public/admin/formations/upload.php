
<?php
// public/admin/formations/index.php
require_once '../../../includes/header.php';
require_once '../../../includes/sidebar.php';

// Données de test
$categories = [
    'finance_personnelle' => 'Finance Personnelle',
    'gestion_entreprise' => 'Gestion d\'Entreprise', 
    'investissement' => 'Investissement',
    'crypto' => 'Cryptomonnaies',
    'epargne' => 'Épargne et Retraite'
];

$formations = [
    [
        'id' => 1,
        'titre' => 'Introduction à la Finance Personnelle',
        'description' => 'Apprenez les bases de la gestion de vos finances personnelles',
        'categorie' => 'finance_personnelle',
        'niveau' => 'Débutant',
        'duree' => '2h 30min',
        'modules' => 5,
        'prix' => 0,
        'etudiants' => 156,
        'note' => 4.5,
        'date_creation' => '2024-01-15',
        'statut' => 'actif',
        'image' => 'formation1.jpg'
    ],
    [
        'id' => 2,
        'titre' => 'Investir en Bourse pour Débutants',
        'description' => 'Guide complet pour commencer à investir en bourse',
        'categorie' => 'investissement',
        'niveau' => 'Intermédiaire',
        'duree' => '4h 15min',
        'modules' => 8,
        'prix' => 25000,
        'etudiants' => 89,
        'note' => 4.2,
        'date_creation' => '2024-01-20',
        'statut' => 'actif',
        'image' => 'formation2.jpg'
    ],
    [
        'id' => 3,
        'titre' => 'Gestion de Budget d\'Entreprise',
        'description' => 'Techniques avancées pour gérer le budget de votre entreprise',
        'categorie' => 'gestion_entreprise',
        'niveau' => 'Avancé',
        'duree' => '3h 45min',
        'modules' => 6,
        'prix' => 50000,
        'etudiants' => 45,
        'note' => 4.7,
        'date_creation' => '2024-01-25',
        'statut' => 'actif',
        'image' => 'formation3.jpg'
    ],
    [
        'id' => 4,
        'titre' => 'Cryptomonnaies: Risques et Opportunités',
        'description' => 'Comprendre le marché des cryptomonnaies',
        'categorie' => 'crypto',
        'niveau' => 'Intermédiaire',
        'duree' => '3h 20min',
        'modules' => 7,
        'prix' => 35000,
        'etudiants' => 112,
        'note' => 4.3,
        'date_creation' => '2024-01-30',
        'statut' => 'actif',
        'image' => 'formation4.jpg'
    ],
    [
        'id' => 5,
        'titre' => 'Planification de Retraite',
        'description' => 'Comment préparer sa retraite dès maintenant',
        'categorie' => 'epargne',
        'niveau' => 'Débutant',
        'duree' => '2h 15min',
        'modules' => 4,
        'prix' => 0,
        'etudiants' => 78,
        'note' => 4.0,
        'date_creation' => '2024-02-05',
        'statut' => 'brouillon',
        'image' => 'formation5.jpg'
    ]
];
?>

<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
    <!-- Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Gestion des Formations</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Formations</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques Rapides -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium mb-2">Total Formations</p>
                            <h4 class="mb-0">24</h4>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-22">
                                    <i class="las la-graduation-cap"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="text-muted mb-0">
                            <span class="text-success"><i class="fas fa-arrow-up me-1"></i>3</span> ce mois
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium mb-2">Étudiants Actifs</p>
                            <h4 class="mb-0">856</h4>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-success-subtle text-success rounded-circle fs-22">
                                    <i class="las la-users"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="text-muted mb-0">
                            <span class="text-success"><i class="fas fa-arrow-up me-1"></i>12%</span> croissance
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium mb-2">Revenus Formations</p>
                            <h4 class="mb-0">2.45M <small>FBU</small></h4>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-22">
                                    <i class="las la-wallet"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="text-muted mb-0">
                            <span class="text-success"><i class="fas fa-arrow-up me-1"></i>8.5%</span> ce mois
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium mb-2">Note Moyenne</p>
                            <h4 class="mb-0">4.3/5</h4>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-sm">
                                <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-22">
                                    <i class="las la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="text-muted mb-0">
                            Basé sur <span class="fw-semibold">124 avis</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtres et Actions -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap gap-2">
                                <a href="<?= BASE_URL ?>public/admin/formations/ajouter.php" class="btn btn-primary">
                                    <i class="las la-plus-circle me-1"></i> Nouvelle Formation
                                </a>
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#importModal">
                                    <i class="las la-upload me-1"></i> Importer
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="las la-download me-1"></i> Exporter
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="exporter('csv')">CSV</a>
                                        <a class="dropdown-item" href="#" onclick="exporter('excel')">Excel</a>
                                        <a class="dropdown-item" href="#" onclick="exporter('pdf')">PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex flex-wrap gap-2 justify-content-end">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" class="form-control" placeholder="Rechercher..." id="searchInput">
                                    <button class="btn btn-primary" type="button" onclick="rechercherFormations()">
                                        <i class="las la-search"></i>
                                    </button>
                                </div>
                                <select class="form-select form-select-sm w-auto" id="filterCategory" onchange="filtrerFormations()">
                                    <option value="">Toutes catégories</option>
                                    <?php foreach($categories as $key => $label): ?>
                                    <option value="<?= $key ?>"><?= $label ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des Formations -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="card-title mb-0">Liste des Formations</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="btn-group btn-group-sm" role="group">
                                <input type="radio" class="btn-check" name="viewMode" id="gridView" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="gridView" onclick="changerModeAffichage('grid')">
                                    <i class="las la-th-large"></i>
                                </label>
                                <input type="radio" class="btn-check" name="viewMode" id="listView" autocomplete="off">
                                <label class="btn btn-outline-primary" for="listView" onclick="changerModeAffichage('list')">
                                    <i class="las la-list"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Vue Grille -->
                    <div class="row" id="gridViewContainer">
                        <?php foreach($formations as $formation): 
                            $statutClass = [
                                'actif' => 'success',
                                'brouillon' => 'warning',
                                'inactif' => 'secondary'
                            ][$formation['statut']] ?? 'secondary';
                            
                            $prixAffichage = $formation['prix'] > 0 ? 
                                number_format($formation['prix'], 0, ',', '.') . ' FBU' : 'Gratuit';
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 formation-card">
                            <div class="card">
                                <div class="card-img-top position-relative">
                                    <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="<?= $formation['titre'] ?>">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-<?= $statutClass ?>"><?= ucfirst($formation['statut']) ?></span>
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 m-2">
                                        <span class="badge bg-dark"><?= $formation['duree'] ?></span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title mb-0" style="font-size: 1rem;"><?= $formation['titre'] ?></h5>
                                        <span class="badge bg-primary-subtle text-primary"><?= $formation['niveau'] ?></span>
                                    </div>
                                    
                                    <p class="card-text text-muted small mb-2" style="font-size: 0.85rem;">
                                        <?= substr($formation['description'], 0, 60) ?>...
                                    </p>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <small class="text-muted">
                                            <i class="las la-folder me-1"></i>
                                            <?= $categories[$formation['categorie']] ?>
                                        </small>
                                        <small class="text-muted">
                                            <i class="las la-play-circle me-1"></i>
                                            <?= $formation['modules'] ?> modules
                                        </small>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <i class="las la-user-graduate text-primary me-1"></i>
                                            <small class="text-muted"><?= $formation['etudiants'] ?> étudiants</small>
                                        </div>
                                        <div class="text-warning">
                                            <i class="las la-star"></i>
                                            <small><?= $formation['note'] ?></small>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="text-primary mb-0"><?= $prixAffichage ?></h5>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= BASE_URL ?>public/admin/formations/modifier.php?id=<?= $formation['id'] ?>" 
                                               class="btn btn-outline-primary" title="Modifier">
                                                <i class="las la-edit"></i>
                                            </a>
                                            <a href="<?= BASE_URL ?>public/admin/formations/videos.php?id=<?= $formation['id'] ?>" 
                                               class="btn btn-outline-success" title="Vidéos">
                                                <i class="las la-video"></i>
                                            </a>
                                            <button class="btn btn-outline-danger" 
                                                    onclick="supprimerFormation(<?= $formation['id'] ?>)" 
                                                    title="Supprimer">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Vue Liste (cachée par défaut) -->
                    <div class="table-responsive d-none" id="listViewContainer">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="60">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                        </div>
                                    </th>
                                    <th>Formation</th>
                                    <th>Catégorie</th>
                                    <th>Niveau</th>
                                    <th class="text-center">Durée</th>
                                    <th class="text-center">Étudiants</th>
                                    <th>Prix</th>
                                    <th>Statut</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($formations as $formation): 
                                    $statutClass = [
                                        'actif' => 'success',
                                        'brouillon' => 'warning',
                                        'inactif' => 'secondary'
                                    ][$formation['statut']] ?? 'secondary';
                                    
                                    $prixAffichage = $formation['prix'] > 0 ? 
                                        number_format($formation['prix'], 0, ',', '.') . ' FBU' : 'Gratuit';
                                ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input formation-checkbox" type="checkbox" value="<?= $formation['id'] ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="https://via.placeholder.com/60x40" class="rounded" alt="Miniature" width="60">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1"><?= $formation['titre'] ?></h6>
                                                <small class="text-muted"><?= substr($formation['description'], 0, 50) ?>...</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary">
                                            <?= $categories[$formation['categorie']] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info"><?= $formation['niveau'] ?></span>
                                    </td>
                                    <td class="text-center"><?= $formation['duree'] ?></td>
                                    <td class="text-center"><?= $formation['etudiants'] ?></td>
                                    <td>
                                        <span class="fw-semibold"><?= $prixAffichage ?></span>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?= $statutClass ?>-subtle text-<?= $statutClass ?>">
                                            <?= ucfirst($formation['statut']) ?>
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= BASE_URL ?>public/admin/formations/modifier.php?id=<?= $formation['id'] ?>" 
                                               class="btn btn-outline-primary">
                                                <i class="las la-edit"></i>
                                            </a>
                                            <a href="<?= BASE_URL ?>public/admin/formations/videos.php?id=<?= $formation['id'] ?>" 
                                               class="btn btn-outline-success">
                                                <i class="las la-video"></i>
                                            </a>
                                            <button class="btn btn-outline-danger" 
                                                    onclick="supprimerFormation(<?= $formation['id'] ?>)">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                Affichage de <b>5</b> sur <b>24</b> formations
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-end">
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#"><i class="las la-angle-left"></i></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="las la-angle-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Importer des Formations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Format d'import</label>
                    <select class="form-select" id="importFormat">
                        <option value="csv">CSV</option>
                        <option value="excel">Excel</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fichier</label>
                    <input type="file" class="form-control" id="importFile" accept=".csv,.xlsx,.xls">
                    <small class="text-muted">Téléchargez <a href="#" onclick="telechargerModele()">le modèle</a> pour voir le format requis</small>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="importOverwrite">
                        <label class="form-check-label" for="importOverwrite">
                            Remplacer les formations existantes
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" onclick="importerFormations()">
                    <i class="las la-upload me-1"></i> Importer
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cette formation ? Cette action est irréversible.</p>
                <div class="alert alert-warning">
                    <i class="las la-exclamation-triangle me-2"></i>
                    Tous les modules et vidéos associés seront également supprimés.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">
                    <i class="las la-trash me-1"></i> Supprimer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Variables globales
let formationASupprimer = null;

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Select all checkbox
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.formation-checkbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
    
    // Recherche en temps réel
    document.getElementById('searchInput').addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            rechercherFormations();
        }
    });
});

function rechercherFormations() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const cards = document.querySelectorAll('.formation-card');
    
    cards.forEach(card => {
        const title = card.querySelector('.card-title').textContent.toLowerCase();
        const description = card.querySelector('.card-text').textContent.toLowerCase();
        
        if (title.includes(searchTerm) || description.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

function filtrerFormations() {
    const category = document.getElementById('filterCategory').value;
    const cards = document.querySelectorAll('.formation-card');
    
    cards.forEach(card => {
        const cardCategory = card.querySelector('.badge.bg-primary-subtle').textContent;
        const categoryMap = {
            'finance_personnelle': 'Finance Personnelle',
            'gestion_entreprise': 'Gestion d\'Entreprise',
            'investissement': 'Investissement',
            'crypto': 'Cryptomonnaies',
            'epargne': 'Épargne et Retraite'
        };
        
        if (!category || cardCategory === categoryMap[category]) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

function changerModeAffichage(mode) {
    if (mode === 'grid') {
        document.getElementById('gridViewContainer').classList.remove('d-none');
        document.getElementById('listViewContainer').classList.add('d-none');
    } else {
        document.getElementById('gridViewContainer').classList.add('d-none');
        document.getElementById('listViewContainer').classList.remove('d-none');
    }
}

function supprimerFormation(id) {
    formationASupprimer = id;
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    
    document.getElementById('confirmDelete').onclick = function() {
        supprimerFormationConfirme();
        modal.hide();
    };
    
    modal.show();
}

function supprimerFormationConfirme() {
    if (!formationASupprimer) return;
    
    // Afficher le chargement
    const btn = document.getElementById('confirmDelete');
    const originalText = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Suppression...';
    
    // Simuler la suppression
    setTimeout(() => {
        // Réinitialiser le bouton
        btn.disabled = false;
        btn.innerHTML = originalText;
        
        // Ici, vous feriez une requête AJAX pour supprimer
        console.log('Suppression formation ID:', formationASupprimer);
        
        // Supprimer de l'affichage
        const elements = document.querySelectorAll(`[onclick*="${formationASupprimer}"]`);
        elements.forEach(el => {
            const card = el.closest('.formation-card') || el.closest('tr');
            if (card) {
                card.remove();
            }
        });
        
        // Afficher un message de succès
        showToast('Formation supprimée avec succès', 'success');
        
        formationASupprimer = null;
    }, 1500);
}

function exporter(format) {
    const formationsSelectionnees = getFormationsSelectionnees();
    
    if (format === 'pdf' || formationsSelectionnees.length === 0) {
        // Exporter tout pour PDF
        console.log('Export', format, 'de toutes les formations');
    } else {
        console.log('Export', format, 'des formations:', formationsSelectionnees);
    }
    
    // Simuler l'export
    showToast(`Export ${format.toUpperCase()} en cours...`, 'info');
    
    setTimeout(() => {
        showToast(`Export ${format.toUpperCase()} terminé`, 'success');
    }, 2000);
}

function getFormationsSelectionnees() {
    const checkboxes = document.querySelectorAll('.formation-checkbox:checked');
    return Array.from(checkboxes).map(cb => cb.value);
}

function importerFormations() {
    const fileInput = document.getElementById('importFile');
    const format = document.getElementById('importFormat').value;
    const overwrite = document.getElementById('importOverwrite').checked;
    
    if (!fileInput.files.length) {
        alert('Veuillez sélectionner un fichier à importer.');
        return;
    }
    
    const file = fileInput.files[0];
    const btn = document.querySelector('#importModal .btn-primary');
    const originalText = btn.innerHTML;
    
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Import...';
    
    // Simuler l'import
    setTimeout(() => {
        btn.disabled = false;
        btn.innerHTML = originalText;
        
        const modal = bootstrap.Modal.getInstance(document.getElementById('importModal'));
        modal.hide();
        
        showToast('Importation terminée avec succès', 'success');
        
        // Réinitialiser le formulaire
        fileInput.value = '';
    }, 3000);
}

function telechargerModele() {
    // Créer un lien de téléchargement pour le modèle
    const data = "Titre,Description,Catégorie,Niveau,Durée,Prix\n";
    const blob = new Blob([data], { type: 'text/csv' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'modele_formations.csv';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}

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

<?php require_once '../../../includes/footer.php'; ?>