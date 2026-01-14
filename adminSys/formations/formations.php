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
                        <li class="breadcrumb-item"><a href="#">e-Kigega</a></li>
                        <li class="breadcrumb-item"><a href="#">Super Admin</a></li>
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
                        <table class="table table-hover mb-0" id="datatable_1">

                            <thead class="table-light">
                                <tr>
                                 
                                    <th>Formation</th>
                                    <th>Catégorie</th>
                                    <th>Niveau</th>
                                    <th>Langue</th>
                                    <th>Date</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Durée</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>

                            <tbody>


                                <tr>
                                 

                                    <!-- Formation -->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="https://via.placeholder.com/80x50" class="rounded"
                                                    alt="Image de couverture" width="80">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Gestion du budget personnel</h6>
                                                <!-- Titre de la formation -->
                                                <small class="text-muted">
                                                    Apprendre à gérer efficacement ses finances personnelles.
                                                </small> <!-- Description courte -->
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Catégorie -->
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary">
                                            Finance
                                        </span>
                                    </td>

                                    <!-- Niveau -->
                                    <td>
                                        <span class="badge bg-success-subtle text-success">
                                            Débutant
                                        </span>
                                    </td>

                                    <!-- Langue -->
                                    <td>
                                        <span class="badge bg-secondary-subtle text-secondary">
                                            Français
                                        </span>
                                    </td>

                                    <!-- Date -->
                                    <td>
                                        15 Mar 2024
                                    </td>

                                    <!-- Statut -->
                                    <td class="text-center">
                                        <span class="badge bg-success">
                                            <i class="las la-video me-1"></i> Vidéo disponible
                                        </span>
                                    </td>

                                    <!-- Durée -->
                                    <td class="text-center">04:20</td>

                                    <!-- Actions -->
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">

                                            <!-- Modifier -->
                                            <a href="#" class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#modificationModal">
                                                <i class="las la-pen fs-18" data-bs-toggle="tooltip" title="Modifier"
                                                    data-bs-placement="top"></i>
                                            </a>


                                            <!-- Voir la vidéo -->
                                            <a href="videos.php?id=1" class="text-info" data-bs-toggle="tooltip"
                                                title="Voir la vidéo" data-bs-placement="top">
                                                <i class="las la-video fs-18"></i>
                                            </a>

                                            <!-- Supprimer -->
                                            <a href="#" class="text-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" onclick="supprimerFormation()">
                                                <i class="las la-trash fs-18" data-bs-toggle="tooltip" title="Supprimer"
                                                    data-bs-placement="top"></i>
                                            </a>


                                        </div>
                                    </td>

                                </tr>

                                <!-- ===== EXEMPLE 2 ===== -->
                                <tr>
                                 

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/80x50" class="rounded me-3"
                                                width="80">
                                            <div>
                                                <h6 class="mb-1">Épargne et investissement</h6>
                                                <small class="text-muted">Bases pour bien investir.</small>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge bg-warning-subtle text-warning">Économie</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-info-subtle text-info">Intermédiaire</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary-subtle text-secondary">Kirundi</span>
                                    </td>

                                    <!-- Date -->
                                    <td>
                                        15 Mar 2024
                                    </td>

                                    <td class="text-center">
                                        <span class="badge bg-warning text-dark">
                                            <i class="las la-clock me-1"></i> En cours
                                        </span>
                                    </td>

                                    <td class="text-center">--:--</td>

                                    <!-- Actions -->
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <!-- Modifier -->
                                            <a href="#" class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#modificationModal">
                                                <i class="las la-pen fs-18" data-bs-toggle="tooltip" title="Modifier"
                                                    data-bs-placement="top"></i>
                                            </a>

                                            <!-- Voir la vidéo -->
                                            <a href="videos.php?id=1" class="text-info" data-bs-toggle="tooltip"
                                                title="Voir la vidéo" data-bs-placement="top">
                                                <i class="las la-video fs-18"></i>
                                            </a>
                                            <!-- Supprimer -->
                                            <a href="#" class="text-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" onclick="supprimerFormation()">
                                                <i class="las la-trash fs-18" data-bs-toggle="tooltip" title="Supprimer"
                                                    data-bs-placement="top"></i>
                                            </a>


                                        </div>
                                    </td>

                                </tr>

                                <!-- ===== EXEMPLE 3 ===== -->
                                <tr>
                                 

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/80x50" class="rounded me-3"
                                                width="80">
                                            <div>
                                                <h6 class="mb-1">Stratégies financières avancées</h6>
                                                <small class="text-muted">Pour utilisateurs expérimentés.</small>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge bg-danger-subtle text-danger">Business</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-danger">Avancé</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary-subtle text-secondary">Français</span>
                                    </td>

                                    <!-- Date -->
                                    <td>
                                        15 Mar 2024
                                    </td>

                                    <td class="text-center">
                                        <span class="badge bg-danger">
                                            <i class="las la-video-slash me-1"></i> Aucune vidéo
                                        </span>
                                    </td>

                                    <td class="text-center">--:--</td>

                                    <!-- Actions -->
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">

                                            <!-- Modifier -->
                                            <a href="#" class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#modificationModal">
                                                <i class="las la-pen fs-18" data-bs-toggle="tooltip" title="Modifier"
                                                    data-bs-placement="top"></i>
                                            </a>

                                            <!-- Voir la vidéo -->
                                            <a href="videos.php?id=1" class="text-info" data-bs-toggle="tooltip"
                                                title="Voir la vidéo" data-bs-placement="top">
                                                <i class="las la-video fs-18"></i>
                                            </a>

                                            <!-- Supprimer -->
                                            <a href="#" class="text-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" onclick="supprimerFormation()">
                                                <i class="las la-trash fs-18" data-bs-toggle="tooltip" title="Supprimer"
                                                    data-bs-placement="top"></i>
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
    <div class="modal-dialog modal-lg ">
        <div class="modal-content ">
            <div class="modal-header border-secondary">
                <h5 class="modal-title">Créer un nouveau short</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="shortForm" onsubmit="createShort(event)">
                    <!-- ROW 1 -->
                    <div class="row">

                        <!-- Vidéo -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Télécharger une vidéo *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-video"></i></span>
                                    <input type="file" class="form-control border-secondary" accept="video/*" required>
                                </div>
                                <small class="text-muted">Durée maximale : 60 secondes • Formats : MP4, MOV</small>
                            </div>
                        </div>

                        <!-- Image de couverture -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Image de couverture *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    <input type="file" class="form-control border-secondary" accept="image/*" required>
                                </div>
                            </div>
                        </div>

                        <!-- Titre -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Titre *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    <input type="text" class="form-control border-secondary" maxlength="60"
                                        placeholder="Titre accrocheur (max. 60 caractères)" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ROW 2 -->
                    <div class="row">

                        <!-- Catégorie -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Catégorie *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-list"></i></span>
                                    <select class="form-select border-secondary" required>
                                        <option value="" selected disabled>Choisir une catégorie</option>
                                        <?php foreach ($categories as $key => $label): ?>
                                            <?php if ($key !== 'tous'): ?>
                                                <option value="<?= $key ?>"><?= $label ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Langue -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Langue *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-language"></i></span>
                                    <select class="form-select border-secondary" required>
                                        <option value="" selected disabled>Choisir une langue</option>
                                        <option value="kirundi">Kirundi</option>
                                        <option value="francais">Français</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    <textarea class="form-control border-secondary" rows="3"
                                        placeholder="Décrivez votre contenu..."></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ROW 3 -->
                    <div class="row">

                        <!-- Référence -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Référence *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    <input type="text" class="form-control border-secondary" placeholder="Ex. : REF-001"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Niveau -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Niveau *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-signal"></i></span>
                                    <select class="form-select border-secondary" required>
                                        <option value="" selected disabled>Choisir le niveau</option>
                                        <option value="debutant">Débutant</option>
                                        <option value="intermediaire">Intermédiaire</option>
                                        <option value="avance">Avancé</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Pré-requis -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Pré-requis</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                    <input type="text" class="form-control border-secondary"
                                        placeholder="Ex. : Connaissances de base en informatique">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ROW 4 -->
                    <div class="row">

                        <!-- Objectif -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Objectif</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-bullseye"></i></span>
                                    <input type="text" class="form-control border-secondary"
                                        placeholder="Ex. : Apprendre à gérer son budget efficacement">
                                </div>
                            </div>
                        </div>

                        <!-- Hashtags -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Hashtags</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                    <input type="text" class="form-control border-secondary"
                                        placeholder="#finance #conseil #argent">
                                </div>
                            </div>
                        </div>

                        <!-- Statut -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Statut *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                    <select class="form-select border-secondary" required>
                                        <option value="" selected disabled>Choisir un statut</option>
                                        <option value="disponible">Vidéo disponible</option>
                                        <option value="en-cours">En cours</option>
                                        <option value="aucune">Aucune vidéo</option>
                                    </select>
                                </div>
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

                    <!-- ROW 1 -->
                    <div class="row">

                        <!-- Vidéo -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Télécharger une vidéo *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-video"></i></span>
                                    <input type="file" class="form-control border-secondary" accept="video/*" required>
                                </div>
                                <small class="text-muted">Durée maximale : 60 secondes • Formats : MP4, MOV</small>
                            </div>
                        </div>

                        <!-- Image de couverture -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Image de couverture *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    <input type="file" class="form-control border-secondary" accept="image/*" required>
                                </div>
                            </div>
                        </div>

                        <!-- Titre -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Titre *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    <input type="text" class="form-control border-secondary" maxlength="60"
                                        placeholder="Titre accrocheur (max. 60 caractères)" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ROW 2 -->
                    <div class="row">

                        <!-- Catégorie -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Catégorie *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-list"></i></span>
                                    <select class="form-select border-secondary" required>
                                        <option value="" selected disabled>Choisir une catégorie</option>
                                        <?php foreach ($categories as $key => $label): ?>
                                            <?php if ($key !== 'tous'): ?>
                                                <option value="<?= $key ?>"><?= $label ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Langue -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Langue *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-language"></i></span>
                                    <select class="form-select border-secondary" required>
                                        <option value="" selected disabled>Choisir une langue</option>
                                        <option value="kirundi">Kirundi</option>
                                        <option value="francais">Français</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    <textarea class="form-control border-secondary" rows="3"
                                        placeholder="Décrivez votre contenu..."></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ROW 3 -->
                    <div class="row">

                        <!-- Référence -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Référence *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    <input type="text" class="form-control border-secondary" placeholder="Ex. : REF-001"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Niveau -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Niveau *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-signal"></i></span>
                                    <select class="form-select border-secondary" required>
                                        <option value="" selected disabled>Choisir le niveau</option>
                                        <option value="debutant">Débutant</option>
                                        <option value="intermediaire">Intermédiaire</option>
                                        <option value="avance">Avancé</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Pré-requis -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Pré-requis</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                    <input type="text" class="form-control border-secondary"
                                        placeholder="Ex. : Connaissances de base en informatique">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ROW 4 -->
                    <div class="row">

                        <!-- Objectif -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Objectif</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-bullseye"></i></span>
                                    <input type="text" class="form-control border-secondary"
                                        placeholder="Ex. : Apprendre à gérer son budget efficacement">
                                </div>
                            </div>
                        </div>

                        <!-- Hashtags -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Hashtags</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                    <input type="text" class="form-control border-secondary"
                                        placeholder="#finance #conseil #argent">
                                </div>
                            </div>
                        </div>

                        <!-- Statut -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Statut *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                    <select class="form-select border-secondary" required>
                                        <option value="" selected disabled>Choisir un statut</option>
                                        <option value="disponible">Vidéo disponible</option>
                                        <option value="en-cours">En cours</option>
                                        <option value="aucune">Aucune vidéo</option>
                                    </select>
                                </div>
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
$pageLibs = [
    LIBS_URL . 'simple-datatables/umd/simple-datatables.js',
    JS_URL . 'pages/datatables.init.js'
];
include_once "../includes/footer.php";
?>

<!-- Modal de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="DeleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h5 class="modal-title text-danger" id="deleteUserLabel">Supprimer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Êtes-vous sûr de vouloir supprimer cet formation ? Cette action est irréversible.
                </p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Oui</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<!-- js pour le tooltip -->
<script>
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>