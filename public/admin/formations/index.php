<?php
// public/admin/formations/shorts.php
require_once '../../../includes/header.php';
require_once '../../../includes/sidebar.php';

// Simuler des données depuis la base de données
$shorts = [
    [
        'id' => 1,
        'titre' => '💡 Budget : 50/30/20',
        'description' => 'La règle de gestion budgétaire : 50% besoins, 30% envies, 20% épargne',
        'url' => '../../../assets/video.mp4',
        'miniature' => '../../../assets/images/users/avatar1.jpg',
        'auteur' => 'Coach Financier',
        'duree' => '0:45',
        'likes' => 1250,
        'partages' => 89,
        'date' => '2024-03-10',
        'hashtags' => ['budget', 'finances', 'epargne'],
        'categorie' => 'finance_personnelle'
    ],
    [
        'id' => 2,
        'titre' => '💡 Budget : 50/30/20',
        'description' => 'La règle de gestion budgétaire : 50% besoins, 30% envies, 20% épargne',
        'url' => '../../../assets/video.mp4',
        'miniature' => '../../../assets/images/users/avatar1.jpg',
        'auteur' => 'Coach Financier',
        'duree' => '0:45',
        'likes' => 1250,
        'partages' => 89,
        'date' => '2024-03-10',
        'hashtags' => ['budget', 'finances', 'epargne'],
        'categorie' => 'finance_personnelle'
    ]
];

$categories = [
    'tous' => 'Tous les shorts',
    'finance_personnelle' => 'Finance Personnelle',
    'gestion_entreprise' => 'Gestion d\'Entreprise',
    'investissement' => 'Investissement',
    'crypto' => 'Cryptomonnaies',
    'epargne' => 'Épargne'
];
?>

