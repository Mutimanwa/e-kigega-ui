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
$produits = getApi('/api/produits/') ?? [];
if (!is_array($produits)) {
    echo "<div class='alert alert-danger'>API error</div>";
    $produits = [];
}


//===================== fetch clients
$clients = getApi('/api/partners/clients/') ?? [];
if (!is_array($clients)) {
    echo "<div class='alert alert-danger'>API error</div>";
    $clients = [];
}

// ================== fetch les ventes
$ventes = getApi('/api/ventes/') ?? [];
if (!is_array($ventes)) {
    echo "<div class='alert alert-danger'>Erreur API Categories</div>";
    $ventes = [];
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
                        <h4 class="page-title">Ventes</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Ventes</li>
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
                                    <h4 class="card-title"> Details</h4>
                                </div><!--end col-->
                                <div class="col-auto">
                                    <button class="btn bg-primary text-white" data-bs-toggle="modal"
                                        data-bs-target="#addRate"><i class="fas fa-plus me-1"></i> Ajouter une
                                        vente</button>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">

                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Client</th>
                                            <th>Produit</th>
                                            <th>Quantité</th>
                                            <th>Prix unitaire</th>
                                            <th>Prix Total</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ventes as $v): ?>
                                            <tr>
                                                <td><?=  $v['client']['nom'] ?> <?=  $v['client']['prenom'] ?></td>
                                                <td><?=  $v['produit']['nom'] ?></td>
                                                <td><?= number_format($v['quantite'], 2) ?></td>
                                                <td><?= number_format($v['prix_unitaire'], 2) ?></td>
                                                <td><?= number_format($v['prix_vente'], 2) ?> FBu</td>
                                                <td><?= htmlspecialchars((new DateTime($v['created_at']))->format('d/m/Y')) ?></td>
                                                <td>
                                                  <span class="badge rounded text-success bg-success-subtle">

                                                        <?= htmlspecialchars($v['statut']) ?>
                                                    </span>
                                                </td>
                                                <td class="text-end">

                                                    <!-- Modifier -->
                                                    <a href="#"
                                                        class="editBtn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modifyProductModal"
                                                        data-id="<?= $v['id'] ?>"
                                                        data-quantite="<?= $v['quantite'] ?>"
                                                        data-produit="<?= $v['produit']['id'] ?>"
                                                        data-statut="<?= $v['statut'] ?>"
                                                        data-client="<?= $v['client']['id'] ?>">
                                                        <i class="las la-pen  fs-18" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="Modifier"></i>
                                                    </a>

                                                    <!-- Supprimer -->
                                                    <a href="#"
                                                        class="text-danger delete-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        data-id="<?= $v['id'] ?>"
                                                        data-nom="<?=  $v['produit']['nom'] ?>">
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
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
            <!--Start Footer-->

            <?php

            $pageLibs = [
                LIBS_URL . "simple-datatables/umd/simple-datatables.js",
                JS_URL . "pages/datatables.init.js"
            ];
            include "./../../../includes/footer.php";

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


            <!-- Popup Ajouter -->
            <div class="modal fade" id="addRate" tabindex="-1" aria-labelledby="addRateLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="./../../../backend/admin/ventes/add.php" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addRateLabel">Ajouter une vente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">


                                <div class="mb-2">
                                    <label for="add-categorie" class="form-label">Client</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <select id="add-categorie" name="client" class="form-select">
                                            <option value="" selected disabled>Choisir un client</option>
                                            <?php foreach ($clients as $f): ?>
                                                <option value="<?= htmlspecialchars($f['id']) ?>">
                                                    <?= htmlspecialchars($f['nom']) ?> <?= htmlspecialchars($f['prenom']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="mb-2">
                                    <label for="add-categorie" class="form-label">Produit</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-tags"></i>
                                        </span>
                                        <select id="add-categorie" name="produit" class="form-select">
                                            <option value="" selected disabled>Choisir un produit</option>
                                            <?php foreach ($produits as $p): ?>
                                                <option value="<?= htmlspecialchars($p['id']) ?>">
                                                    <?= htmlspecialchars($p['nom']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="mb-2">
                                    <label>Quantité</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                        <input type="number" id="add-quantite" name="quantite" class="form-control"
                                            placeholder="Quantité">
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label for="add-statut" class="form-label">Statut</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-tags"></i>
                                        </span>
                                        <select id="add-statut" name="statut" class="form-select">
                                            <option value="" selected disabled>Choisir un statut</option>
                                            <!-- <option value="en-attente">En attente</option> -->
                                            <option value="payee" selected>Payée</option>
                                            <!-- <option value="paiement-partiel">Paiement partiel</option>
                                            <option value="annulee">Annulée</option>
                                            <option value="rembourse">Remboursée</option> -->
                                        </select>
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

            <!-- Popup Modifier  -->
            <div class="modal fade" id="modifyProductModal" tabindex="-1" aria-labelledby="modifyProductLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="./../../../backend/admin/ventes/edit.php" method="post" id="form-edit-produit">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modifyProductLabel">Modifier la vente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-2">
                                    <label for="add-categorie" class="form-label">Client</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <select id="edit-client" name="client" class="form-select">
                                            <option value="" selected disabled>Choisir un client</option>
                                            <?php foreach ($clients as $f): ?>
                                                <option value="<?= htmlspecialchars($f['id']) ?>">
                                                    <?= htmlspecialchars($f['nom']) ?> <?= htmlspecialchars($f['prenom']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="mb-2">
                                    <label for="add-categorie" class="form-label">Produit</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-tags"></i>
                                        </span>
                                        <select id="edit-produit" name="produit" class="form-select">
                                            <option value="" selected disabled>Choisir un produit</option>
                                            <?php foreach ($produits as $p): ?>
                                                <option value="<?= htmlspecialchars($p['id']) ?>">
                                                    <?= htmlspecialchars($p['nom']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="mb-2">
                                    <label>Quantité</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                        <input type="number" id="edit-quantite" name="quantite" class="form-control"
                                            placeholder="Quantité">
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label for="add-statut" class="form-label">Statut</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-tags"></i>
                                        </span>
                                        <select id="edit-statut" name="statut" class="form-select">
                                            <option value="" selected disabled>Choisir un statut</option>
                                            <!-- <option value="en-attente">En attente</option> -->
                                            <option value="payee" selected>Payée</option>
                                            <!-- <option value="paiement-partiel">Paiement partiel</option>
                                            <option value="annulee">Annulée</option>
                                            <option value="rembourse">Remboursée</option> -->
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="send" class="btn btn-primary w-100">Modifier</button>
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
                            <h5 class="modal-title text-danger">Supprimer Vente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <p>
                                Voulez-vous vraiment supprimer cet vente
                                <strong id="catName"></strong> ?
                            </p>
                        </div>

                        <div class="modal-footer">
                            <form method="POST" action="./../../../backend/admin/ventes/delete.php">
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

            <!-- Js pour recuperl'id lors de modification  -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                const editButtons = document.querySelectorAll('.editBtn');
                const modal = document.getElementById('modifyProductModal');

                editButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                    document.getElementById('edit-id').value = this.dataset.id;
                    document.getElementById('edit-client').value = this.dataset.client;
                    document.getElementById('edit-produit').value = this.dataset.produit;
                    document.getElementById('edit-statut').value = this.dataset.statut;
                    document.getElementById('edit-quantite').value = this.dataset.quantite;
                    });
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