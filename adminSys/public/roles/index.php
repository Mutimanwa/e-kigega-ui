<?php
include_once "./../../includes/header.php";
include_once "./../../includes/sidebar.php";

// role.php
// Exemple statique, tu peux remplacer les tableaux par des requêtes MySQL
$roles = [
    ["id" => 1, "name" => "Administrateur", "description" => "Accès complet au système", "status" => "Actif", "created_at" => "2024-01-10"],
    ["id" => 2, "name" => "Utilisateur", "description" => "Accès limité aux fonctionnalités", "status" => "Actif", "created_at" => "2024-02-05"],
    ["id" => 3, "name" => "Super Admin", "description" => "Gestion complète des modules et utilisateurs", "status" => "Suspendu", "created_at" => "2024-03-20"]
];
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Rôles</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">E-Kigega</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item"><a href="#">Super Admin</a>
                        </li>
                        <li class="breadcrumb-item active">Rôles</li>
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
                            <button class="btn bg-warning text-white" data-bs-toggle="modal"
                                data-bs-target="#addRole"><i class="fas fa-plus me-1"></i> Ajouter un
                                rôle</button>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-header-->
               

  <!-- Body -->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover" id="datatable_2">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nom du rôle</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Date de création</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($roles as $role): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($role['name']) ?></td>
                                            <td><?= htmlspecialchars($role['description']) ?></td>
                                            <td>
                                                <span
                                                    class="badge rounded <?= $role['status'] === 'Actif' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' ?>">
                                                    <?= $role['status'] ?>
                                                </span>
                                            </td>
                                            <td><?= date("d-m-Y", strtotime($role['created_at'])) ?></td>
                                            <td class="text-end">
                                                <a href="#" class="edit-role" data-bs-toggle="modal"
                                                    data-bs-target="#editRole" data-role-id="<?= $role['id'] ?>">
                                                    <i class="las la-pen  fs-18" data-bs-toggle="tooltip"
                                                        title="Modifier"></i>
                                                </a>
                                                <a href="#" class="text-danger delete-btn" data-bs-toggle="modal"
         data-bs-target="#deleteModal" data-role-id="<?= $role['id'] ?>">
                                                    <i class="las la-trash-alt  fs-18" data-bs-toggle="tooltip"
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
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="addRole" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="role_add.php" method="POST">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un rôle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">

                        <!-- Nom du rôle -->
                        <div class="mb-3">
                            <label for="roleName" class="form-label">Nom du rôle</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-shield"></i>
                                </span>
                                <input type="text" name="name" id="roleName" class="form-control"
                                    placeholder="Ex : Administrateur" value="Administrateur" required>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="roleDesc" class="form-label">Description</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-align-left"></i>
                                </span>
                                <textarea name="description" id="roleDesc" class="form-control" rows="3"
                                    placeholder="Description du rôle">Accès complet au système</textarea>
                            </div>
                        </div>

                        <!-- Statut -->
                        <div class="mb-3">
                            <label for="roleStatus" class="form-label">Statut</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-toggle-on"></i>
                                </span>
                                <select name="status" id="roleStatus" class="form-select">
                                    <option value="Actif" selected>Actif</option>
                                    <option value="Suspendu">Suspendu</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa-solid fa-plus me-1"></i> Ajouter
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Annuler
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>



    <!-- Modals modifier role -->
    <div class="modal fade" id="editRole" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="role_add.php" method="POST">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier un rôle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">

                        <!-- Nom du rôle -->
                        <div class="mb-3">
                            <label for="roleName" class="form-label">Nom du rôle</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-shield"></i>
                                </span>
                                <input type="text" name="name" id="roleName" class="form-control"
                                    placeholder="Ex : Administrateur" value="Administrateur" required>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="roleDesc" class="form-label">Description</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-align-left"></i>
                                </span>
                                <textarea name="description" id="roleDesc" class="form-control" rows="3"
                                    placeholder="Description du rôle">Accès complet au système</textarea>
                            </div>
                        </div>

                        <!-- Statut -->
                        <div class="mb-3">
                            <label for="roleStatus" class="form-label">Statut</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-toggle-on"></i>
                                </span>
                                <select name="status" id="roleStatus" class="form-select">
                                    <option value="Actif" selected>Actif</option>
                                    <option value="Suspendu">Suspendu</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa-solid fa-plus me-1"></i> Modifier
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Annuler
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>




    <?php
    $pageLibs = [
        LIBS_URL . 'simple-datatables/umd/simple-datatables.js',
        JS_URL . 'pages/datatables.init.js'
    ];
    include_once "./../../includes/footer.php";
    ?>

    
<!-- Modal de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="DeleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h5 class="modal-title text-danger" id="deleteUserLabel">Supprimer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Êtes-vous sûr de vouloir supprimer cet Role ? Cette action est
                    irréversible.</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Oui</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>


  <!-- js pour le tooltip -->
    <script>
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>