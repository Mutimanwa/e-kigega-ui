<?php include "./config/constantes.php"; ?>
<!DOCTYPE html>
<!-- Fix: correct HTML doctype/root element so browsers render consistently -->
<html lang="fr" dir="ltr" data-startbar="dark" data-bs-theme="light">

<head>


    <meta charset="utf-8" />
    <title><?= APP_NAME; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/logos/ekigega-logo.jpeg" type="image/x-icon">


    <!-- App css -->
    <link href="<?= CSS_URL ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= CSS_URL ?>icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= CSS_URL ?>app.min.css" rel="stylesheet" type="text/css" />

</head>
<!-- Top Bar Start -->

<body>
    <div class="container-xxl">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box rounded-top">
                                    <div class="text-center ">
                                        <a href="index.php" class="logo logo-admin">
                                            <img src="<?= IMAGES_URL ?>/logos/ekigega-logo1.png" height="150" alt="logo"
                                                class="auth-logo">
                                        </a>
                                        <p class="text-muted  fw-medium mb-0">Connectez-vous pour continuer sur
                                            e-kigega.</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <!-- formulare de connexions -->
                                    <form class="my-4" id="loginForm" onsubmit="disableForm(event)">
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Email</label>
                                            <input type="mail" class="form-control" id="username" name="mail"
                                                placeholder="Entrer votre email" required>
                                        </div><!--end form-group-->

                                        <div class="form-group position-relative mb-2">
                                            <label class="form-label" for="userpassword">Mot de passe</label>

                                            <input type="password" class="form-control pe-5" name="password"
                                                id="userpassword" placeholder="Entrer votre mot de passe" required>

                                            <span class="toggle-password" data-target="userpassword">
                                                <i class="iconoir-eye-closed"></i>
                                            </span>
                                        </div>
                                        <!--end form-group-->


                                        <div class="form-group row mt-3">

                                            <div class="col-sm-6">
                                                <!-- Message de notification  -->
                                                <div class="d-flex justify-content-center">
                                                    <p class="text-danger" id="response"></p>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-sm-6 text-end">
                                                <a href="./public/recover-pw.php" class="text-muted font-13"><i
                                                        class="dripicons-lock"></i> Mot de passe oublié?</a>
                                            </div><!--end col-->
                                        </div><!--end form-group-->



                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <input type="hidden" value="1" name="send">
                                                    <button class="btn btn-primary" type="submit" name="send" value="1"
                                                        id="loginBtn">
                                                        <span class="spinner-border spinner-border-sm d-none"
                                                            id="btnSpinner"></span>
                                                        <span id="btnText">Se connecter <i
                                                                class="fas fa-sign-in-alt ms-1"></i></span>
                                                    </button>

                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                    <div class="text-center  mb-2">
                                        <p class="text-muted">Vous avez pas de compte ? <a href="public/pricing.php"
                                                class="text-primary ms-2">Enregistrement </a></p>

                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- container -->
    <script src="./assets/js/index.js"></script><!-- Ajax pour le login  -->
</body>
<!--end body-->

<style>
    .toggle-password {
        position: absolute;
        right: 14px;
        top: 60%;
        transform: translateY(-10%);
        cursor: pointer;
        font-size: 18px;
        color: #6c757d;
        z-index: 5;
    }

    .toggle-password:hover {
        color: #000;
    }

    p.text-danger:not(:empty) {
        animation: smoothIn 0.4s ease forwards;
    }

    @keyframes smoothIn {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    document.querySelectorAll('.toggle-password').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = document.getElementById(this.dataset.target);
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('iconoir-eye-closed', 'iconoir-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('iconoir-eye', 'iconoir-eye-closed');
            }
        });
    });
</script>


</html>