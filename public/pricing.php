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

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= IMAGES_URL ?>logos/ekigega-logo.JPEG">

    <!-- App css -->
    <link href="<?= CSS_URL ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= CSS_URL ?>icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= CSS_URL ?>app.min.css" rel="stylesheet" type="text/css" />

    <style>
        .pricing-comparison {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin-top: 50px;
        }

        .comparison-table th {
            background: var(--bs-warning);
            color: white;
            border: none;
        }

        .faq-section {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin-top: 50px;
        }

        .faq-item {
            border-bottom: 1px solid #f1f3fa;
            padding: 20px 0;
        }

        .cta-section {
            background: var(--bs-warning);
            color: white;
            border-radius: 15px;
            padding: 60px 40px;
            margin-top: 50px;
            text-align: center;
        }
    </style>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg position-sticky navbar-light bg-white shadow-sm" style="top:0px;z-index:100;">
        <div class="container">
            <a class="navbar-brand overflow-hidden p-0" href="<?= BASE_URL ?>">
                <img src="<?= IMAGES_URL ?>logos/ekigega-logo1.png" alt="E-Kigega" height="60">
                <!-- <span class="ms-2 fw-bold">E-Kigega</span> -->
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#plan">Tarifs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>#about">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>#contact">Contact</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a href="<?= BASE_URL ?>" class="btn btn-outline-warning">Connexion</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="<?= BASE_URL ?>public/register.php" class="btn btn-warning">Essai Gratuit</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-5 m-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold mb-4">Choisissez le plan qui correspond à votre entreprise</h1>
                    <p class="lead mb-4">Des solutions de gestion complètes adaptées à toutes les tailles d'entreprise.
                        Commencez gratuitement ou passez à un plan premium pour débloquer toutes les fonctionnalités.
                    </p>

                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <span class="me-3">Facturation mensuelle</span>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="billingSwitch">
                            <label class="form-check-label" for="billingSwitch"></label>
                        </div>
                        <span class="ms-3">Facturation annuelle <span class="badge bg-success">Économisez
                                20%</span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Plans -->
    <section class="container" id="plan">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h6 class="pt-3 pb-2 m-0 fs-18 fw-medium">Basic plan</h6>
                            <p class="text-muted pt-2 mb-0">It is a long established fact that a reader will be
                                distracted by the readable.</p>
                            <div class="pt-3">
                                <h1 class="d-inline-block fw-bold pricing-price">$39.00</h1>
                                <small class="font-12 text-muted pricing-period">/month</small>
                            </div>
                            <hr class="hr-dashed">
                            <ul class="list-unstyled pricing-content text-start pt-3 border-0 mb-0">
                                <li>30GB Disk Space</li>
                                <li>30 Email Accounts</li>
                                <li>30GB Monthly Bandwidth</li>
                                <li>06 Subdomains</li>
                                <li>10 Domains</li>
                            </ul>
                            <a href="#" class="btn btn-dark py-2 px-5 mt-3 w-100"><span>Get Started</span></a>
                        </div><!--end pricing Table-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card ">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="badge bg-pink-subtle text-pink mt-0 py-1 px-2 mx-auto">Popular</span>
                            <h6 class="pt-3 pb-2 m-0 fs-18 fw-medium">Premium Plan</h6>
                            <p class="text-muted pt-2 mb-0">It is a long established fact that a reader will be
                                distracted by the readable.</p>
                            <div class="pt-3">
                                <h1 class="d-inline-block fw-bold" id="proPrice">39.000</h1>
                                <small class="font-12 text-muted">FBU/month</small>
                            </div>
                            <hr class="hr-dashed">
                            <ul class="list-unstyled pricing-content text-start pt-3 border-0 mb-0">
                                <li>30GB Disk Space</li>
                                <li>30 Email Accounts</li>
                                <li>30GB Monthly Bandwidth</li>
                                <li>06 Subdomains</li>
                                <li>10 Domains</li>
                            </ul>
                            <a href="#" class="btn btn-warning py-2 px-5 mt-3 w-100"><span>Get Started</span></a>
                        </div><!--end pricing Table-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card ">
                    <div class="card-body">
                        <div class="text-center">
                            <h6 class="pt-3 pb-2 m-0 fs-18 fw-medium">Plus Plan</h6>
                            <p class="text-muted pt-2 mb-0">It is a long established fact that a reader will be
                                distracted by the readable.</p>
                            <div class="pt-3">
                                <h1 class="d-inline-block fw-bold pricing-price" id="businessPrice">79.200</h1>
                                <small class="font-12 text-muted pricing-period">FBU/month</small>
                            </div>
                            <hr class="hr-dashed">
                            <ul class="list-unstyled pricing-content text-start pt-3 border-0 mb-0">
                                <li>30GB Disk Space</li>
                                <li>30 Email Accounts</li>
                                <li>30GB Monthly Bandwidth</li>
                                <li>06 Subdomains</li>
                                <li>10 Domains</li>
                            </ul>
                            <a href="#" class="btn btn-dark py-2 px-5 mt-3 w-100"><span>Get Started</span></a>
                        </div><!--end pricing Table-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card ">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="badge bg-warning-subtle text-warning mt-0 py-1 px-2 mx-auto">Solution sur
                                mesure</span>
                            <h6 class="pt-3 pb-2 m-0 fs-18 fw-medium">Plan Entreprise</h6>
                            <p class="text-muted pt-2 mb-0">Solution Complète</p>
                            <div class="pt-3">
                                <h1 class="d-inline-block fw-bold">Sur devis</h1>
                                <small class="font-12 text-muted">/Personnalisé</small>
                            </div>
                            <hr class="hr-dashed">
                            <ul class="list-unstyled pricing-content text-start pt-3 border-0 mb-0">
                                <li>30GB Disk Space</li>
                                <li>30 Email Accounts</li>
                                <li>30GB Monthly Bandwidth</li>
                                <li>06 Subdomains</li>
                                <li>10 Domains</li>
                            </ul>
                            <a href="#" class="btn btn-dark py-2 px-5 mt-3 w-100"><span>Contacter Nous </span></a>
                        </div><!--end pricing Table-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </section>

    <!-- Comparison Table -->
    <section class="container  bg-light p-5 " id="features">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Comparaison détaillée des fonctionnalités</h2>
            <p class="text-muted">Découvrez toutes les fonctionnalités incluses dans chaque plan</p>
        </div>

        <div class="table-responsive">
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
    </section>

    <!-- FAQ Section -->
    <section class="container faq-section">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Questions fréquentes</h2>
            <p class="text-muted">Trouvez des réponses aux questions les plus courantes</p>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="faq-item">
                    <h5 class="fw-bold">Puis-je changer de plan à tout moment ?</h5>
                    <p class="text-muted mb-0">Oui, vous pouvez mettre à niveau ou rétrograder votre plan à tout moment.
                        Les changements prendront effet au début de votre prochain cycle de facturation.</p>
                </div>

                <div class="faq-item">
                    <h5 class="fw-bold">Y a-t-il des frais d'installation ?</h5>
                    <p class="text-muted mb-0">Non, il n'y a aucun frais d'installation. Vous payez uniquement
                        l'abonnement mensuel ou annuel selon le plan choisi.</p>
                </div>

                <div class="faq-item">
                    <h5 class="fw-bold">Puis-je annuler mon abonnement à tout moment ?</h5>
                    <p class="text-muted mb-0">Oui, vous pouvez annuler votre abonnement à tout moment. Aucun frais
                        supplémentaire ne vous sera facturé après l'annulation.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="faq-item">
                    <h5 class="fw-bold">Quels modes de paiement acceptez-vous ?</h5>
                    <p class="text-muted mb-0">Nous acceptons les cartes de crédit/débit (Visa, MasterCard), les
                        virements bancaires et Mobile Money (Lumicash, E-Burundi).</p>
                </div>

                <div class="faq-item">
                    <h5 class="fw-bold">Mes données sont-elles sécurisées ?</h5>
                    <p class="text-muted mb-0">Absolument. Nous utilisons un chiffrement SSL 256-bit, des sauvegardes
                        quotidiennes et nos serveurs sont hébergés dans des centres de données sécurisés.</p>
                </div>

                <div class="faq-item">
                    <h5 class="fw-bold">Proposez-vous une période d'essai ?</h5>
                    <p class="text-muted mb-0">Oui, tous nos plans payants incluent une période d'essai gratuit de 14
                        jours. Aucune carte de crédit n'est requise pour commencer.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="container cta-section">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">Prêt à transformer votre gestion d'entreprise ?</h2>
                <p class="mb-4">Rejoignez plus de 500 entreprises qui font confiance à E-Kigega pour gérer leurs
                    opérations quotidiennes.</p>

                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <a href="<?= BASE_URL ?>register.php" class="btn btn-light btn-lg px-5">
                        <i class="las la-play-circle me-2"></i> Essayer gratuitement
                    </a>
                    <a href="<?= BASE_URL ?>contact.php" class="btn btn-outline-light btn-lg px-5">
                        <i class="las la-phone me-2"></i> Parler à un expert
                    </a>
                </div>

                <p class="mt-4 mb-0 fs-18">
                    <small>Questions ? Appelez-nous au <strong>+257 79 123 456</strong> ou écrivez-nous à
                        <strong>ventes@e-kigega.bi</strong></small>
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a class="navbar-brand mb-3" href="<?= BASE_URL ?>">
                        <img src="<?= IMAGES_URL ?>logos/logo.png" alt="E-Kigega" height="40"
                            class="bg-white p-1 rounded">
                        <span class="ms-2 fw-bold">E-Kigega</span>
                    </a>
                    <p class="text-light mt-2">Système de gestion complet pour les PME burundaises. Simplifiez vos
                        opérations, maximisez vos profits.</p>
                </div>

                <div class="col-lg-2">
                    <h5 class="fw-bold mb-3">Produit</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#features" class="text-light text-decoration-none">Fonctionnalités</a>
                        </li>
                        <li class="mb-2"><a href="pricing.php" class="text-light text-decoration-none">Tarifs</a></li>
                        <li class="mb-2"><a href="#updates" class="text-light text-decoration-none">Nouvelles
                                versions</a></li>
                    </ul>
                </div>

                <div class="col-lg-2">
                    <h5 class="fw-bold mb-3">Entreprise</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#about" class="text-light text-decoration-none">À propos</a></li>
                        <li class="mb-2"><a href="#team" class="text-light text-decoration-none">Équipe</a></li>
                        <li class="mb-2"><a href="#careers" class="text-light text-decoration-none">Carrières</a></li>
                    </ul>
                </div>

                <div class="col-lg-2">
                    <h5 class="fw-bold mb-3">Support</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#help" class="text-light text-decoration-none">Centre d'aide</a></li>
                        <li class="mb-2"><a href="#contact" class="text-light text-decoration-none">Contact</a></li>
                        <li class="mb-2"><a href="#status" class="text-light text-decoration-none">Statut du service</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2">
                    <h5 class="fw-bold mb-3">Légal</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#privacy" class="text-light text-decoration-none">Confidentialité</a>
                        </li>
                        <li class="mb-2"><a href="#terms" class="text-light text-decoration-none">Conditions</a></li>
                        <li class="mb-2"><a href="#cookies" class="text-light text-decoration-none">Cookies</a></li>
                    </ul>
                </div>
            </div>

            <hr class="bg-light my-4">

            <div class="row">
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
    </footer>

    <!-- JavaScript -->
    <script src="<?= LIBS_URL ?>bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const billingSwitch = document.getElementById('billingSwitch');
            const proPrice = document.getElementById('proPrice');
            const businessPrice = document.getElementById('businessPrice');

            const monthlyPrices = {
                pro: '49.000',
                business: '99.000'
            };

            const yearlyPrices = {
                pro: '39.200',
                business: '79.200'
            };

            billingSwitch.addEventListener('change', function () {
                if (this.checked) {
                    // Paiement mensuel
                    proPrice.textContent = monthlyPrices.pro;
                    businessPrice.textContent = monthlyPrices.business;
                } else {
                    // Paiement annuel (20% de réduction)
                    proPrice.textContent = yearlyPrices.pro;
                    businessPrice.textContent = yearlyPrices.business;
                }
            });


        });
    </script>
</body>

</html>