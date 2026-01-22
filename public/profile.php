<?php 

    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    session_start();

    require_once('./../backend/function/function.php');
    
    //================== gerer les session 
    if(!$_SESSION['token']){
        header("Location: ./../index.php");
        session_destroy();
    }

    $entreprise=$_SESSION['entreprise'];
    // Vérifier l’abonnement (SUPER_ADMIN n’en a pas besoin)
    if ($_SESSION['role'] !== "SUPER_ADMIN") {
        abonnement("./../../index.php", $entreprise);
    }


    //================== fetch les produits
    $users=getApi('/api/auth/me/') ?? [];
    if (!is_array($users)) {
      echo "<div class='alert alert-danger'>API error</div>";
      $users = [];
    } 

require_once '../includes/header.php';
require_once '../includes/sidebar.php';
?>
<div class="page-wrapper">

<div class="page-content">

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Profil Utilisateur</h4>
                <div class="">
                   <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <!--end nav-item-->
                                <li class="breadcrumb-item active">Profil</li>
                            </ol>
                </div>                                
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Carte Profil -->
            <div class="card">  
                <div class="card-body p-4 rounded text-center img-bg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    
                </div><!--end card-body-->
                
               
                
                <div class="card-body mt-n6">
                    <div class="row align-items-center">                                        
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <div class="position-relative">
                                    <img src="https://ekigega-backend.onrender.com<?= htmlspecialchars($users['profile']) ?>" alt="" class="rounded-circle img-fluid" width="100">
                                    <div class="position-absolute top-50 start-100 translate-middle">
                                        <div class="thumb-sm border border-3 border-white bg-success rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="las la-user text-white fs-12"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-3 mb-1 align-self-end"> 
                                    <h5 class="m-0 fs-3 fw-bold"><?= htmlspecialchars($users['nom']) ?> <?= htmlspecialchars($users['prenom']) ?></h5>
                                    <p class="text-muted mb-0"><?= htmlspecialchars($users['role']) ?></p>                                                                                                                                 
                                </div><!--end media body-->
                            </div><!--end media-->
                        </div><!--end col-->
                    </div><!--end row-->
                    
                    <div class="row align-items-center mt-4">                                        
                        <div class="col-lg-12">
                            <div class="mt-3">
                                <div class="text-body mb-2 d-flex align-items-center">
                                    <i class="las la-user-tag fs-18 me-2 text-muted"></i>
                                    <span class="text-body fw-semibold">Rôle:</span> 
                                    <span class="badge bg-primary ms-2"><?= htmlspecialchars($users['role']) ?></span>
                                </div>                                    
                                
                                <div class="text-muted mb-2 d-flex align-items-center">
                                    <i class="las la-envelope fs-18 me-2"></i>
                                    <span class="text-body fw-semibold">Email:</span>
                                    <a href="mailto:<?= htmlspecialchars($users['email']) ?>" class="text-primary text-decoration-underline ms-2">
                                        <?= htmlspecialchars($users['email']) ?>
                                    </a>
                                </div>
                                
                                <div class="text-body mb-3 d-flex align-items-center">
                                    <i class="las la-phone fs-18 me-2 text-muted"></i>
                                    <span class="text-body fw-semibold">Téléphone:</span> 
                                    <span class="ms-2"><?= htmlspecialchars($users['telephone']) ?></span>
                                </div>  
                                
                                <div class="text-body mb-3 d-flex align-items-center">
                                    <i class="las la-calendar fs-18 me-2 text-muted"></i>
                                    <span class="text-body fw-semibold">Date d'inscription:</span> 
                                    <span class="ms-2"><?= htmlspecialchars((new DateTime($users['created_at']))->format('d/m/Y')) ?></span>
                                </div>                                  
                                
                                <div class="d-flex gap-2">
                                
                                    <button type="button" class="btn btn-outline-primary flex-fill" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                        <i class="las la-edit me-1"></i> Modifier
                                    </button> 
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->  
            </div><!--end card--> 
            
            
        </div><!--end col--> 
        
                                                        
    </div><!--end row-->
</div><!-- container -->

