<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
session_start();

require_once('./../../../backend/function/function.php');
$role="ADMIN";

//================== gerer les session 
if(requireRole($role)==="Accès interdit"){
    header("Location: ./../../../index.php");
    session_destroy();
}

$entreprise=$_SESSION['entreprise'];
// Vérifier l’abonnement (SUPER_ADMIN n’en a pas besoin)
if ($_SESSION['role'] !== "SUPER_ADMIN") {
    abonnement("./../../index.php", $entreprise);
}


// ================== fetch les categories
$videos = getApi('/api/videos/') ?? [];
if (!is_array($videos)) {
    echo "<div class='alert alert-danger'>Erreur API Categories</div>";
    $videos = [];
}

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
    'auteur_id' => 1,
    'duree' => '0:45',
    'likes' => 1250,
    'partages' => 89,
    'commentaires' => 45,
    'date' => '2024-03-10',
    'hashtags' => ['budget', 'finances', 'epargne'],
    'categorie' => 'finance_personnelle'
],
[
    'id' => 2,
    'titre' => '💡 Crypto : débuter en 2024',
    'description' => 'Les bases pour commencer à investir dans les cryptomonnaies cette année',
    'url' => '../../../assets/video.mp4',
    'miniature' => '../../../assets/images/users/avatar2.jpg',
    'auteur' => 'Expert Crypto',
    'auteur_id' => 2,
    'duree' => '0:52',
    'likes' => 890,
    'partages' => 34,
    'commentaires' => 28,
    'date' => '2024-03-15',
    'hashtags' => ['crypto', 'bitcoin', 'investissement'],
    'categorie' => 'crypto'
]
];

