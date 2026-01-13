<?php 
include_once "includes/header.php";
include_once "includes/sidebar.php";

// role.php
// Exemple statique, tu peux remplacer les tableaux par des requêtes MySQL
$roles = [
    ["id" => 1, "name" => "Administrateur", "description" => "Accès complet au système", "status" => "Actif", "created_at" => "2024-01-10"],
    ["id" => 2, "name" => "Utilisateur", "description" => "Accès limité aux fonctionnalités", "status" => "Actif", "created_at" => "2024-02-05"],
    ["id" => 3, "name" => "Super Admin", "description" => "Gestion complète des modules et utilisateurs", "status" => "Suspendu", "created_at" => "2024-03-20"]
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des rôles</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
</head>
<body>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Gestion des rôles</h4>
                    <button class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#addRole">
                        <i class="fas fa-plus me-1"></i> Ajouter un rôle
                    </button>
                </div>

                <!-- Body -->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mb-0 table-hover">
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
                                <?php foreach($roles as $role): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($role['name']) ?></td>
                                        <td><?= htmlspecialchars($role['description']) ?></td>
                                        <td>
                                            <span class="badge rounded <?= $role['status'] === 'Actif' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' ?>">
                                                <?= $role['status'] ?>
                                            </span>
                                        </td>
                                        <td><?= date("d-m-Y", strtotime($role['created_at'])) ?></td>
                                        <td class="text-end">
                                            <a href="#" class="edit-role" data-bs-toggle="modal" data-bs-target="#editRole" data-role-id="<?= $role['id'] ?>">
                                                <i class="las la-pen text-secondary fs-18" data-bs-toggle="tooltip" title="Modifier"></i>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteRole" data-role-id="<?= $role['id'] ?>">
                                                <i class="las la-trash-alt text-secondary fs-18" data-bs-toggle="tooltip" title="Supprimer"></i>
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
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un rôle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="roleName" class="form-label">Nom du rôle</label>
                        <input type="text" name="name" class="form-control" id="roleName" required>
                    </div>
                    <div class="mb-3">
                        <label for="roleDesc" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="roleDesc" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="roleStatus" class="form-label">Status</label>
                        <select name="status" class="form-select" id="roleStatus">
                            <option value="Actif">Actif</option>
                            <option value="Suspendu">Suspendu</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php 
include_once "includes/footer.php";
?>