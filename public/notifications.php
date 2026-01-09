<?php 
include '../includes/header.php';
include '../includes/sidebar.php';

?>

<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
         <div class="container-fluid">
            <!-- Page Header -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Notifications</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Notifications</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Notifications Summary -->
            <div class="row">
                <div class="col-12">
                    <div class="card bg-light-warning">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <h6 class="mb-2 fw-medium text-dark fs-18">Notifications Récentes</h6>
                                    <p class="text-body fs-14 mb-0">
                                        Restez informé des dernières activités et mises à jour de votre boutique.
                                    </p>
                                </div>
                                <div class="col-md-3 text-md-end mt-3 mt-md-0">
                                    <button type="button" class="btn btn-warning">Toutes les notifications</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Today's Notifications -->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card-body mb-2">
                        <h5 class="text-body m-0">Aujourd'hui</h5>
                        <span class="badge bg-warning ms-2">3</span>
                    </div>

                    <!-- Notification Item Template -->
                    <?php 
                    // Données de notifications pour le commerce
                    $todayNotifications = [
                        [
                            'avatar' => 'assets/images/users/user-1.jpg',
                            'title' => 'Nouvelle commande #CMD-001245',
                            'time' => '10:30',
                            'message' => 'Une nouvelle commande a été passée par Jean Dupont. Montant total : 245€',
                            'type' => 'order'
                        ],
                        [
                            'avatar' => 'assets/images/users/user-2.jpg',
                            'title' => 'Avis client reçu',
                            'time' => '09:15',
                            'message' => 'Marie Martin a laissé un avis 5 étoiles sur le produit "Smartphone Pro".',
                            'type' => 'review'
                        ],
                        [
                            'avatar' => 'assets/images/users/user-3.jpg',
                            'title' => 'Stock faible alerte',
                            'time' => '08:45',
                            'message' => 'Le produit "Écouteurs Bluetooth" est presque épuisé. Restant : 3 unités.',
                            'type' => 'stock'
                        ]
                    ];
                    
                    $yesterdayNotifications = [
                        [
                            'avatar' => 'assets/images/users/user-4.jpg',
                            'title' => 'Paiement reçu',
                            'time' => '16:20',
                            'message' => 'Paiement confirmé pour la commande #CMD-001244. Montant : 89€',
                            'type' => 'payment'
                        ],
                        [
                            'avatar' => 'assets/images/users/user-5.jpg',
                            'title' => 'Demande de retour',
                            'time' => '14:10',
                            'message' => 'Pierre Durand demande un retour pour le produit "Montre Connectée".',
                            'type' => 'return'
                        ]
                    ];
                    
                    $olderNotifications = [
                        [
                            'avatar' => 'assets/images/users/user-6.jpg',
                            'title' => 'Nouveau client inscrit',
                            'time' => '11:05',
                            'message' => 'Sophie Bernard s\'est inscrite sur votre boutique.',
                            'type' => 'customer'
                        ]
                    ];
                    ?>
                    
                    <!-- Aujourd'hui -->
                    <?php foreach ($todayNotifications as $notification): ?>
                    <div class="card mb-3 notification-card" data-type="<?= $notification['type'] ?>">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-10">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="notification-avatar">
                                                <img src="<?= $notification['avatar'] ?>" alt="" class="rounded-circle" width="48" height="48">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1 fw-medium text-dark fs-14">
                                                    <?= $notification['title'] ?>
                                                    <small class="text-muted ps-2"><?= $notification['time'] ?></small>
                                                </h6>
                                                <span class="notification-badge badge bg-<?= getNotificationBadge($notification['type']) ?>">
                                                    <?= getNotificationType($notification['type']) ?>
                                                </span>
                                            </div>
                                            <p class="text-muted mb-0 fs-13"><?= $notification['message'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end mt-2 mt-md-0">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="viewNotification(this)">
                                            Voir
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="deleteNotification(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- Hier -->
                    <div class="card-body mb-2 mt-4">
                        <h5 class="text-muted m-0">Hier</h5>
                        <span class="badge bg-secondary ms-2"><?= count($yesterdayNotifications) ?></span>
                    </div>
                    
                    <?php foreach ($yesterdayNotifications as $notification): ?>
                    <div class="card mb-3 notification-card" data-type="<?= $notification['type'] ?>">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-10">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="notification-avatar">
                                                <img src="<?= $notification['avatar'] ?>" alt="" class="rounded-circle" width="48" height="48">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1 fw-medium text-dark fs-14">
                                                    <?= $notification['title'] ?>
                                                    <small class="text-muted ps-2"><?= $notification['time'] ?></small>
                                                </h6>
                                                <span class="notification-badge badge bg-<?= getNotificationBadge($notification['type']) ?>">
                                                    <?= getNotificationType($notification['type']) ?>
                                                </span>
                                            </div>
                                            <p class="text-muted mb-0 fs-13"><?= $notification['message'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end mt-2 mt-md-0">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="viewNotification(this)">
                                            Voir
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="deleteNotification(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- Plus anciennes -->
                    <div class="card-body mb-2 mt-4">
                        <h5 class="text-muted m-0">Plus anciennes</h5>
                        <span class="badge bg-light text-dark ms-2"><?= count($olderNotifications) ?></span>
                    </div>
                    
                    <?php foreach ($olderNotifications as $notification): ?>
                    <div class="card mb-3 notification-card" data-type="<?= $notification['type'] ?>">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-10">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="notification-avatar">
                                                <img src="<?= $notification['avatar'] ?>" alt="" class="rounded-circle" width="48" height="48">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1 fw-medium text-dark fs-14">
                                                    <?= $notification['title'] ?>
                                                    <small class="text-muted ps-2"><?= $notification['time'] ?></small>
                                                </h6>
                                                <span class="notification-badge badge bg-<?= getNotificationBadge($notification['type']) ?>">
                                                    <?= getNotificationType($notification['type']) ?>
                                                </span>
                                            </div>
                                            <p class="text-muted mb-0 fs-13"><?= $notification['message'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end mt-2 mt-md-0">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="viewNotification(this)">
                                            Voir
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="deleteNotification(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <!-- No Notifications Message (Hidden by default) -->
            <div class="row" id="noNotifications" style="display: none;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <div class="mb-3">
                                <i class="fas fa-bell-slash fa-3x text-muted"></i>
                            </div>
                            <h5 class="text-muted">Aucune notification</h5>
                            <p class="text-muted mb-0">Vous n'avez aucune notification pour le moment.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-outline-secondary active" onclick="filterNotifications('all')">
                            Toutes
                        </button>
                    
                        <button class="btn btn-outline-success" onclick="filterNotifications('payment')">
                            Paiements
                        </button>
                        <button class="btn btn-outline-info" onclick="filterNotifications('review')">
                            Ventes
                        </button>
                        <button class="btn btn-outline-warning" onclick="filterNotifications('stock')">
                            Stock
                        </button>
                       
                    </div>
                </div>
            </div>

 


<script>
    // Fonctions utilitaires pour PHP (à mettre dans un fichier séparé en production)
    <?php
    function getNotificationBadge($type) {
        $badges = [
            'order' => 'primary',
            'payment' => 'success',
            'review' => 'info',
            'stock' => 'warning',
            'return' => 'danger',
            'customer' => 'purple'
        ];
        return $badges[$type] ?? 'secondary';
    }
    
    function getNotificationType($type) {
        $types = [
            'order' => 'Commande',
            'payment' => 'Paiement',
            'review' => 'Avis',
            'stock' => 'Stock',
            'return' => 'Retour',
            'customer' => 'Client'
        ];
        return $types[$type] ?? 'Notification';
    }
    ?>
    
    // Fonctions JavaScript
    function viewNotification(button) {
        const notificationCard = button.closest('.notification-card');
        const notificationTitle = notificationCard.querySelector('.fs-14').textContent.split('<')[0].trim();
        
        // Simuler l'action de visualisation
        notificationCard.classList.add('opacity-75');
        button.disabled = true;
        button.innerHTML = '<i class="fas fa-check me-1"></i> Vue';
        
        // Afficher une notification toast (simulée)
        showToast('Notification marquée comme vue : ' + notificationTitle, 'success');
    }
    
    function deleteNotification(button) {
        const notificationCard = button.closest('.notification-card');
        const notificationTitle = notificationCard.querySelector('.fs-14').textContent.split('<')[0].trim();
        
        // Demander confirmation
        if (confirm('Supprimer cette notification ?')) {
            // Animation de suppression
            notificationCard.style.transition = 'all 0.3s';
            notificationCard.style.opacity = '0';
            notificationCard.style.transform = 'translateX(100%)';
            
            setTimeout(() => {
                notificationCard.remove();
                updateNotificationCounts();
                showToast('Notification supprimée', 'warning');
            }, 300);
        }
    }
    
    function filterNotifications(type) {
        const buttons = document.querySelectorAll('.btn-outline-secondary, .btn-outline-primary, .btn-outline-success, .btn-outline-info, .btn-outline-warning, .btn-outline-danger');
        const notificationCards = document.querySelectorAll('.notification-card');
        
        // Mettre à jour les boutons actifs
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
        
        let visibleCount = 0;
        
        // Filtrer les notifications
        notificationCards.forEach(card => {
            if (type === 'all' || card.dataset.type === type) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        // Afficher/masquer le message "Aucune notification"
        const noNotifications = document.getElementById('noNotifications');
        if (visibleCount === 0) {
            noNotifications.style.display = 'block';
        } else {
            noNotifications.style.display = 'none';
        }
    }
    
    function updateNotificationCounts() {
        // Mettre à jour les compteurs (à implémenter avec du vrai code si nécessaire)
        const todayCount = document.querySelectorAll('.notification-card:not([style*="display: none"])').length;
        const todayBadge = document.querySelector('.card-body.mb-2 .badge');
        if (todayBadge) {
            todayBadge.textContent = todayCount;
        }
    }
    
    function showToast(message, type = 'info') {
        // Créer ou réutiliser le toast
        let toast = document.getElementById('notificationToast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'notificationToast';
            toast.style.cssText = `
                position: fixed;
                bottom: 20px;
                right: 20px;
                padding: 12px 20px;
                border-radius: 8px;
                color: white;
                font-weight: 500;
                z-index: 1050;
                opacity: 0;
                transform: translateY(20px);
                transition: all 0.3s ease;
                max-width: 300px;
            `;
            document.body.appendChild(toast);
        }
        
        // Définir la couleur selon le type
        const colors = {
            success: '#28a745',
            warning: '#ffc107',
            error: '#dc3545',
            info: '#17a2b8'
        };
        
        toast.style.background = colors[type] || colors.info;
        toast.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        // Afficher
        setTimeout(() => {
            toast.style.opacity = '1';
            toast.style.transform = 'translateY(0)';
        }, 10);
        
        // Masquer après 3 secondes
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(20px)';
        }, 3000);
    }
    
    // Initialiser les filtres
    document.addEventListener('DOMContentLoaded', function() {
        // Marquer toutes les notifications comme non lues au chargement
        // (à adapter selon vos besoins)
        
        // Ajouter l'événement pour marquer comme lu au clic sur la carte
        document.querySelectorAll('.notification-card').forEach(card => {
            card.addEventListener('click', function(e) {
                // Ne pas déclencher si on clique sur les boutons
                if (!e.target.closest('button')) {
                    const viewBtn = this.querySelector('.btn-primary');
                    if (viewBtn && !viewBtn.disabled) {
                        viewNotification(viewBtn);
                    }
                }
            });
        });
    });
</script>