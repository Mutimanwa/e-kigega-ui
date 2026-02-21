<?php include "../config/constantes.php"; ?>
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
    <link rel="shortcut icon" href="<?= IMAGES_URL ?>/logos/logo.jpg" type="image/x-icon">

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
                                <div class="card-body p-0 auth-header-box rounded-top">
                                    <div class="text-center pt-5 ">
                                          <a href="index.php" class="logo logo-admin">
                                            <img src="<?= IMAGES_URL ?>/logos/logo.png" height="80" alt="logo"
                                                class="auth-logo mb-2">
                                        </a>
                                        <h4 class=" fw-semibold fs-18">Réinitialiser le mot de passe</h4>   
                                        <p class="text-muted fw-medium mb-0">Entrez votre email et les instructions vous seront envoyées !</p>  
                                    </div>
                                </div>
                                <div class="card-body pt-0">                                    
                                    <form class="my-4" action="index.php">            
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Email</label>
                                            <input type="text" class="form-control" id="userEmail" name="Email" placeholder="Entrez votre email">                               
                                        </div><!--end form-group-->             
                                        
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-warning" type="button">Réinitialiser <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                    <div class="text-center  mb-2">
                                        <p class="text-muted">Souvenez-vous-en ?  <a href="./../index.php" class="text-warning ms-2">Se connecter</a></p>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->                                        
    </div><!-- container -->
</body>
<!--end body-->

</php>