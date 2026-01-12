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
$clients = getApi('/api/partners/fournisseurs/') ?? [];
if (!is_array($clients)) {
  echo "<div class='alert alert-danger'>API error</div>";
  $clients = [];
}

include "./../../../includes/header.php";
include "./../../../includes/sidebar.php";
?>
<div class="page-wrapper">

  <!-- Page Content-->
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Fournisseurs</h4>
            <div class="">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li><!--end nav-item-->
                <li class="breadcrumb-item active">Fournisseurs</li>
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
                  <button class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#addRate"><i
                      class="fas fa-plus me-1"></i> Ajouter un fournisseur</button>
                </div><!--end col-->
              </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body ">
              <div class="table-responsive">
                <table class="table" id="datatable_1">
                  <thead class="table-light">
                    <tr>
                      <th class=>Nom</th>
                      <th class=>Prenom</th>
                      <th class=>N° Telephone</th>
                      <th class=>Email</th>
                      <th class=>adresse</th>
                      <th>Date</th>
                      <th class="text-end">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($clients as $c): ?>
                      <tr>
                        <td> <?= htmlspecialchars($c['nom']) ?></td>
                        <td><?= htmlspecialchars($c['prenom']) ?></td>
                        <td><?= htmlspecialchars($c['telephone']) ?></td>
                        <td>
                          <a href="mailto:<?= htmlspecialchars($c['email']) ?>" class="text-primary text-decoration-underline">
                            <?= htmlspecialchars($c['email']) ?>
                          </a>
                        </td>
                        <td><?= htmlspecialchars($c['adresse']) ?></td>
                        <td><?= htmlspecialchars((new DateTime($c['created_at']))->format('d/m/Y')) ?></td>
                        <td class="text-end">

                          <!-- Modifier -->
                          <a href="#"
                            class="editBtn"
                            data-bs-toggle="modal"
                            data-bs-target="#modifyProductModal"
                            data-id="<?= $c['id'] ?>"
                            data-nom="<?= htmlspecialchars($c['nom']) ?>"
                            data-prenom="<?= htmlspecialchars($c['prenom']) ?>"
                            data-email="<?= $c['email'] ?>"
                            data-telephone="<?= $c['telephone'] ?>"
                            data-adresse="<?= $c['adresse'] ?>">
                            <i class="las la-pen text-secondary fs-18" data-bs-toggle="tooltip"
                              data-bs-placement="top"
                              title="Modifier"></i>
                          </a>


                          <!-- Supprimer -->
                          <a href="#"
                            class="text-danger delete-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                            data-id="<?= $c['id'] ?>"
                            data-nom="<?= htmlentities($c['nom']) ?> <?= htmlentities($c['prenom']) ?>">
                            <i class="las la-trash-alt text-secondary fs-18 " data-bs-toggle="tooltip"
                              data-bs-placement="top"
                              title="Supprimer"></i>
                          </a>

                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
              <br>

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
      <!-- #integration des toast-->
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
          <form action="./../../../backend/admin/fournisseurs/add.php" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addRateLabel">Ajouter un fournisseur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body">

                <div class="mb-2">
                  <label>Nom</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-user"></i>
                    </span>
                    <input type="text" id="add-nom" name="nom" class="form-control" placeholder="Nom du fournisseur">
                  </div>
                </div>

                <div class="mb-2">
                  <label>Prénom</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-user-tag"></i>
                    </span>
                    <input type="text" id="add-prenom" name="prenom" class="form-control" placeholder="Prénom du fournisseur">
                  </div>
                </div>

                <div class="mb-2">
                  <label>Téléphone</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-phone"></i>
                    </span>
                    <input type="number" id="add-telephone" name="telephone" class="form-control" placeholder="Numéro de téléphone">
                  </div>
                </div>

                <div class="mb-2">
                  <label>Email</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" id="add-email" name="email" class="form-control" placeholder="Email du fournisseur">
                  </div>
                </div>

                <div class="mb-2">
                  <label>Adresse</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-map-marker-alt"></i>
                    </span>
                    <input type="text" id="add-adresse" name="adresse" class="form-control" placeholder="Adresse du fournisseur">
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
          <form action="./../../../backend/admin/fournisseurs/edit.php" method="post" id="form-edit-produit">
            <input type="hidden" name="id" id="edit-id">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modifyProductLabel">Modifier le Fournisseur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">

                <!-- Nom du client -->
                <div class="mb-2">
                  <label>Nom</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="nom" id="edit-nom" class="form-control" placeholder="Nom du fournisseur" required>
                  </div>
                </div>

                <!-- prenom -->
                <div class="mb-2">
                  <label>Prenom</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                    <input type="text" name="prenom" id="edit-prenom" class="form-control" placeholder="Prénom du fournisseur" required>
                  </div>
                </div>

                <!-- email -->
                <div class="mb-2">
                  <label>E-mail</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="mail" name="email" id="edit-email" class="form-control" placeholder="Email du fournisseur" required>
                  </div>
                </div>

                <!-- Telephone -->
                <div class="mb-2">
                  <label>Telephone</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="number" name="telephone" id="edit-telephone" class="form-control" placeholder="Numéro de téléphone" required>
                  </div>
                </div>

                <!-- adresse -->
                <div class="mb-2">
                  <label>Adresse</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <input type="text" name="adresse" id="edit-adresse" class="form-control" placeholder="Adresse du fournisseur" required>
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
      <!-- Popup Suppression -->
      <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header bg-white">
              <h5 class="modal-title text-danger">Supprimer un fournisseur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <p>
                Voulez-vous vraiment supprimer
                <strong id="catName"></strong> ?
              </p>
            </div>

            <div class="modal-footer">
              <form method="POST" action="./../../../backend/admin/fournisseurs/delete.php">
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
              document.getElementById('edit-nom').value = this.dataset.nom;
              document.getElementById('edit-prenom').value = this.dataset.prenom;
              document.getElementById('edit-email').value = this.dataset.email;
              document.getElementById('edit-telephone').value = this.dataset.telephone;
              document.getElementById('edit-adresse').value = this.dataset.adresse;

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