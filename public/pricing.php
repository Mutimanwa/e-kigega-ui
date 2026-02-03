<?php
include_once "../config/constantes.php";
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr" data-startbar="dark" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <title>Tarifs & Abonnements - E-Kigega Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Système de Gestion Complet pour les PME - E-Kigega" name="description" />
    <meta content="E-Kigega" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="index, follow">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= IMAGES_URL ?>logos/ekigega-logo.JPEG">
    <link rel="apple-touch-icon" href="<?= IMAGES_URL ?>logos/ekigega-logo2.png">

    <!-- App css -->
    <link href="<?= CSS_URL ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= CSS_URL ?>all_style.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- Barre de progression -->
    <div id="progressBar"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg position-sticky navbar-light shadow-sm" style="top:0px;z-index:1000;">
        <div class="container">
            <a class="navbar-brand overflow-hidden p-0" href="<?= BASE_URL ?>">
                <img src="<?= IMAGES_URL ?>logos/ekigega-logo2.png" alt="E-Kigega" height="60">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="position: relative;">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Tarifs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cta">Contact</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a href="<?= BASE_URL ?>" class="btn btn-outline-gradient-blue">Connexion</a>
                    </li>
                    <!-- Curseur de navigation animé -->
                    <div id="navCursor"></div>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Indicateurs de position (dots) -->
    <div class="position-indicators">
        <div class="position-dot" data-target="#hero" data-label="Accueil"></div>
        <div class="position-dot" data-target="#pricing" data-label="Tarifs"></div>
        <div class="position-dot" data-target="#features" data-label="Fonctionnalités"></div>
        <div class="position-dot" data-target="#faq" data-label="FAQ"></div>
        <div class="position-dot" data-target="#cta" data-label="Contact"></div>
    </div>


    <!-- Hero Section -->
    <section class="hero-section" id="hero">
        <div class="container fade-in">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-4 fw-bold mb-4">Choisissez le plan qui correspond à votre entreprise</h1>
                    <p class="lead mb-4">Des solutions de gestion complètes adaptées à toutes les tailles d'entreprise.
                        Commencez gratuitement ou passez à un plan premium pour débloquer toutes les fonctionnalités.
                    </p>

                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-4 mb-4">
                        <div class="d-flex align-items-center">
                            <span class="me-3 fw-medium">Facturation mensuelle</span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="billingSwitch" checked>
                                <label class="form-check-label" for="billingSwitch"></label>
                            </div>
                            <span class="ms-3 fw-medium">Facturation annuelle <span
                                    class="badge bg-success ms-2">Économisez 20%</span></span>
                        </div>
                    </div>

                    <a href="#pricing">
                        <div class="mt-4">
                            <a href="#pricing" class="btn btn-gradient-blue btn-lg">
                                <i class="las la-chart-bar me-2"></i> Voir nos plans
                            </a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Plans -->
    <section class="scroll-section" id="pricing">
        <div class="container">
            <div class="text-center mb-5 fade-in">
                <h2 class="fw-bold display-5 mb-3">Nos Plans Tarifaires</h2>
                <p class="text-muted fs-5">Choisissez le plan qui correspond le mieux à vos besoins</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3 fade-in" style="animation-delay: 0.1s">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h6 class="pt-3 pb-2 m-0 fs-5 fw-semibold">Basic plan</h6>
                                <p class="text-muted pt-2 mb-0">Solution idéale pour les startups et petites entreprises
                                </p>
                                <div class="pt-3">
                                    <h1 class="d-inline-block fw-bold pricing-price">$39.00</h1>
                                    <small class="font-12 text-muted pricing-period">/month</small>
                                </div>
                                <hr class="hr-dashed">
                                <ul class="list-unstyled pricing-content text-start pt-3 border-0 mb-0">
                                    <li>30GB Espace disque</li>
                                    <li>30 Comptes email</li>
                                    <li>30GB Bande passante</li>
                                    <li>06 Sous-domaines</li>
                                    <li>10 Domaines inclus</li>
                                </ul>
                                <a href="#" class="btn btn-dark py-2 px-5 mt-3 ">
                                    <span>Commencer</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 fade-in" style="animation-delay: 0.1s">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h6 class="pt-3 pb-2 m-0 fs-5 fw-semibold">Premium Plan</h6>
                                <p class="text-muted pt-2 mb-0">Parfait pour les entreprises en croissance</p>
                                <div class="pt-3">
                                    <h1 class="d-inline-block fw-bold" id="proPrice">39.000</h1>
                                    <small class="font-12 text-muted">FBU/mois</small>
                                </div>
                                <hr class="hr-dashed">
                                <ul class="list-unstyled pricing-content text-start pt-3 border-0 mb-0">
                                    <li>100GB Espace disque</li>
                                    <li>100 Comptes email</li>
                                    <li>100GB Bande passante</li>
                                    <li>25 Sous-domaines</li>
                                    <li>25 Domaines inclus</li>
                                </ul>
                                <a href="#" class="btn btn-dark py-2 px-5 mt-3">
                                    <span>Commencer</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 fade-in" style="animation-delay: 0.3s">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h6 class="pt-3 pb-2 m-0 fs-5 fw-semibold">Business Plan</h6>
                                <p class="text-muted pt-2 mb-0">Pour les entreprises établies</p>
                                <div class="pt-3">
                                    <h1 class="d-inline-block fw-bold pricing-price" id="businessPrice">79.200</h1>
                                    <small class="font-12 text-muted pricing-period">FBU/mois</small>
                                </div>
                                <hr class="hr-dashed">
                                <ul class="list-unstyled pricing-content text-start pt-3 border-0 mb-0">
                                    <li>250GB Espace disque</li>
                                    <li>250 Comptes email</li>
                                    <li>250GB Bande passante</li>
                                    <li>50 Sous-domaines</li>
                                    <li>50 Domaines inclus</li>
                                </ul>
                                <a href="#" class="btn btn-dark py-2 px-5 mt-3">
                                    <span>Commencer</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 fade-in" style="animation-delay: 0.4s">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <span class="badge bg-warning-subtle text-warning mt-0 py-1 px-2 mx-auto">Sur
                                    mesure</span>
                                <h6 class="pt-3 pb-2 m-0 fs-5 fw-semibold">Plan Entreprise</h6>
                                <p class="text-muted pt-2 mb-0">Solution complète personnalisée</p>
                                <div class="pt-3">
                                    <h4 class="d-inline-block fw-bold">Sur devis</h4>
                                    <small class="font-12 text-muted">/Personnalisé</small>
                                </div>
                                <hr class="hr-dashed">
                                <ul class="list-unstyled pricing-content text-start pt-3 border-0 mb-0">
                                    <li>Stockage illimité</li>
                                    <li>Comptes email illimités</li>
                                    <li>Bande passante illimitée</li>
                                    <li>Sous-domaines illimités</li>
                                    <li>Domaines illimités</li>
                                </ul>
                                <a href="#" class="btn btn-dark py-2 px-5 mt-3 w-100">
                                    <span>Nous contacter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comparison Table -->
    <section class="scroll-section" id="features">
        <div class="container">
            <div class="text-center mb-5 fade-in">
                <h2 class="fw-bold display-5 mb-3">Comparaison détaillée des fonctionnalités</h2>
                <p class="text-muted fs-5">Découvrez toutes les fonctionnalités incluses dans chaque plan</p>
            </div>

            <div class="table-responsive fade-in" style="animation-delay: 0.2s">
                <table class="table table-bordered comparison-table">
                    <thead>
                        <tr>
                            <th width="30%">Fonctionnalité</th>
                            <th class="text-center">Gratuit</th>
                            <th class="text-center">Professionnel</th>
                            <th class="text-center">Business</th>
                            <th class="text-center">Entreprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $features = [
                            ['Gestion des produits', '50 max', 'Illimité', 'Illimité', 'Illimité'],
                            ['Gestion des ventes', '100/mois', 'Illimité', 'Illimité', 'Illimité'],
                            ['Gestion des dépenses', '✓', '✓', '✓', '✓'],
                            ['Gestion des clients', '✓', '✓', '✓', '✓'],
                            ['Gestion du stock', '✓', '✓', '✓', '✓'],
                            ['Utilisateurs', '1', '5', '20', 'Illimité'],
                            ['Stockage', '500MB', '10GB', '50GB', 'Illimité'],
                            ['Rapports basiques', '✓', '✓', '✓', '✓'],
                            ['Rapports avancés', '✗', '✓', '✓', '✓'],
                            ['Rapports personnalisés', '✗', '✗', '✓', '✓'],
                            ['Formations financières', '✗', '✓', '✓', '✓'],
                            ['Formations premium', '✗', '✗', '✓', '✓'],
                            ['Support email', '✓', '✓', '✓', '✓'],
                            ['Support prioritaire', '✗', '✓', '✓', '✓'],
                            ['Support téléphonique', '✗', '✗', '24/7', 'Dédié'],
                            ['API d\'intégration', '✗', '✗', '✓', '✓'],
                            ['Export/Import', 'Basique', 'Basique', 'Avancé', 'Avancé'],
                            ['Formation en équipe', '✗', '✗', '✓', '✓'],
                            ['Analytics avancés', '✗', '✗', '✗', '✓'],
                            ['SLA garantie', '✗', '✗', '✗', '99,9%'],
                        ];

                        foreach ($features as $feature):
                            ?>
                            <tr>
                                <td class="fw-semibold"><?= $feature[0] ?></td>
                                <td class="text-center"><?= $feature[1] ?></td>
                                <td class="text-center"><?= $feature[2] ?></td>
                                <td class="text-center"><?= $feature[3] ?></td>
                                <td class="text-center"><?= $feature[4] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="scroll-section" id="faq">
        <div class="container">
            <div class="text-center mb-5 fade-in">
                <h2 class="fw-bold display-5 mb-3">Questions fréquentes</h2>
                <p class="text-muted fs-5">Trouvez des réponses aux questions les plus courantes</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="faq-item fade-in" style="animation-delay: 0.1s">
                        <h5 class="fw-bold">Puis-je changer de plan à tout moment ?</h5>
                        <p class="text-muted mb-0">Oui, vous pouvez mettre à niveau ou rétrograder votre plan à tout
                            moment.
                            Les changements prendront effet au début de votre prochain cycle de facturation.</p>
                    </div>

                    <div class="faq-item fade-in" style="animation-delay: 0.2s">
                        <h5 class="fw-bold">Y a-t-il des frais d'installation ?</h5>
                        <p class="text-muted mb-0">Non, il n'y a aucun frais d'installation. Vous payez uniquement
                            l'abonnement mensuel ou annuel selon le plan choisi.</p>
                    </div>

                    <div class="faq-item fade-in" style="animation-delay: 0.3s">
                        <h5 class="fw-bold">Puis-je annuler mon abonnement à tout moment ?</h5>
                        <p class="text-muted mb-0">Oui, vous pouvez annuler votre abonnement à tout moment. Aucun frais
                            supplémentaire ne vous sera facturé après l'annulation.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="faq-item fade-in" style="animation-delay: 0.4s">
                        <h5 class="fw-bold">Quels modes de paiement acceptez-vous ?</h5>
                        <p class="text-muted mb-0">Nous acceptons les cartes de crédit/débit (Visa, MasterCard), les
                            virements bancaires et Mobile Money (Lumicash, E-Burundi).</p>
                    </div>

                    <div class="faq-item fade-in" style="animation-delay: 0.5s">
                        <h5 class="fw-bold">Mes données sont-elles sécurisées ?</h5>
                        <p class="text-muted mb-0">Absolument. Nous utilisons un chiffrement SSL 256-bit, des
                            sauvegardes
                            quotidiennes et nos serveurs sont hébergés dans des centres de données sécurisés.</p>
                    </div>

                    <div class="faq-item fade-in" style="animation-delay: 0.6s">
                        <h5 class="fw-bold">Proposez-vous une période d'essai ?</h5>
                        <p class="text-muted mb-0">Oui, tous nos plans payants incluent une période d'essai gratuit de
                            14
                            jours. Aucune carte de crédit n'est requise pour commencer.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="scroll-section" id="cta">
        <div class="container">
            <div class="cta-section fade-in">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h2 class="fw-bold mb-4">Prêt à transformer votre gestion d'entreprise ?</h2>
                        <p class="mb-4 fs-5">Rejoignez plus de 500 entreprises qui font confiance à E-Kigega pour gérer
                            leurs
                            opérations quotidiennes.</p>

                        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                            <a href="#" class="btn btn-light btn-lg px-5 py-3 text-nowrap">
                                <i class="las la-comments me-2"></i>
                                Communique avec nous
                            </a>

                            <a href="#" class="btn btn-outline-light btn-lg px-5 py-3">
                                <i class="las la-phone me-2"></i> Parler à un expert
                            </a>
                        </div>

                        <p class="mt-5 mb-0 fs-18">
                            <small>Questions ? Appelez-nous au <strong>+257 79 123 456</strong> ou écrivez-nous à
                                <strong>ventes@e-kigega.bi</strong></small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <a class="navbar-brand mb-3 d-inline-flex align-items-center" href="<?= BASE_URL ?>">
                        <img src="<?= IMAGES_URL ?>logos/ekigega-logo2.png" alt="E-Kigega" height="40"
                            class="bg-white p-1 rounded me-2">
                        <span class="fw-bold">E-Kigega</span>
                    </a>
                    <p class="text-light mt-2">Système de gestion complet pour les PME burundaises. Simplifiez vos
                        opérations, maximisez vos profits.</p>
                </div>

                <div class="col-lg-2">
                    <h5>Produit</h5>
                    <ul class="list-unstyled">
                        <li><a href="#features" class="text-light text-decoration-none">Fonctionnalités</a></li>
                        <li><a href="#pricing" class="text-light text-decoration-none">Tarifs</a></li>
                        <li><a href="#updates" class="text-light text-decoration-none">Nouvelles versions</a></li>
                    </ul>
                </div>

                <div class="col-lg-2">
                    <h5>Entreprise</h5>
                    <ul class="list-unstyled">
                        <li><a href="#about" class="text-light text-decoration-none">À propos</a></li>
                        <li><a href="#team" class="text-light text-decoration-none">Équipe</a></li>
                        <li><a href="#careers" class="text-light text-decoration-none">Carrières</a></li>
                    </ul>
                </div>

                <div class="col-lg-2">
                    <h5>Support</h5>
                    <ul class="list-unstyled">
                        <li><a href="#help" class="text-light text-decoration-none">Centre d'aide</a></li>
                        <li><a href="#cta" class="text-light text-decoration-none">Contact</a></li>
                        <li><a href="#status" class="text-light text-decoration-none">Statut du service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2">
                    <h5>Légal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#privacy" class="text-light text-decoration-none">Confidentialité</a></li>
                        <li><a href="#terms" class="text-light text-decoration-none">Conditions</a></li>
                        <li><a href="#cookies" class="text-light text-decoration-none">Cookies</a></li>
                    </ul>
                </div>
            </div>

            <hr class="my-4">

            <div class="footer-bottom-section">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0">© <?= date('Y') ?> E-Kigega. Tous droits réservés.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="text-light fs-18 me-3"><i class="iconoir-facebook"></i></a>
                        <a href="#" class="text-light fs-18 me-3"><i class="iconoir-twitter"></i></a>
                        <a href="#" class="text-light fs-18 me-3"><i class="iconoir-linkedin"></i></a>
                        <a href="#" class="text-light fs-18"><i class="iconoir-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="<?= LIBS_URL ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= JS_URL ?>all.js"></script>
</body>

</html>