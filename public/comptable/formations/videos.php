<?php
require_once '../../../includes/header.php';
require_once '../../../includes/sidebar.php';
// On simule des données venant de la BD
$shorts = [
    ['id' => 1, 'titre' => 'Gérer son budget', 'url' => '../../../assets/video.mp4', 'auteur' => '@finance_expert'],
    ['id' => 2, 'titre' => 'Investir en 60s', 'url' => '../../../assets/video.mp4', 'auteur' => '@coach_biz'],
];
?>

<style>
    /* Conteneur principal style TikTok */
    .shorts-container {
        height: calc(100vh - 70px);
        /* Ajuster selon votre header */
        overflow-y: scroll;
        scroll-snap-type: y mandatory;
        /* L'effet "aimant" du scroll */
        background: #000;
    }
    .shorts-container::-webkit-scrollbar {
        width: 0px;
        /* Cacher la scrollbar */
    }

    .short-video-section {
        height: 100%;
        width: 100%;
        scroll-snap-align: start;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    video {
        height: 100%;
        width: 100%;
        object-fit: cover;
        /* Remplit l'écran comme TikTok */
    }

    .video-overlay {
        position: absolute;
        bottom: 20px;
        left: 20px;
        color: white;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        z-index: 10;
    }

    .interaction-buttons {
        position: absolute;
        right: 15px;
        bottom: 100px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        color: white;
        text-align: center;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <!-- <div class="row">
                <div class="col-12 ">
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
            </div> -->
        

        <div class="row ">
            <div class="col-md-5 offset-md-3">
                <div class="shorts-container" id="shortsContainer">
                    <?php foreach ($shorts as $short): ?>
                        <div class="short-video-section">
                            <video loop class="short-video" onclick="togglePlay(this)">
                                <source src="<?= $short['url'] ?>" type="video/mp4">
                            </video>

                            <div class="video-overlay">
                                <h5><?= $short['auteur'] ?></h5>
                                <p><?= $short['titre'] ?></p>
                            </div>

                            <div class="interaction-buttons">
                                <div onclick="like()"><i class="las la-heart fs-1"></i><br><small>12k</small></div>
                                <div onclick="share()"><i class="las la-share fs-1"></i><br><small>Partager</small></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>



        <script>
            // Gestion de la lecture automatique au scroll
            const container = document.getElementById('shortsContainer');
            const videos = document.querySelectorAll('.short-video');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.play();
                    } else {
                        entry.target.pause();
                        entry.target.currentTime = 0;
                    }
                });
            }, { threshold: 0.7 });

            videos.forEach(video => observer.observe(video));

            function togglePlay(video) {
                if (video.paused) video.play();
                else video.pause();
            }
        </script>

<?php require_once '../../../includes/footer.php'; ?>