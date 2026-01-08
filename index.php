

<?php include "./config/constantes.php"; ?>
<!DOCTYPE php>
<php lang="en" dir="ltr" data-startbar="dark" data-bs-theme="light">

<head>


    <meta charset="utf-8" />
    <title><?= APP_NAME; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= IMAGES_URL ?>/logos/ekigega-logo.png">

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
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 bg- auth-header-box rounded-top">
                                    <div class="text-center ">
                                        <a href="index.php" class="logo logo-admin">
                                            <img src="<?= IMAGES_URL ?>/logos/logo.png" height="150" alt="logo"
                                                class="auth-logo">
                                        </a>
                                        <h4 class="mt-n3 fw-semibold fs-18">Welcome back </h4>
                                        <p class="text-muted  fw-medium mb-0">Sign in to continue to e-kigega.</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <!-- formulare de connexions -->
                                    <form class="my-4" id="loginForm" onsubmit="disableForm(event)">
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="mail" class="form-control" id="username" name="mail"
                                                placeholder="Enter username">
                                        </div><!--end form-group-->

                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                id="userpassword" placeholder="Enter password">
                                        </div><!--end form-group-->

                                        <div class="form-group row mt-3">
                                            <div class="col-sm-6">
                                            </div><!--end col-->
                                            <div class="col-sm-6 text-end">
                                                <a href="./public/recover-pw.php" class="text-muted font-13"><i
                                                        class="dripicons-lock"></i> Forgot password?</a>
                                            </div><!--end col-->
                                        </div><!--end form-group-->

                                            <!-- Message de notification  -->
                                        <div class="d-flex justify-content-center">
                                            <p class="text-muted" id="response"></p>
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <input type="hidden" value="1" name="send">
                                                    <button class="btn btn-warning" type="submit" name="send" value="1" onclick="sendlogin()">Log In <i
                                                            class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                    <div class="text-center  mb-2">
                                        <p class="text-muted">Don't have an account ? <a href="./public/register.php"
                                                class="text-warning ms-2">Free Resister</a></p>
                                        <!-- <h6 class="px-3 d-inline-block">Or Login With</h6> -->
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

</php>