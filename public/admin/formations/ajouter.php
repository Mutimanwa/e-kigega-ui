<?php
// public/admin/formations/ajouter.php
require_once '../../../includes/header.php';
require_once '../../../includes/sidebar.php';

$categories = [
    'finance_personnelle' => 'Finance Personnelle',
    'gestion_entreprise' => 'Gestion d\'Entreprise',
    'investissement' => 'Investissement',
    'crypto' => 'Cryptomonnaies',
    'epargne' => 'Épargne et Retraite'
];

$niveaux = ['Débutant', 'Intermédiaire', 'Avancé'];
?>
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Nouvelle Formation</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Tableau de bord</a></li>
                                <li class="breadcrumb-item"><a
                                        href="<?= BASE_URL ?>public/admin/formations/">Formations</a></li>
                                <li class="breadcrumb-item active">Ajouter</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulaire d'ajout -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form id="formationForm" novalidate>
                                <!-- Informations de base -->
                                <div class="mb-4">
                                    <h5 class="card-title mb-3 border-bottom pb-2">
                                        <i class="las la-info-circle text-primary me-2"></i>
                                        Informations de la Formation
                                    </h5>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="titre" class="form-label">Titre de la formation *</label>
                                                <input type="text" class="form-control" id="titre"
                                                    placeholder="Ex: Introduction à la Finance Personnelle" required>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer un titre pour la formation.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="reference" class="form-label">Référence</label>
                                                <input type="text" class="form-control" id="reference"
                                                    value="FORM-<?= date('YmdHis') ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description *</label>
                                        <textarea class="form-control" id="description" rows="4"
                                            placeholder="Décrivez le contenu de cette formation..." required></textarea>
                                        <div class="invalid-feedback">
                                            Veuillez entrer une description pour la formation.
                                        </div>
                                        <small class="text-muted">Maximum 500 caractères</small>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="categorie" class="form-label">Catégorie *</label>
                                                <select class="form-select" id="categorie" required>
                                                    <option value="">Sélectionner une catégorie</option>
                                                    <?php foreach ($categories as $key => $label): ?>
                                                        <option value="<?= $key ?>"><?= $label ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Veuillez sélectionner une catégorie.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="niveau" class="form-label">Niveau *</label>
                                                <select class="form-select" id="niveau" required>
                                                    <option value="">Sélectionner un niveau</option>
                                                    <?php foreach ($niveaux as $niveau): ?>
                                                        <option value="<?= strtolower($niveau) ?>"><?= $niveau ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Veuillez sélectionner un niveau.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Configuration -->
                                <div class="mb-4">
                                    <h5 class="card-title mb-3 border-bottom pb-2">
                                        <i class="las la-cog text-primary me-2"></i>
                                        Configuration
                                    </h5>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="duree" class="form-label">Durée estimée *</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="duree" value="2"
                                                        required>
                                                    <span class="input-group-text">heures</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer une durée.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="prix" class="form-label">Prix (FBU) *</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="prix" value="0"
                                                        required>
                                                    <span class="input-group-text">FBU</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer un prix.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="statut" class="form-label">Statut *</label>
                                                <select class="form-select" id="statut" required>
                                                    <option value="brouillon">Brouillon</option>
                                                    <option value="actif">Actif</option>
                                                    <option value="inactif">Inactif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="objectifs" class="form-label">Objectifs d'apprentissage</label>
                                        <textarea class="form-control" id="objectifs" rows="3"
                                            placeholder="Quels sont les objectifs d'apprentissage de cette formation ?"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="prerequis" class="form-label">Prérequis</label>
                                        <textarea class="form-control" id="prerequis" rows="2"
                                            placeholder="Quels sont les prérequis pour suivre cette formation ?"></textarea>
                                    </div>
                                </div>

                                <!-- Image de couverture -->
                                <div class="mb-4">
                                    <h5 class="card-title mb-3 border-bottom pb-2">
                                        <i class="las la-image text-primary me-2"></i>
                                        Image de Couverture
                                    </h5>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Télécharger une image</label>
                                                <input type="file" class="form-control" id="image" accept="image/*">
                                                <small class="text-muted">Format recommandé: 1280x720 px, max
                                                    2MB</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <div class="image-preview border rounded p-3 mb-2">
                                                    <img id="imagePreview" src="https://via.placeholder.com/300x170"
                                                        class="img-fluid rounded" alt="Aperçu image">
                                                </div>
                                                <button type="button" class="btn btn-sm btn-outline-secondary"
                                                    onclick="document.getElementById('image').click()">
                                                    <i class="las la-image me-1"></i> Changer l'image
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Boutons d'action -->
                                <div class="d-flex justify-content-between">
                                    <a href="<?= BASE_URL ?>public/admin/formations/" class="btn btn-outline-secondary">
                                        <i class="las la-times me-1"></i> Annuler
                                    </a>
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-warning" name="action" value="save">
                                            <i class="las la-save me-1"></i> Enregistrer
                                        </button>
                                        <button type="button"
                                            class="btn btn-warning dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">Options</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <button class="dropdown-item" type="submit" name="action"
                                                    value="save_draft">
                                                    <i class="las la-file-alt me-2"></i> Sauvegarder comme brouillon
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item" type="submit" name="action"
                                                    value="save_publish">
                                                    <i class="las la-check-circle me-2"></i> Publier maintenant
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar droite -->
                <div class="col-lg-4">
                    <!-- Aperçu -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <i class="las la-eye text-primary me-2"></i>
                                Aperçu
                            </h5>
                            <div class="preview-container">
                                <img id="previewImage" src="https://via.placeholder.com/300x170"
                                    class="img-fluid rounded mb-2" alt="Aperçu">
                                <h6 id="previewTitle" class="mb-1">Titre de la formation</h6>
                                <p id="previewDescription" class="text-muted small mb-2">Description apparaîtra ici...
                                </p>
                                <div class="d-flex justify-content-between">
                                    <span class="badge bg-primary" id="previewCategory">Catégorie</span>
                                    <span class="badge bg-info" id="previewNiveau">Niveau</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <i class="las la-tags text-primary me-2"></i>
                                Tags
                            </h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="tagsInput"
                                    placeholder="Ajouter des tags (séparés par des virgules)">
                            </div>
                            <div id="tagsContainer" class="d-flex flex-wrap gap-1">
                                <!-- Tags seront ajoutés ici dynamiquement -->
                            </div>
                        </div>
                    </div>

                    <!-- Options avancées -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <i class="las la-sliders-h text-primary me-2"></i>
                                Options Avancées
                            </h5>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="certificat" checked>
                                    <label class="form-check-label" for="certificat">
                                        Inclure un certificat
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="acces_illimite" checked>
                                    <label class="form-check-label" for="acces_illimite">
                                        Accès illimité
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="support_questions">
                                    <label class="form-check-label" for="support_questions">
                                        Support questions/réponses
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="telechargement_videos">
                                    <label class="form-check-label" for="telechargement_videos">
                                        Téléchargement des vidéos
                                    </label>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="button" class="btn btn-outline-warning btn-sm w-100"
                                    onclick="ajouterModule()">
                                    <i class="las la-plus me-1"></i> Ajouter un module
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Module -->
        <div class="modal fade" id="moduleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nouveau Module</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="moduleTitre" class="form-label">Titre du module *</label>
                            <input type="text" class="form-control" id="moduleTitre" required>
                        </div>
                        <div class="mb-3">
                            <label for="moduleDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="moduleDescription" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="moduleDuree" class="form-label">Durée estimée (minutes)</label>
                            <input type="number" class="form-control" id="moduleDuree" value="30">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type de contenu</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="moduleType" id="moduleVideo"
                                    value="video" checked>
                                <label class="form-check-label" for="moduleVideo">
                                    Vidéo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="moduleType" id="moduleDocument"
                                    value="document">
                                <label class="form-check-label" for="moduleDocument">
                                    Document
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="moduleType" id="moduleQuiz"
                                    value="quiz">
                                <label class="form-check-label" for="moduleQuiz">
                                    Quiz
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-warning" onclick="enregistrerModule()">
                            <i class="las la-save me-1"></i> Enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Initialisation
            document.addEventListener('DOMContentLoaded', function () {
                // Prévisualisation en temps réel
                document.getElementById('titre').addEventListener('input', updatePreview);
                document.getElementById('description').addEventListener('input', updatePreview);
                document.getElementById('categorie').addEventListener('change', updatePreview);
                document.getElementById('niveau').addEventListener('change', updatePreview);

                // Gestion de l'image
                document.getElementById('image').addEventListener('change', previewImage);

                // Gestion des tags
                document.getElementById('tagsInput').addEventListener('keypress', function (e) {
                    if (e.key === 'Enter' || e.key === ',') {
                        e.preventDefault();
                        ajouterTag(this.value.trim().replace(',', ''));
                        this.value = '';
                    }
                });

                // Validation du formulaire
                const form = document.getElementById('formationForm');
                form.addEventListener('submit', handleFormSubmit);
            });

            function updatePreview() {
                const titre = document.getElementById('titre').value;
                const description = document.getElementById('description').value;
                const categorie = document.getElementById('categorie').value;
                const niveau = document.getElementById('niveau').value;

                document.getElementById('previewTitle').textContent = titre || 'Titre de la formation';
                document.getElementById('previewDescription').textContent =
                    description ? (description.length > 100 ? description.substring(0, 100) + '...' : description) :
                        'Description apparaîtra ici...';

                if (categorie) {
                    const categories = <?= json_encode($categories) ?>;
                    document.getElementById('previewCategory').textContent = categories[categorie] || 'Catégorie';
                }

                if (niveau) {
                    document.getElementById('previewNiveau').textContent = niveau.charAt(0).toUpperCase() + niveau.slice(1);
                }
            }

            function previewImage(event) {
                const input = event.target;
                const preview = document.getElementById('imagePreview');
                const previewMain = document.getElementById('previewImage');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        previewMain.src = e.target.result;
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function ajouterTag(tag) {
                if (!tag.trim()) return;

                const container = document.getElementById('tagsContainer');

                const tagElement = document.createElement('div');
                tagElement.className = 'badge bg-secondary d-flex align-items-center gap-1';
                tagElement.innerHTML = `
        ${tag}
        <button type="button" class="btn-close btn-close-white" style="font-size: 0.5rem;" 
                onclick="supprimerTag(this)"></button>
    `;

                container.appendChild(tagElement);
            }

            function supprimerTag(button) {
                button.parentElement.remove();
            }

            function ajouterModule() {
                const modal = new bootstrap.Modal(document.getElementById('moduleModal'));
                modal.show();
            }

            function enregistrerModule() {
                const titre = document.getElementById('moduleTitre').value.trim();
                const description = document.getElementById('moduleDescription').value.trim();
                const duree = document.getElementById('moduleDuree').value;
                const type = document.querySelector('input[name="moduleType"]:checked').value;

                if (!titre) {
                    alert('Veuillez entrer un titre pour le module.');
                    return;
                }

                // Ici, vous ajouteriez le module à la base de données
                console.log('Module ajouté:', { titre, description, duree, type });

                // Fermer le modal
                bootstrap.Modal.getInstance(document.getElementById('moduleModal')).hide();

                // Réinitialiser le formulaire
                document.getElementById('moduleTitre').value = '';
                document.getElementById('moduleDescription').value = '';
                document.getElementById('moduleDuree').value = '30';

                // Afficher un message de succès
                showToast('Module ajouté avec succès', 'success');
            }

            async function handleFormSubmit(event) {
                event.preventDefault();

                const form = event.target;
                if (!form.checkValidity()) {
                    event.stopPropagation();
                    form.classList.add('was-validated');
                    return;
                }

                // Récupérer les données du formulaire
                const formData = {
                    titre: document.getElementById('titre').value,
                    description: document.getElementById('description').value,
                    categorie: document.getElementById('categorie').value,
                    niveau: document.getElementById('niveau').value,
                    duree: document.getElementById('duree').value,
                    prix: document.getElementById('prix').value,
                    statut: document.getElementById('statut').value,
                    objectifs: document.getElementById('objectifs').value,
                    prerequis: document.getElementById('prerequis').value,
                    options: {
                        certificat: document.getElementById('certificat').checked,
                        acces_illimite: document.getElementById('acces_illimite').checked,
                        support_questions: document.getElementById('support_questions').checked,
                        telechargement_videos: document.getElementById('telechargement_videos').checked
                    }
                };

                // Récupérer les tags
                const tags = Array.from(document.querySelectorAll('#tagsContainer .badge'))
                    .map(badge => badge.childNodes[0].textContent.trim());
                formData.tags = tags;

                // Récupérer l'image
                const imageInput = document.getElementById('image');
                if (imageInput.files.length > 0) {
                    const image = imageInput.files[0];
                    formData.image = image;
                }

                // Désactiver les boutons
                const submitButtons = form.querySelectorAll('button[type="submit"], button[name="action"]');
                submitButtons.forEach(btn => {
                    btn.disabled = true;
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Enregistrement...';
                    btn.dataset.originalText = originalText;
                });

                try {
                    // Ici, vous feriez une requête AJAX pour enregistrer
                    // Simuler l'enregistrement
                    await simulerEnregistrement(formData);

                    // Afficher le message de succès
                    showToast('Formation enregistrée avec succès', 'success');

                    // Rediriger après 2 secondes
                    setTimeout(() => {
                        window.location.href = '<?= BASE_URL ?>public/admin/formations/';
                    }, 2000);

                } catch (error) {
                    // Réactiver les boutons
                    submitButtons.forEach(btn => {
                        btn.disabled = false;
                        btn.innerHTML = btn.dataset.originalText;
                    });

                    // Afficher l'erreur
                    showToast('Erreur lors de l\'enregistrement: ' + error.message, 'danger');
                }
            }

            function simulerEnregistrement(data) {
                return new Promise((resolve, reject) => {
                    setTimeout(() => {
                        // Simuler un succès dans 90% des cas
                        if (Math.random() > 0.1) {
                            console.log('Données enregistrées:', data);
                            resolve();
                        } else {
                            reject(new Error('Erreur serveur. Veuillez réessayer.'));
                        }
                    }, 2000);
                });
            }

            function showToast(message, type = 'info') {
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