<link rel="stylesheet" href="<?= CSS_URL ?>videos.css">
<div class="page-wrapper">
    <div class="page-content p-0">
        <!-- <div class="container-fluid"> -->
        <!-- Page Header -->
        <div class="tiktok-container">
            <!-- En-tête fixe -->
            <div class="tiktok-header">
                <div class="category-filters">
                    <?php foreach ($categories as $key => $label): ?>
                        <button class="category-filter <?= $key === 'tous' ? 'active' : '' ?>" data-category="<?= $key ?>">
                            <?= $label ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Flux de shorts -->
            <div class=" shorts-feed" id="shortsFeed">
                <?php foreach ($shorts as $short): ?>
                    <div class="short-item col-md-4 offset-md-4" data-category="<?= $short['categorie'] ?>">
                        <!-- Vidéo -->
                        <video class="short-video" preload="metadata" playsinline webkit-playsinline>
                            <source src="<?= $short['url'] ?>" type="video/mp4">
                            Votre navigateur ne supporte pas les vidéos.
                        </video>

                        <!-- Overlay d'information -->
                        <div class="video-overlay">
                            <div class="video-info">
                                <div class="author-info">
                                    <img src="<?= $short['miniature'] ?>" class="author-avatar"
                                        alt="<?= $short['auteur'] ?>">
                                    <div>
                                        <div class="author-name"><?= $short['auteur'] ?></div>
                                    </div>
                                </div>

                                <div class="video-title"><?= $short['titre'] ?></div>
                                <div class="video-description"><?= $short['description'] ?></div>
                            </div>
                        </div>

                        <!-- Barre latérale d'interactions -->
                        <div class="interaction-sidebar">
                            <div class="interaction-btn like-btn" onclick="toggleLike(this, <?= $short['id'] ?>)">
                                <i class="las la-heart"></i>
                                <span class="interaction-count"><?= formatNumber($short['likes']) ?></span>
                            </div>

                            <div class="interaction-btn comment-btn" onclick="openComments(<?= $short['id'] ?>)">
                                <i class="las la-comment"></i>
                                <span class="interaction-count">Commenter</span>
                            </div>

                            <div class="interaction-btn share-btn" onclick="shareShort(<?= $short['id'] ?>)">
                                <i class="las la-share"></i>
                                <span class="interaction-count"><?= formatNumber($short['partages']) ?></span>
                            </div>

                            <div class="interaction-btn save-btn" onclick="saveShort(<?= $short['id'] ?>)">
                                <i class="las la-bookmark"></i>
                                <span class="interaction-count">Sauvegarder</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Bouton flottant pour créer -->
            <button class="creation-floating-btn" onclick="openCreationModal()">
                <i class="las la-plus"></i>
            </button>
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
                        <form id="shortForm">
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
                                            <option value="finance_personnelle">Finance Personnelle</option>
                                            <option value="gestion_entreprise">Gestion d'Entreprise</option>
                                            <option value="investissement">Investissement</option>
                                            <option value="crypto">Cryptomonnaies</option>
                                            <option value="epargne">Épargne</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"></label>
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

        <script>
            <?php
            // Fonction helper pour formater les nombres
            function formatNumber($num)
            {
                if ($num >= 1000000) {
                    return round($num / 1000000, 1) . 'M';
                }
                if ($num >= 1000) {
                    return round($num / 1000, 1) . 'k';
                }
                return $num;
            }
            ?>

            document.addEventListener('DOMContentLoaded', function () {
                initializeShortsPlayer();
                setupCategoryFilters();
            });

            function initializeShortsPlayer() {
                const shortsFeed = document.getElementById('shortsFeed');
                const videos = document.querySelectorAll('.short-video');

                // Observer pour la lecture automatique
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        const video = entry.target;
                        if (entry.isIntersecting) {
                            video.play();
                        } else {
                            video.pause();
                            video.currentTime = 0;
                        }
                    });
                }, { threshold: 0.7 });

                videos.forEach(video => {
                    observer.observe(video);

                    // Gestion du clic sur la vidéo
                    video.addEventListener('click', function () {
                        if (video.paused) {
                            video.play();
                        } else {
                            video.pause();
                        }
                    });
                });

                // Double-clic pour liker
                shortsFeed.addEventListener('dblclick', function (e) {
                    const shortItem = e.target.closest('.short-item');
                    if (shortItem) {
                        const likeBtn = shortItem.querySelector('.like-btn');
                        toggleLike(likeBtn);

                        // Effet de coeur animé
                        const heart = document.createElement('div');
                        heart.innerHTML = '<i class="las la-heart" style="color: var(--tiktok-pink); font-size: 60px;"></i>';
                        heart.style.position = 'absolute';
                        heart.style.left = e.clientX + 'px';
                        heart.style.top = e.clientY + 'px';
                        heart.style.pointerEvents = 'none';
                        heart.style.animation = 'heartBurst 0.8s forwards';
                        document.body.appendChild(heart);

                        setTimeout(() => heart.remove(), 800);
                    }
                });
            }

            function setupCategoryFilters() {
                const filters = document.querySelectorAll('.category-filter');
                const shorts = document.querySelectorAll('.short-item');

                filters.forEach(filter => {
                    filter.addEventListener('click', function () {
                        // Mettre à jour le filtre actif
                        filters.forEach(f => f.classList.remove('active'));
                        this.classList.add('active');

                        const category = this.dataset.category;

                        // Filtrer les shorts
                        shorts.forEach(short => {
                            if (category === 'tous' || short.dataset.category === category) {
                                short.style.display = 'block';
                            } else {
                                short.style.display = 'none';
                            }
                        });
                    });
                });
            }

            function toggleLike(button, shortId) {
                const countElement = button.querySelector('.interaction-count');
                let count = parseInt(countElement.textContent.replace(/[kM]/, '')) *
                    (countElement.textContent.includes('k') ? 1000 :
                        countElement.textContent.includes('M') ? 1000000 : 1);

                if (button.classList.contains('active')) {
                    // Unlike
                    button.classList.remove('active');
                    count--;
                    // Envoyer la requête au serveur
                    updateLike(shortId, false);
                } else {
                    // Like
                    button.classList.add('active');
                    count++;
                    // Envoyer la requête au serveur
                    updateLike(shortId, true);
                }

                // Formater le compte
                countElement.textContent = formatCount(count);
            }

            function updateLike(shortId, liked) {
                // Requête AJAX pour mettre à jour les likes
                fetch('<?= BASE_URL ?>api/shorts/like.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        short_id: shortId,
                        liked: liked
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Like updated:', data);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            function openComments(shortId) {
                // Ouvrir le modal de commentaires
                // Vous pouvez implémenter cette fonction
                alert('Fonctionnalité commentaires à venir pour le short #' + shortId);
            }

            function shareShort(shortId) {
                // Partager le short
                const shareUrl = `<?= BASE_URL ?>public/admin/formations/short.php?id=${shortId}`;
                const shareText = 'Regarde ce conseil financier sur E-Kigega!';

                if (navigator.share) {
                    navigator.share({
                        title: 'Short financier',
                        text: shareText,
                        url: shareUrl,
                    });
                } else {
                    // Fallback pour navigateurs sans Web Share API
                    navigator.clipboard.writeText(shareUrl).then(() => {
                        alert('Lien copié dans le presse-papier !');
                    });
                }
            }

            function saveShort(shortId) {
                // Sauvegarder le short
                fetch('<?= BASE_URL ?>api/shorts/save.php', {
                    method: 'POST',
                    body: JSON.stringify({ short_id: shortId })
                })
                    .then(response => response.json())
                    .then(data => {
                        alert('Short sauvegardé dans vos favoris !');
                    });
            }

            function followAuthor(button) {
                if (button.textContent === 'Suivre') {
                    button.textContent = 'Suivi';
                    button.style.background = 'var(--tiktok-light-gray)';
                } else {
                    button.textContent = 'Suivre';
                    button.style.background = 'var(--tiktok-pink)';
                }
            }

            function openCreationModal() {
                const modal = new bootstrap.Modal(document.getElementById('creationModal'));
                modal.show();
            }

            function formatCount(count) {
                if (count >= 1000000) {
                    return (count / 1000000).toFixed(1) + 'M';
                }
                if (count >= 1000) {
                    return (count / 1000).toFixed(1) + 'k';
                }
                return count;
            }

            // Ajouter les styles d'animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes heartBurst {
                    0% {
                        transform: translate(-50%, -50%) scale(0);
                        opacity: 1;
                    }
                    50% {
                        transform: translate(-50%, -100%) scale(1);
                        opacity: 1;
                    }
                    100% {
                        transform: translate(-50%, -150%) scale(1.5);
                        opacity: 0;
                    }
                }
                `;
            document.head.appendChild(style);
        </script>

        <?php require_once '../../../includes/footer.php'; ?>