<!-- Modal Édition Profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="#">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Modifier un utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <!-- Photo -->
                    <div class="form-group mb-3 d-flex align-items-center">
                        <i id="profileIconEdit" class="fa-solid fa-user text-muted thumb-xl rounded me-2 border-dashed"></i>
                        <div class="flex-grow-1">
                            <label class="btn btn-primary text-light">
                                Modifier une photo
                                <input type="file" id="profileInputEdit" accept="image/*" class="profile-input" data-target="profileIconEdit" hidden>
                            </label>
                        </div>
                    </div>

                    <!-- Nom / Prenom -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="firstNameEdit">Nom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="firstNameEdit" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="lastNameEdit">Prénom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                <input type="text" class="form-control" id="lastNameEdit" placeholder="Prénom">
                            </div>
                        </div>
                    </div>

                    <!-- Email / Téléphone -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="emailEdit">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></i></span>
                                <input type="email" class="form-control" id="emailEdit" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="phoneEdit">N° Téléphone</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <input type="text" class="form-control" id="phoneEdit" placeholder="+1 234 567 890">
                            </div>
                        </div>
                    </div>

                   
                    <!-- Mot de passe / Confirmer mot de passe -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="passwordEdit">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" class="form-control password-input" id="passwordEdit" placeholder="Mot de passe">
                                <span class="input-group-text toggle-password" data-target="passwordEdit">
                                    <i class="iconoir-eye-closed"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="confirmPasswordEdit">Confirmer mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" class="form-control password-input" id="confirmPasswordEdit" placeholder="Confirmer mot de passe">
                                <span class="input-group-text toggle-password" data-target="confirmPasswordEdit">
                                    <i class="iconoir-eye-closed"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Script JavaScript pour toutes les fonctionnalités -->
<script>
// Fonction pour le toggle des mots de passe
document.querySelectorAll(".toggle-password").forEach(toggle => {
    toggle.addEventListener("click", function () {
        const input = this.parentElement.querySelector(".password-input"); // prend l'input dans le même groupe
        const icon = this.querySelector("i");

        if (icon.classList.contains("iconoir-eye")) {
            // Icon = eye → mot de passe visible → on masque
            input.type = "password";
            icon.classList.remove("iconoir-eye");
            icon.classList.add("iconoir-eye-closed");
        } else {
            // Icon = eye-slash → mot de passe masqué → on rend visible
            input.type = "text";
            icon.classList.remove("iconoir-eye-closed");
            icon.classList.add("iconoir-eye");
        }
    });
});

// Fonction pour la prévisualisation d'image
function setupImagePreview(inputId, iconId) {
    const profileInput = document.getElementById(inputId);
    const profileIcon = document.getElementById(iconId);

    if (profileInput && profileIcon) {
        profileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                let img = document.getElementById('profilePreview_' + iconId);
                
                // Si l'image n'existe pas encore, la créer
                if (!img) {
                    img = document.createElement('img');
                    img.id = 'profilePreview_' + iconId;
                    img.className = 'thumb-xl rounded me-2 border-dashed';
                    profileIcon.replaceWith(img);
                }

                // Définir la source de l'image sélectionnée
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    }
}

// Initialiser la prévisualisation pour les deux modals
setupImagePreview('profileInputAdd', 'profileIconAdd');
setupImagePreview('profileInputEdit', 'profileIconEdit');

// Fonction pour réinitialiser les formulaires quand les modals sont fermés
document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('hidden.bs.modal', function () {
        // Réinitialiser les prévisualisations d'image
        const modalId = this.id;
        let iconId, inputId;
        
        if (modalId === 'addUser') {
            iconId = 'profileIconAdd';
            inputId = 'profileInputAdd';
        } else if (modalId === 'editUser') {
            iconId = 'profileIconEdit';
            inputId = 'profileInputEdit';
        }
        
        // Réinitialiser l'icône si elle a été remplacée par une image
        const previewImg = document.getElementById('profilePreview_' + iconId);
        const iconElement = document.getElementById(iconId);
        const inputElement = document.getElementById(inputId);
        
        if (previewImg && iconElement) {
            // Remplacer l'image par l'icône originale
            previewImg.replaceWith(iconElement);
        }
        
        // Réinitialiser l'input file
        if (inputElement) {
            inputElement.value = '';
        }
    });
});

// Gestion du chargement des données utilisateur pour la modification
document.querySelectorAll('.edit-user').forEach(button => {
    button.addEventListener('click', function() {
        const userId = this.getAttribute('data-user-id');
        // Ici vous pouvez charger les données de l'utilisateur depuis une API
        // Exemple avec des données statiques pour la démonstration
        if (userId === '1') {
            document.getElementById('firstNameEdit').value = 'Audry';
            document.getElementById('lastNameEdit').value = 'Wakanda';
            document.getElementById('emailEdit').value = 'audrywakanda@gmail.com';
            document.getElementById('phoneEdit').value = '+1 234 567 890';
            document.getElementById('roleEdit').value = 'administrateur';
            document.getElementById('statusEdit').value = 'active';
        } else if (userId === '2') {
            document.getElementById('firstNameEdit').value = 'Kamana';
            document.getElementById('lastNameEdit').value = 'Urbain';
            document.getElementById('emailEdit').value = 'urbain@gmail.com';
            document.getElementById('phoneEdit').value = '+1 234 567 890';
            document.getElementById('roleEdit').value = 'utilisateur';
            document.getElementById('statusEdit').value = 'inactive';
        }
    });
});
</script>

<?php 
require_once '../includes/footer.php';
?>