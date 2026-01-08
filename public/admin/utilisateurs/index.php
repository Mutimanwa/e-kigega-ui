<?php 
include "../../../includes/header.php";
include "../../../includes/sidebar.php";
?>

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                            <h4 class="page-title">Utilisateurs</h4>
                            <div class="">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">E-kigega</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item"><a href="#">Admin</a>
                                    </li>
                                    <li class="breadcrumb-item active">Utilisateurs</li>
                                </ol>
                            </div>                            
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row-->
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">                      
                                        <h4 class="card-title">Détails </h4>                      
                                    </div><!--end col-->
                                    <div class="col-auto"> 
                                        <button class="btn bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#addUser"><i class="fas fa-plus me-1"></i> Ajouter un utilisateur</button> 
                                    </div><!--end col-->
                                </div><!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table mb-0" id="datatable_2">
                                        <thead class="table-light table-hover">
                                          <tr>
                                            <th>Nom & Prénom</th>
                                            <th>Email</th>
                                            <th>N° Téléphone</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Date d'inscription</th>
                                            <th class="text-end">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= IMAGES_URL ?>users/avatar-1.jpg" class="me-2 thumb-md align-self-center rounded" alt="...">
                                                        <div class="flex-grow-1 text-truncate"> 
                                                            <h6 class="m-0">Audry Wakanda</h6>
                                                        </div><!--end media body-->
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="mailto:audrywakanda@gmail.com" class="text-primary text-decoration-underline">
                                                        audrywakanda@gmail.com
                                                    </a>
                                                </td>
                                                <td>+1 234 567 890</td>
                                                <td>Administrateur</td>
                                                <td><span class="badge rounded text-success bg-success-subtle">Active</span></td>
                                                <td>22 August 2024</td>

                                                <td class="text-end">                                                       
                                                    <a href="#" class="edit-user" data-bs-toggle="modal" data-bs-target="#editUser" data-user-id="1">
                                                        <i class="las la-pen text-secondary fs-18"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr>

                                              <tr>
                                                <td class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= IMAGES_URL ?>users/avatar-1.jpg" class="me-2 thumb-md align-self-center rounded" alt="...">
                                                        <div class="flex-grow-1 text-truncate"> 
                                                            <h6 class="m-0"> Kamana Urbain</h6>
                                                        </div><!--end media body-->
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="mailto:urbain@gmail.com" class="text-primary text-decoration-underline">
                                                        urbain@gmail.com
                                                    </a>
                                                </td>
                                                <td>+1 234 567 890</td>
                                                <td>Utilisateur</td>
                                                <td>
                                                    <span class="badge rounded text-secondary bg-secondary-subtle">
                                                        Inactive
                                                    </span>
                                                </td>
                                                <td>22 August 2024</td>

                                                <td class="text-end">                                                       
                                                    <a href="#" class="edit-user" data-bs-toggle="modal" data-bs-target="#editUser" data-user-id="2">
                                                        <i class="las la-pen text-secondary fs-18"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div><!-- container -->

<?php 
 $pageLibs = [
    LIBS_URL . "simple-datatables/umd/simple-datatables.js",
    JS_URL . "pages/datatables.init.js"
];
include "../../../includes/footer.php"; ?>


<!-- Modal d'ajout -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="#">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserLabel">Ajouter un utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <!-- Photo -->
                    <div class="form-group mb-3 d-flex align-items-center">
                        <i id="profileIconAdd" class="fa-solid fa-user text-muted thumb-xl rounded me-2 border-dashed"></i>
                        <div class="flex-grow-1">
                            <label class="btn btn-primary text-light">
                                Ajouter une photo
                                <input type="file" id="profileInputAdd" accept="image/*" class="profile-input" data-target="profileIconAdd" hidden>
                            </label>
                        </div>
                    </div>

                    <!-- Nom / Prenom -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="firstNameAdd">Nom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                <input type="text" class="form-control" id="firstNameAdd" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="lastNameAdd">Prénom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                <input type="text" class="form-control" id="lastNameAdd" placeholder="Prénom">
                            </div>
                        </div>
                    </div>

                    <!-- Email / Téléphone -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="emailAdd">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                                <input type="email" class="form-control" id="emailAdd" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="phoneAdd">N° Téléphone</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <input type="text" class="form-control" id="phoneAdd" placeholder="+1 234 567 890">
                            </div>
                        </div>
                    </div>

                    <!-- Role / Statut -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="roleAdd">Rôle</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-tags"></i></span>
                                <select id="roleAdd" class="form-select">
                                    <option value="" selected disabled>Choisir un rôle</option>
                                    <option value="comptable">Comptable</option>
                                    <option value="responsable">Responsable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="statusAdd">Statut</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-tags"></i></span>
                                <select id="statusAdd" class="form-select">
                                    <option value="" selected disabled>Choisir un statut</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Mot de passe / Confirmer mot de passe -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="passwordAdd">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" class="form-control password-input" id="passwordAdd" placeholder="Mot de passe">
                                <span class="input-group-text toggle-password" data-target="passwordAdd">
                                    <i class="fa-solid fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="confirmPasswordAdd">Confirmer mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" class="form-control password-input" id="confirmPasswordAdd" placeholder="Confirmer mot de passe">
                                <span class="input-group-text toggle-password" data-target="confirmPasswordAdd">
                                    <i class="fa-solid fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Modifier Utilisateur -->
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
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
                                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                <input type="text" class="form-control" id="firstNameEdit" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="lastNameEdit">Prénom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                <input type="text" class="form-control" id="lastNameEdit" placeholder="Prénom">
                            </div>
                        </div>
                    </div>

                    <!-- Email / Téléphone -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="emailEdit">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
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

                    <!-- Role / Statut -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="roleEdit">Rôle</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-tags"></i></span>
                                <select id="roleEdit" class="form-select">
                                    <option value="" selected disabled>Choisir un rôle</option>
                                    <option value="comptable">Comptable</option>
                                    <option value="responsable">Responsable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="statusEdit">Statut</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-tags"></i></span>
                                <select id="statusEdit" class="form-select">
                                    <option value="" selected disabled>Choisir un statut</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
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
                                    <i class="fa-solid fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="confirmPasswordEdit">Confirmer mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" class="form-control password-input" id="confirmPasswordEdit" placeholder="Confirmer mot de passe">
                                <span class="input-group-text toggle-password" data-target="confirmPasswordEdit">
                                    <i class="fa-solid fa-eye"></i>
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

<!-- Modal de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="DeleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h5 class="modal-title text-danger" id="deleteUserLabel">Supprimer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>           
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Oui</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<!-- Script JavaScript pour toutes les fonctionnalités -->
<script>
// Fonction pour le toggle des mots de passe
document.querySelectorAll(".toggle-password").forEach(toggle => {
    toggle.addEventListener("click", function () {
        const targetId = this.getAttribute("data-target");
        const input = document.getElementById(targetId);
        const icon = this.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
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

<style>
.toggle-password { 
    cursor: pointer; 
}
.border-dashed {
    border: 2px dashed #dee2e6;
    padding: 2px;
}
.thumb-xl {
    width: 60px;
    height: 60px;
    object-fit: cover;
}
</style>