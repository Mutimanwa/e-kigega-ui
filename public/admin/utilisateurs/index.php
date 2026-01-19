<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
session_start();

require_once('./../../../backend/function/function.php');
$role = "ADMIN";

//================== gerer les session 
if (requireRole($role) === "Accès interdit") {
    header("Location: ./../../../index.php");
    session_destroy();
}

//=========== verifier l'abonnement de cet entreprise
$url = "./../../../index.php";
abonnement($url);

//================== fetch les produits
$roles = getApi('/api/auth/roles/') ?? [];
if (!is_array($roles) || count($roles) === 0) {
    echo "<div class='alert alert-danger'>API error ou aucun utilisateur</div>";
    $roles = [];
}


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
                                    <button class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fas fa-plus me-1"></i> Ajouter un utilisateur</button>
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
                                        <?php
                                        $users = getApi('/api/auth/users/') ?? [];

                                        // Si $users n'est pas un tableau ou contient une string, on le vide
                                        if (!is_array($users) || isset($users['error']) || is_string($users)) {
                                            echo "<div class='alert alert-danger'>API error ou aucun utilisateur</div>";
                                            $users = [];
                                        }

                                        // Boucle sur les utilisateurs uniquement si c'est un tableau
                                        foreach ($users as $u):
                                            // Vérifier que $u est bien un tableau
                                            if (!is_array($u)) continue;

                                            // Préparer les valeurs avec fallback
                                            $id=htmlspecialchars($u['id'] ?? '' );
                                            $nom = htmlspecialchars($u['nom'] ?? '');
                                            $prenom = htmlspecialchars($u['prenom'] ?? '');
                                            $email = htmlspecialchars($u['email'] ?? '');
                                            $profile=$u['profile'];
                                            $telephone = htmlspecialchars($u['telephone'] ?? 'N/A');
                                            $role = htmlspecialchars($u['role']['nom'] ?? 'N/A');
                                            $status = ($u['status'] ?? 'inactif') === 'actif' ? 'Active' : 'Inactive';
                                            $created_at = isset($u['created_at']) ? date('d M Y', strtotime($u['created_at'])) : 'N/A';
                                            $user_id = htmlspecialchars($u['id'] ?? '');
                                        ?>
                                        <tr>
                                            <td class="d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= $profile ?>"
                                                        class="me-2 thumb-md align-self-center rounded" alt="...">
                                                    <div class="flex-grow-1 text-truncate">
                                                        <h6 class="m-0"><?= $nom ?> <?= $prenom ?></h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <a href="mailto:<?= $email ?>" class="text-primary text-decoration-underline"  target="_blank">
                                                    <?= $email ?>
                                                </a>
                                            </td>

                                            <td><?= $telephone ?></td>
                                            <td><?= $role ?></td>
                                            <td>
                                                <span class="badge rounded text-success bg-success-subtle"><?= $status ?></span>
                                            </td>
                                            <td><?= $created_at ?></td>

                                            <td class="text-end">
                                                <!-- Modifier -->
                                                <a href="#"
                                                    class="editBtn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modifyProductModal"
                                                    data-id="<?= $id ?>"
                                                    data-nom="<?= $nom ?>"
                                                    data-prenom="<?= $prenom ?>"
                                                    data-email="<?= $email ?>"
                                                    data-telephone="<?= $telephone ?>"
                                                    data-profile="<?= $profile ?>"
                                                    data-status="<?= $status ?>"
                                                    data-role="<?= $role ?>">
                                                    <i class="las la-pen  fs-18" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Modifier"></i>
                                                </a>

                                                <!-- Supprimer -->
                                                <a href="#"
                                                    class="text-danger delete-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"
                                                    data-id="<?= $id ?>"
                                                    data-nom="<?= $email ?>">
                                                    <i class="las la-trash-alt  fs-18 " data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Supprimer"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>

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
            include "../../../includes/footer.php"; 
        ?>

        <script>
            // toast success
            <?php if (isset($_GET['success'])): ?>
            showToast("<?= htmlspecialchars($_GET['success']) ?>", 'success');

            <?php endif; ?>
            // toast error
            <?php if (isset($_GET['error'])): ?>
            showToast("<?= htmlspecialchars($_GET['error']) ?>", 'danger');

            <?php endif; ?>
        </script>

        <!-- Modal d'ajout -->
        <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="./../../../backend/admin/users/add.php" method="post" enctype="multipart/form-data">
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
                                        <input type="file" id="profileInputAdd" name="profile" accept="image/*" class="profile-input" data-target="profileIconAdd" hidden>
                                    </label>
                                </div>
                            </div>

                            <!-- Nom / Prenom -->
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="firstNameAdd">Nom</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" name="nom" class="form-control" id="firstNameAdd" placeholder="Nom">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="lastNameAdd">Prénom</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        <input type="text" name="prenom" class="form-control" id="lastNameAdd" placeholder="Prénom">
                                    </div>
                                </div>
                            </div>

                            <!-- Email / Téléphone -->
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="emailAdd">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" name="email" class="form-control" id="emailAdd" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phoneAdd">N° Téléphone</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                        <input type="text" name="telephone" class="form-control" id="phoneAdd" placeholder="+1 234 567 890">
                                    </div>
                                </div>
                            </div>

                            <!-- Role / Statut -->
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="roleAdd">Rôle</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-tags"></i></span>
                                        <select id="roleAdd" name="role" class="form-select">
                                            <option value="" selected disabled>Choisir un rôle</option>
                                            <?php foreach($roles as $r): ?>
                                             <option value="<?= htmlspecialchars($r['id']) ?>"><?= htmlspecialchars($r['nom']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 mb-2">
                                    <label for="statusAdd">Statut</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-tags"></i></span>
                                        <select id="statusAdd" class="form-select">
                                            <option value="" selected disabled>Choisir un statut</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>

                            <!-- Mot de passe / Confirmer mot de passe -->
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="passwordAdd">Mot de passe</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                        <input type="password" name="password" class="form-control password-input" id="passwordAdd" placeholder="Mot de passe">
                                        <span class="input-group-text toggle-password" data-target="passwordAdd">
                                            <i class="iconoir-eye-closed"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="confirmPasswordAdd">Confirmer mot de passe</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                        <input type="password" name="conf_psswd" class="form-control password-input" id="confirmPasswordAdd" placeholder="Confirmer mot de passe">
                                        <span class="input-group-text toggle-password" data-target="confirmPasswordAdd">
                                            <i class="iconoir-eye-closed"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="send" class="btn btn-primary w-100">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Modifier Utilisateur -->
        <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
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

        <!-- modal de suppression -->
        <div class="modal fade" id="deleteModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header bg-white">
                <h5 class="modal-title text-danger">Supprimer Un Utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body">
                <p>
                  Voulez-vous vraiment supprimer
                  <strong id="catName"></strong> ?
                </p>
              </div>

              <div class="modal-footer">
                <form method="POST" action="./../../../backend/admin/users/delete.php">
                  <input type="hidden" name="id" id="deleteId">
                  <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Annuler
                  </button>
                </form>
              </div>

            </div>
          </div>
        </div>

        <!-- Js pour recuper l'id lors de suppression  -->
        <script>
          document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
              document.getElementById('deleteId').value = this.dataset.id;
              document.getElementById('catName').innerText = this.dataset.nom;
            });
          });
        </script>

        <!-- Script JavaScript pour toutes les fonctionnalités -->
        <script>
            // Fonction pour le toggle des mots de passe
            document.querySelectorAll(".toggle-password").forEach(toggle => {
                toggle.addEventListener("click", function() {
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
                modal.addEventListener('hidden.bs.modal', function() {
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

        <!-- js pour le tooltip -->
        <script>
            var tooltipTriggerList = [].slice.call(
                document.querySelectorAll('[data-bs-toggle="tooltip"]')
            );
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
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