// Simuler des commentaires
$commentairesParShort = [
1 => [
    [
        'id' => 1,
        'user_id' => 3,
        'username' => 'Marie92',
        'avatar' => '../../../assets/images/users/avatar3.jpg',
        'comment' => 'Super conseil ! Je vais appliquer cette méthode ce mois-ci 👍',
        'likes' => 12,
        'date' => '2024-03-10 14:30',
        'replies' => [
            [
                'id' => 11,
                'user_id' => 1,
                'username' => 'Coach Financier',
                'avatar' => '../../../assets/images/users/avatar1.jpg',
                'comment' => 'Content que ça te soit utile ! N\'hésite pas à partager tes résultats',
                'likes' => 3,
                'date' => '2024-03-10 15:00'
            ]
        ]
    ],
    [
        'id' => 2,
        'user_id' => 4,
        'username' => 'InvestisseurPro',
        'avatar' => '../../../assets/images/users/avatar4.jpg',
        'comment' => 'Cette méthode est efficace pour débuter, mais il faut l\'adapter selon ses revenus',
        'likes' => 8,
        'date' => '2024-03-11 09:15'
    ]
],
2 => [
    [
        'id' => 3,
        'user_id' => 5,
        'username' => 'CryptoFan',
        'avatar' => '../../../assets/images/users/avatar5.jpg',
        'comment' => 'Quelles cryptos recommanderiez-vous pour un débutant ?',
        'likes' => 5,
        'date' => '2024-03-15 16:20'
    ]
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

// Compter le nombre de vidéos par catégorie
$countsByCategory = ['tous' => count($shorts)];
foreach ($categories as $key => $label) {
if ($key !== 'tous') {
    $countsByCategory[$key] = count(array_filter($shorts, function ($short) use ($key) {
        return $short['categorie'] === $key;
    }));
}
}
?>

<link rel="stylesheet" href="<?= CSS_URL ?>videos.css">


<div class="page-wrapper">
<div class="page-content p-0">
    <div class="container-fluid bg-body p-0">
        <!-- En-tête fixe -->
        <div class="tiktok-header">
            <div class="category-filters">
                <?php foreach ($categories as $key => $label): ?>
                    <button class="category-filter <?= $key === 'tous' ? 'active' : '' ?> 
                            <?= ($key !== 'tous' && $countsByCategory[$key] == 0) ? 'empty' : '' ?>"
                        data-category="<?= $key ?>">
                        <?= $label ?>
                        <?php if ($key !== 'tous'): ?>
                            <span class="count-badge"><?= $countsByCategory[$key] ?></span>
                        <?php endif; ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Message d'absence de contenu -->
        <div class="no-content-message" id="noContentMessage">
            <div class="no-content-icon">
                <i class="las la-video-slash"></i>
            </div>
            <div class="no-content-title">Aucun short disponible</div>
            <div class="no-content-description">
                Cette catégorie ne contient pas encore de contenu. Soyez le premier à créer un short !
            </div>
            <button class="create-first-btn" onclick="openCreationModal()">
                <i class="las la-plus me-1"></i> Créer le premier
            </button>
        </div>

        <!-- Flux de shorts -->
        <div class="shorts-feed" id="shortsFeed">
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
                                <img src="<?= IMAGES_URL ?>logos/ekigega-logo.png" class="author-avatar"
                                    alt="E-kigega Logo">
                                <div>
                                    <div class="author-name">E-kigega</div>

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
                            <span class="interaction-count"><?= formatNumber($short['commentaires']) ?></span>
                        </div>

                        <div class="interaction-btn share-btn" onclick="openShareModal(<?= $short['id'] ?>)">
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

    <!-- Modal des commentaires -->
    <div class="comments-modal" id="commentsModal">
        <div class="comments-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Commentaires</h5>
                <button type="button" class="btn-close btn-close-white" onclick="closeComments()"></button>
            </div>
            <div class="comment-count mt-2" id="commentCount"></div>
        </div>

        <div class="comments-body" id="commentsBody">
            <!-- Les commentaires seront chargés ici dynamiquement -->
        </div>

        <div class="comment-input-container">
            <div class="comment-input-wrapper">
                <input type="text" class="comment-input" id="commentInput" placeholder="Ajouter un commentaire..."
                    maxlength="300">
                <button class="send-comment-btn" onclick="postComment()">
                    <i class="las la-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Overlay pour le modal des commentaires -->
    <div class="modal-overlay" id="commentsOverlay" onclick="closeComments()"></div>

    <!-- Modal de partage -->
    <div class="share-modal-overlay" id="shareModalOverlay">
        <div class="share-modal">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Partager ce short</h5>
                <button type="button" class="btn-close btn-close-white" onclick="closeShareModal()"></button>
            </div>

            <div class="share-options" id="shareOptions">
                <!-- Options de partage générées dynamiquement -->
            </div>

            <div class="share-link-container">
                <input type="text" class="share-link" id="shareLink" readonly>
                <button class="copy-link-btn" onclick="copyShareLink()">
                    <i class="las la-copy me-1"></i> Copier
                </button>
            </div>

            <div class="mt-4 text-center">
                <button class="btn btn-secondary" onclick="closeShareModal()">
                    Fermer
                </button>
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

        // Variables globales
        let currentShortId = null;
        let commentsData = <?= json_encode($commentairesParShort) ?>;
        let currentCommentPage = 1;
        const commentsPerPage = 10;

        document.addEventListener('DOMContentLoaded', function () {
            initializeShortsPlayer();
            setupCategoryFilters();
            updateEmptyStates();
            initializeCommentModal();
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
            const noContentMessage = document.getElementById('noContentMessage');

            filters.forEach(filter => {
                filter.addEventListener('click', function () {
                    // Vérifier si la catégorie est vide
                    const category = this.dataset.category;
                    const isEmpty = this.classList.contains('empty') && category !== 'tous';

                    // Mettre à jour le filtre actif
                    filters.forEach(f => f.classList.remove('active'));
                    this.classList.add('active');

                    // Afficher/masquer les vidéos
                    let hasVisibleContent = false;

                    shorts.forEach(short => {
                        if (category === 'tous' || short.dataset.category === category) {
                            short.style.display = 'block';
                            hasVisibleContent = true;
                        } else {
                            short.style.display = 'none';
                        }
                    });

                    // Afficher ou masquer le message d'absence de contenu
                    if (isEmpty || !hasVisibleContent) {
                        noContentMessage.classList.add('active');
                        // Mettre à jour le texte du message si nécessaire
                        if (category !== 'tous') {
                            const categoryName = this.textContent.replace(/\(\d+\)|\(vide\)/g, '').trim();
                            noContentMessage.querySelector('.no-content-title').textContent =
                                `Aucun short dans "${categoryName}"`;
                        }
                    } else {
                        noContentMessage.classList.remove('active');
                    }
                });
            });
        }

        function updateEmptyStates() {
            // Vérifier et désactiver les catégories vides au chargement
            const emptyFilters = document.querySelectorAll('.category-filter.empty');
            const noContentMessage = document.getElementById('noContentMessage');

            // Vérifier si la catégorie active est vide
            const activeFilter = document.querySelector('.category-filter.active');
            if (activeFilter && activeFilter.classList.contains('empty') &&
                activeFilter.dataset.category !== 'tous') {
                noContentMessage.classList.add('active');
            }
        }

        function initializeCommentModal() {
            // Gestion de la touche Entrée pour envoyer un commentaire
            document.getElementById('commentInput').addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    postComment();
                }
            });
        }

        // FONCTIONS DE COMMENTAIRES
        function openComments(shortId) {
            currentShortId = shortId;
            const modal = document.getElementById('commentsModal');
            const overlay = document.getElementById('commentsOverlay');

            // Charger les commentaires
            loadComments(shortId);

            // Afficher le modal
            modal.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';

            // Focus sur le champ de commentaire
            setTimeout(() => {
                document.getElementById('commentInput').focus();
            }, 300);
        }

        function closeComments() {
            const modal = document.getElementById('commentsModal');
            const overlay = document.getElementById('commentsOverlay');

            modal.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';

            // Réinitialiser
            currentShortId = null;
            currentCommentPage = 1;
        }

        function loadComments(shortId) {
            const commentsBody = document.getElementById('commentsBody');
            const commentCount = document.getElementById('commentCount');

            // Récupérer les commentaires depuis les données simulées
            const comments = commentsData[shortId] || [];

            // Mettre à jour le compteur
            commentCount.textContent = `${comments.length} commentaire${comments.length > 1 ? 's' : ''}`;

            // Afficher les commentaires
            if (comments.length === 0) {
                commentsBody.innerHTML = `
                    <div class="text-center py-5">
                        <i class="las la-comment-slash" style="font-size: 48px; color: #ccc;"></i>
                        <p class="mt-3 text-muted">Soyez le premier à commenter !</p>
                    </div>
                `;
                return;
            }

            let html = '';
            comments.forEach(comment => {
                html += renderComment(comment);
            });

            commentsBody.innerHTML = html;
        }

        function renderComment(comment) {
            const isLiked = checkIfCommentLiked(comment.id);
            const likeClass = isLiked ? 'liked' : '';

            let repliesHtml = '';
            if (comment.replies && comment.replies.length > 0) {
                repliesHtml = '<div class="replies mt-3 ms-4">';
                comment.replies.forEach(reply => {
                    repliesHtml += renderComment(reply);
                });
                repliesHtml += '</div>';
            }

            return `
                <div class="comment-item">
                    <div class="comment-header">

                        <img src="<?= IMAGES_URL ?>users/avatar.png" class="comment-avatar border border-warning" alt="${comment.username}">

                        <div>
                            <span class="comment-username">${comment.username}</span>
                            <span class="comment-date">${formatDate(comment.date)}</span>
                        </div>
                    </div>
                    <div class="comment-text">${escapeHtml(comment.comment)}</div>
                    <div class="comment-actions">
                        <button class="comment-like-btn ${likeClass}" onclick="toggleCommentLike(${comment.id}, this)">
                            <i class="las la-heart"></i>
                            <span>${comment.likes}</span>
                        </button>
                        <button class="reply-btn" onclick="showReplyForm(${comment.id})">
                            Répondre
                        </button>
                    </div>
                    ${repliesHtml}
                    <div class="reply-form" id="replyForm${comment.id}" style="display: none;">
                        <div class="comment-input-wrapper">
                            <input type="text" class="comment-input" id="replyInput${comment.id}" 
                                    placeholder="Écrire une réponse..." maxlength="300">
                            <button class="send-comment-btn " onclick="postReply(${comment.id})">
                                <i class="las la-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }

        function postComment() {
            if (!currentShortId) return;

            const input = document.getElementById('commentInput');
            const commentText = input.value.trim();

            if (!commentText) {
                showToast('Veuillez écrire un commentaire', 'warning');
                return;
            }

            // Simuler l'envoi au serveur
            const newComment = {
                id: Date.now(),
                user_id: 1,
                username: 'Vous',
                avatar: '../../../assets/images/users/default.jpg',
                comment: commentText,
                likes: 0,
                date: new Date().toISOString(),
                replies: []
            };

            // Ajouter aux données locales
            if (!commentsData[currentShortId]) {
                commentsData[currentShortId] = [];
            }
            commentsData[currentShortId].unshift(newComment);

            // Mettre à jour l'affichage
            loadComments(currentShortId);

            // Réinitialiser le champ
            input.value = '';

            // Mettre à jour le compteur de commentaires sur le short
            updateShortCommentCount();

            showToast('Commentaire publié avec succès', 'success');
        }

        function postReply(commentId) {
            const input = document.getElementById('replyInput' + commentId);
            const replyText = input.value.trim();

            if (!replyText) {
                showToast('Veuillez écrire une réponse', 'warning');
                return;
            }

            // Trouver le commentaire parent
            const comments = commentsData[currentShortId];
            const parentComment = findCommentById(comments, commentId);

            if (parentComment) {
                const newReply = {
                    id: Date.now(),
                    user_id: 1,
                    username: 'Vous',
                    avatar: '../../../assets/images/users/default.jpg',
                    comment: replyText,
                    likes: 0,
                    date: new Date().toISOString()
                };

                if (!parentComment.replies) {
                    parentComment.replies = [];
                }
                parentComment.replies.push(newReply);

                // Recharger les commentaires
                loadComments(currentShortId);

                // Réinitialiser le champ
                input.value = '';
                document.getElementById('replyForm' + commentId).style.display = 'none';

                showToast('Réponse publiée avec succès', 'success');
            }
        }

        function toggleCommentLike(commentId, button) {
            const likeCount = button.querySelector('span');
            let count = parseInt(likeCount.textContent);

            if (button.classList.contains('liked')) {
                // Unlike
                button.classList.remove('liked');
                count--;
                updateCommentLike(commentId, false);
            } else {
                // Like
                button.classList.add('liked');
                count++;
                updateCommentLike(commentId, true);
            }

            likeCount.textContent = count;
        }

        function showReplyForm(commentId) {
            const form = document.getElementById('replyForm' + commentId);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';

            if (form.style.display === 'block') {
                setTimeout(() => {
                    document.getElementById('replyInput' + commentId).focus();
                }, 100);
            }
        }

        // FONCTIONS DE PARTAGE
        function openShareModal(shortId) {
            currentShortId = shortId;
            const modal = document.getElementById('shareModalOverlay');
            const shareLink = `<?= BASE_URL ?>public/admin/formations/index.php?id=${shortId}`;

            // Mettre à jour le lien de partage
            document.getElementById('shareLink').value = shareLink;

            // Générer les options de partage
            const shareOptions = document.getElementById('shareOptions');
            shareOptions.innerHTML = generateShareOptions(shareLink);

            // Afficher le modal
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';

            // Incrémenter le compteur de partages
            incrementShareCount(shortId);
        }

        function closeShareModal() {
            const modal = document.getElementById('shareModalOverlay');
            modal.classList.remove('active');
            document.body.style.overflow = '';
            currentShortId = null;
        }

        function generateShareOptions(shareLink) {
            const shareText = 'Regarde ce conseil financier sur E-Kigega!';
            const encodedText = encodeURIComponent(shareText);
            const encodedUrl = encodeURIComponent(shareLink);

            return `
                <button class="share-option" onclick="shareToFacebook('${encodedUrl}', '${encodedText}')">
                    <div class="share-icon facebook">
                        <i class="iconoir-facebook"></i>
                    </div>
                    <span>Facebook</span>
                </button>
                
                <button class="share-option" onclick="shareToTwitter('${encodedUrl}', '${encodedText}')">
                    <div class="share-icon twitter">
                        <i class="iconoir-twitter"></i>
                    </div>
                    <span>Twitter</span>
                </button>
                
                <button class="share-option" onclick="shareToWhatsApp('${encodedUrl}', '${encodedText}')">
                    <div class="share-icon whatsapp">
                        <i class="lab la-whatsapp"></i>
                    </div>
                    <span>WhatsApp</span>
                </button>
                
                <button class="share-option" onclick="shareToTelegram('${encodedUrl}', '${encodedText}')">
                    <div class="share-icon telegram">
                        <i class="iconoir-telegram"></i>
                    </div>
                    <span>Telegram</span>
                </button>
                
                <button class="share-option" onclick="copyShareLink()">
                    <div class="share-icon copy">
                        <i class="las la-copy"></i>
                    </div>
                    <span>Copier le lien</span>
                </button>
                
                <button class="share-option" onclick="embedShort()">
                    <div class="share-icon embed">
                        <i class="las la-code"></i>
                    </div>
                    <span>Code embed</span>
                </button>
            `;
        }

        function shareToFacebook(url, text) {
            const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}`;
            window.open(facebookUrl, '_blank', 'width=600,height=400');
        }

        function shareToTwitter(url, text) {
            const twitterUrl = `https://twitter.com/intent/tweet?url=${url}&text=${text}`;
            window.open(twitterUrl, '_blank', 'width=600,height=400');
        }

        function shareToWhatsApp(url, text) {
            const whatsappUrl = `https://wa.me/?text=${text}%20${url}`;
            window.open(whatsappUrl, '_blank');
        }

        function shareToTelegram(url, text) {
            const telegramUrl = `https://t.me/share/url?url=${url}&text=${text}`;
            window.open(telegramUrl, '_blank');
        }

        function copyShareLink() {
            const shareLink = document.getElementById('shareLink');
            shareLink.select();
            shareLink.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(shareLink.value).then(() => {
                showToast('Lien copié dans le presse-papier !', 'success');
            }).catch(err => {
                // Fallback pour les anciens navigateurs
                document.execCommand('copy');
                showToast('Lien copié !', 'success');
            });
        }

        function embedShort() {
            if (!currentShortId) return;

            const embedCode = `<iframe src="<?= BASE_URL ?>public/admin/formations/embed.php?id=${currentShortId}" width="320" height="568" frameborder="0" allowfullscreen></iframe>`;

            // Copier le code embed
            navigator.clipboard.writeText(embedCode).then(() => {
                showToast('Code embed copié !', 'success');
            });
        }

        // FONCTIONS UTILITAIRES
        function toggleLike(button, shortId) {
            const countElement = button.querySelector('.interaction-count');
            let count = parseInt(countElement.textContent.replace(/[kM]/, '')) *
                (countElement.textContent.includes('k') ? 1000 :
                    countElement.textContent.includes('M') ? 1000000 : 1);

            if (button.classList.contains('active')) {
                // Unlike
                button.classList.remove('active');
                count--;
                updateLike(shortId, false);
            } else {
                // Like
                button.classList.add('active');
                count++;
                updateLike(shortId, true);
            }

            // Formater le compte
            countElement.textContent = formatCount(count);
        }

        function incrementShareCount(shortId) {
            // Trouver le bouton de partage correspondant
            const shareBtn = document.querySelector(`.short-item[data-category] .share-btn`);
            if (shareBtn) {
                const countElement = shareBtn.querySelector('.interaction-count');
                let count = parseInt(countElement.textContent.replace(/[kM]/, '')) *
                    (countElement.textContent.includes('k') ? 1000 :
                        countElement.textContent.includes('M') ? 1000000 : 1);

                count++;
                countElement.textContent = formatCount(count);

                // Envoyer au serveur
                updateShareCount(shortId);
            }
        }

        function updateShortCommentCount() {
            if (!currentShortId) return;

            // Trouver le bouton de commentaires correspondant
            const commentBtn = document.querySelector(`.short-item[data-category] .comment-btn`);
            if (commentBtn) {
                const countElement = commentBtn.querySelector('.interaction-count');
                let count = parseInt(countElement.textContent.replace(/[kM]/, '')) *
                    (countElement.textContent.includes('k') ? 1000 :
                        countElement.textContent.includes('M') ? 1000000 : 1);

                count++;
                countElement.textContent = formatCount(count);
            }
        }

        function followAuthor(button, authorId) {
            if (button.textContent === 'Suivre') {
                button.textContent = 'Suivi';
                button.style.background = 'var(--tiktok-light-gray)';
                followUser(authorId, true);
            } else {
                button.textContent = 'Suivre';
                button.style.background = 'var(--tiktok-pink)';
                followUser(authorId, false);
            }
        }

        function saveShort(shortId) {
            // Sauvegarder le short
            fetch('<?= BASE_URL ?>api/shorts/save.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    short_id: shortId,
                    user_id: 1
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Short sauvegardé dans vos favoris !', 'success');
                    } else {
                        showToast(data.message || 'Erreur lors de la sauvegarde', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Erreur de connexion', 'error');
                });
        }

        function openCreationModal() {
            const modal = new bootstrap.Modal(document.getElementById('creationModal'));
            modal.show();
        }

        function createShort(event) {
            event.preventDefault();

            // Récupérer les données du formulaire
            const form = event.target;
            const formData = new FormData(form);

            // Ajouter l'ID utilisateur
            formData.append('user_id', 1);

            // Envoyer au serveur
            fetch('<?= BASE_URL ?>api/shorts/create.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Short publié avec succès !', 'success');
                        // Fermer le modal
                        bootstrap.Modal.getInstance(document.getElementById('creationModal')).hide();
                        // Recharger la page ou ajouter dynamiquement le nouveau short
                        setTimeout(() => location.reload(), 1500);
                    } else {
                        showToast(data.message || 'Erreur lors de la publication', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Erreur de connexion', 'error');
                });
        }

        // FONCTIONS D'APPEL API
        function updateLike(shortId, liked) {
            fetch('<?= BASE_URL ?>api/shorts/like.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    short_id: shortId,
                    liked: liked,
                    user_id: 1
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

        function updateShareCount(shortId) {
            fetch('<?= BASE_URL ?>api/shorts/share.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    short_id: shortId,
                    user_id: 1
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Share count updated:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function updateCommentLike(commentId, liked) {
            fetch('<?= BASE_URL ?>api/comments/like.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    comment_id: commentId,
                    liked: liked,
                    user_id: 1
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Comment like updated:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function followUser(authorId, follow) {
            fetch('<?= BASE_URL ?>api/users/follow.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    author_id: authorId,
                    follow: follow,
                    user_id: 1
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Follow status:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        // FONCTIONS HELPER
        function formatCount(count) {
            if (count >= 1000000) {
                return (count / 1000000).toFixed(1) + 'M';
            }
            if (count >= 1000) {
                return (count / 1000).toFixed(1) + 'k';
            }
            return count;
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffMs = now - date;
            const diffSec = Math.floor(diffMs / 1000);
            const diffMin = Math.floor(diffSec / 60);
            const diffHour = Math.floor(diffMin / 60);
            const diffDay = Math.floor(diffHour / 24);

            if (diffSec < 60) return 'À l\'instant';
            if (diffMin < 60) return `Il y a ${diffMin} min`;
            if (diffHour < 24) return `Il y a ${diffHour} h`;
            if (diffDay < 7) return `Il y a ${diffDay} j`;

            return date.toLocaleDateString('fr-FR');
        }

        function checkIfCommentLiked(commentId) {
            // Simuler la vérification des likes
            const likedComments = JSON.parse(localStorage.getItem('liked_comments') || '[]');
            return likedComments.includes(commentId);
        }

        function findCommentById(comments, commentId) {
            for (let comment of comments) {
                if (comment.id === commentId) return comment;
                if (comment.replies) {
                    const found = findCommentById(comment.replies, commentId);
                    if (found) return found;
                }
            }
            return null;
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        function showToast(message, type = 'info') {
            // Créer ou réutiliser un toast
            let toast = document.getElementById('toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'toast';
                toast.style.cssText = `
                    position: fixed;
                    bottom: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    padding: 12px 24px;
                    border-radius: 8px;
                    color: white;
                    font-weight: 500;
                    z-index: 9999;
                    opacity: 0;
                    transition: opacity 0.3s;
                `;
                document.body.appendChild(toast);
            }

            // Définir la couleur selon le type
            const colors = {
                success: '#4CAF50',
                error: '#f44336',
                warning: '#ff9800',
                info: '#2196F3'
            };

            toast.style.background = colors[type] || colors.info;
            toast.textContent = message;

            // Afficher
            toast.style.opacity = '1';

            // Masquer après 3 secondes
            setTimeout(() => {
                toast.style.opacity = '0';
            }, 3000);
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
            
            .follow-btn {
                background: var(--tiktok-pink);
                color: white;
                border: none;
                padding: 4px 12px;
                border-radius: 4px;
                font-size: 12px;
                cursor: pointer;
                margin-top: 2px;
                transition: background 0.2s;
            }
            
            .video-hashtags {
                margin-top: 10px;
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }
            
            .hashtag {
                background: rgba(255, 255, 255, 0.1);
                padding: 2px 8px;
                border-radius: 12px;
                font-size: 12px;
                color: #00b7ff;
            }
        `;
        document.head.appendChild(style);
    </script>

    <?php require_once '../../../includes/footer.php'; ?>