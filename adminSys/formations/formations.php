<?php
include_once "../includes/header.php";
include_once "../includes/sidebar.php";

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

<div class="container-fluid">
    <!-- Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Gestion des Formations</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Formations</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques Rapides -->
    <!-- <div class="row">
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
    </div> -->


    <!-- Liste des Formations -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <h5 class="card-title mb-0">Liste des Formations</h5>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#creationModal" class="btn btn-primary">
                                    <i class="las la-plus-circle me-1"></i> Nouvelle Formation
                                </a>
                        </div>                                  
                    </div>

                    <!-- table -->
                    <div class="table-responsive" id="tab">
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
                                    <th class="text-center">Durée</th>
                        
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input formation-checkbox" type="checkbox" value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="https://via.placeholder.com/60x40" class="rounded"
                                                    alt="Miniature" width="60">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Test</h6>
                                                <small class="text-muted">Lorem ipsum dolor sit amet.</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary">
                                            Lorem.
                                        </span>
                                    </td>

                                    <td class="text-center">04:20</td>

                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm ">
                                            <a href="#" class="btn btn-outline-transparent" data-bs-toggle="modal" data-bs-target="#modificationModal">
                                                <i class="las la-pen fs-18 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="modifier" ></i>
                                            </a>
                                            <a href="videos.php?id="
                                                class="btn btn-outline-transparent">
                                                <i class="las la-video fs-18 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Voir la video"></i>
                                            </a>
                                            <a href="" class="btn btn-outline-transparent" onclick="supprimerFormation()">
                                                <i class="las la-trash fs-18 text-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Modal de création -->
    <div class="modal fade" id="creationModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title">Créer un nouveau short</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="shortForm" onsubmit="createShort(event)">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Télécharger une vidéo *</label>
                                    <input type="file" class="form-control  border-secondary" accept="video/*"
                                        required>
                                    <small class="text-muted">Max 60 secondes, formats MP4, MOV</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Titre *</label>
                                    <input type="text" class="form-control  border-secondary" maxlength="60"
                                        placeholder="Titre accrocheur (max 60 caractères)" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control  border-secondary" rows="3"
                                        placeholder="Décrivez votre contenu..."></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Catégorie *</label>
                                    <select class="form-select  border-secondary" required>
                                        <option value="">Choisir une catégorie</option>
                                        <?php foreach ($categories as $key => $label): ?>
                                            <?php if ($key !== 'tous'): ?>
                                                <option value="<?= $key ?>"><?= $label ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Hashtags</label>
                                    <input type="text" class="form-control  border-secondary"
                                        placeholder="#finance #conseil #argent (séparés par des espaces)">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" form="shortForm" class="btn btn-primary">
                        <i class="las la-upload me-1"></i> Publier
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de modification -->
    <div class="modal fade" id="modificationModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title">Modifier le short</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="shortFormUpdate" onsubmit="updateShort(event)">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Télécharger une nouvelle vidéo</label>
                                    <input type="file" class="form-control  border-secondary" accept="video/*">
                                    <small class="text-muted">Max 60 secondes, formats MP4, MOV</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Titre *</label>
                                    <input type="text" class="form-control  border-secondary" maxlength="60"
                                        placeholder="Titre accrocheur (max 60 caractères)" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control  border-secondary" rows="3"
                                        placeholder="Décrivez votre contenu..."></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Catégorie *</label>
                                    <select class="form-select  border-secondary" required>
                                        <option value="">Choisir une catégorie</option>
                                        <?php foreach ($categories as $key => $label): ?>
                                            <?php if ($key !== 'tous'): ?>
                                                <option value="<?= $key ?>"><?= $label ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Hashtags</label>
                                    <input type="text" class="form-control  border-secondary"
                                        placeholder="#finance #conseil #argent (séparés par des espaces)">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" form="shortFormUpdate" class="btn btn-primary">
                        <i class="las la-save me-1"></i> Enregistrer les modifications
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php
include_once "../includes/footer.php";
?>