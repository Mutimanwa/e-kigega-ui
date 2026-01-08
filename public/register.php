<?php include "../config/constantes.php"; ?>
<!DOCTYPE php>
<php lang="fr" dir="ltr" data-startbar="dark" data-bs-theme="light">

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
                        <div class="col-lg-5 my-5 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 bg- auth-header-box rounded-top">
                                    <div class="text-center ">
                                        <a href="index.php" class="logo logo-admin">
                                            <img src="<?= IMAGES_URL ?>logos/logo.png" height="150" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-n3 fw-semibold  fs-18">Créer un compte</h4>   
                                        <p class="text-muted fw-medium mb-0">Entrez vos informations pour créer votre compte aujourd'hui .</p>  
                                    </div>
                                </div>
                                <div class="card-body pt-0">                                    
                                    <form class="my-3" action="index.php">            
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Nom d'utilisateur</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre nom d'utilisateur">                               
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="useremail">Email</label>
                                            <input type="email" class="form-control" id="useremail" name="user email" placeholder="Entrez votre email">                               
                                        </div><!--end form-group--> 
            
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="userpassword">Mot de passe</label>                                            
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Entrez votre mot de passe">                            
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="Confirmpassword">Confirmer le mot de passe</label>                                            
                                            <input type="password" class="form-control" name="password" id="Confirmpassword" placeholder="Entrez votre mot de passe">                            
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="mobileNo">Numéro de mobile</label>
                                            <input type="text" class="form-control" id="mobileNo" name="mobile number" placeholder="Entrez votre numéro de mobile">                               
                                        </div><!--end form-group--> 
            
                                        <div class="form-group row mt-3">
                                            <div class="col-12">
                                                <div class="form-check form-switch form-switch-warning">
                                                    <input class="form-check-input" type="checkbox" id="customSwitchSuccess">
                                                    <label class="form-check-label" for="customSwitchSuccess">En vous inscrivant, vous acceptez les <a href="#" class="text-warning">Conditions d'utilisation</a></label>
                                                </div>
                                            </div><!--end col--> 
                                        </div><!--end form-group--> 
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-warning" type="button">S'inscrire <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                    <div class="text-center">
                                        <p class="text-muted">Vous avez déjà un compte ?  <a href="./../index.php" class="text-warning ms-2">Se connecter</a></p>
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