<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";
?>

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
                            <button class="btn bg-primary text-white" data-bs-toggle="modal"
                                data-bs-target="#addUser"><i class="fas fa-plus me-1"></i> Ajouter un
                                utilisateur</button>
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
                                    <th>Entreprise</th>
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
                                            <img src="users/avatar-1.jpg"
                                                class="me-2 thumb-md align-self-center rounded" alt="...">
                                            <div class="flex-grow-1 text-truncate">
                                                <h6 class="m-0">Audry Wakanda</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <a href="mailto:audrywakanda@gmail.com"
                                            class="text-primary text-decoration-underline">
                                            audrywakanda@gmail.com
                                        </a>
                                    </td>

                                    <td>+1 234 567 890</td>
                                    <td>Agro burundi</td>
                                    <td>Administrateur</td>
                                    <td>
                                        <span class="badge rounded text-success bg-success-subtle">Active</span>
                                    </td>
                                    <td>22 August 2024</td>

                                    <td class="text-end">
                                        <!-- Modifier -->
                                        <a href="#" class="edit-user" data-bs-toggle="modal" data-bs-target="#editUser"
                                            data-user-id="1">
                                            <i class="las la-pen text-secondary fs-18" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Modifier"></i>
                                        </a>

                                        <!-- Supprimer -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <i class="las la-trash-alt text-secondary fs-18" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Supprimer"></i>
                                        </a>
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
<!-- Modal d'ajout -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="#">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserLabel">Ajouter un utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Photo -->
                    <div class="form-group mb-3 d-flex align-items-center">
                        <i id="profileIconAdd"
                            class="fa-solid fa-user text-muted thumb-xl rounded me-2 border-dashed"></i>
                        <div class="flex-grow-1">
                            <label  class="btn btn-primary text-light">
                                Ajouter une photo
                                <input required type="file" id="profileInputAdd" accept="image/*" class="profile-input"
                                    data-target="profileIconAdd" hidden>
                            </label>
                        </div>
                    </div>

                    <!-- Nom / Prenom -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="firstNameAdd">Nom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input required type="text" class="form-control" id="firstNameAdd" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="lastNameAdd">Prénom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                <input required type="text" class="form-control" id="lastNameAdd" placeholder="Prénom">
                            </div>
                        </div>
                    </div>

                    <!-- Email / Téléphone -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="emailAdd">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input required type="email" class="form-control" id="emailAdd" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="phoneAdd">N° Téléphone</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <input required type="text" class="form-control" id="phoneAdd" placeholder="+1 234 567 890">
                            </div>
                        </div>
                    </div>
                    <!-- Entreprise -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="companyAdd">Entreprise</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
                                <select  class="form-select" name="" id="" required>
                                    <option value="">Selectionnez une entreprise</option>
                                    <option value="">Agro Burundi</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <!-- Role / Statut -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="roleAdd">Rôle</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-tags"></i></span>
                                <select id="roleAdd" class="form-select" required>
                                    <option value="" selected disabled>Choisir un rôle</option>
                                    <option value="comptable">Comptable</option>
                                    <option value="responsable">Responsable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="statusAdd">Statut</label>
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
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="passwordAdd">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input required type="password" class="form-control password-input" id="passwordAdd"
                                    placeholder="Mot de passe">
                                <span class="input-group-text toggle-password" data-target="passwordAdd">
                                    <i class="iconoir-eye-closed"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="confirmPasswordAdd">Confirmer mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input required type="password" class="form-control password-input" id="confirmPasswordAdd"
                                    placeholder="Confirmer mot de passe">
                                <span class="input-group-text toggle-password" data-target="confirmPasswordAdd">
                                    <i class="iconoir-eye-closed"></i>
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
                        <i id="profileIconEdit"
                            class="fa-solid fa-user text-muted thumb-xl rounded me-2 border-dashed"></i>
                        <div class="flex-grow-1">
                            <label class="form-label" class="btn btn-primary text-light">
                                Modifier une photo
                                <input required type="file" id="profileInputEdit" accept="image/*" class="profile-input"
                                    data-target="profileIconEdit" hidden>
                            </label>
                        </div>
                    </div>

                    <!-- Nom / Prenom -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="firstNameEdit">Nom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input required type="text" class="form-control" id="firstNameEdit" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="lastNameEdit">Prénom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                <input required type="text" class="form-control" id="lastNameEdit" placeholder="Prénom">
                            </div>
                        </div>
                    </div>

                    <!-- Email / Téléphone -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="emailEdit">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></i></span>
                                <input required type="email" class="form-control" id="emailEdit" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="phoneEdit">N° Téléphone</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <input required type="text" class="form-control" id="phoneEdit" placeholder="+1 234 567 890">
                            </div>
                        </div>
                    </div>

                    <!-- Role / Statut -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="roleEdit">Rôle</label>
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
                            <label class="form-label" for="statusEdit">Statut</label>
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
                            <label class="form-label" for="passwordEdit">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input required type="password" class="form-control password-input" id="passwordEdit"
                                    placeholder="Mot de passe">
                                <span class="input-group-text toggle-password" data-target="passwordEdit">
                                    <i class="iconoir-eye-closed"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="confirmPasswordEdit">Confirmer mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input required type="password" class="form-control password-input" id="confirmPasswordEdit"
                                    placeholder="Confirmer mot de passe">
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

<!-- Modal de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="DeleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h5 class="modal-title text-danger" id="deleteUserLabel">Supprimer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est
                    irréversible.</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Oui</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
<?php
include_once "includes/footer.php";
?>