<?php

    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    session_start();

    require_once('./../../../backend/function/function.php');
    $role="ADMIN";

    //================== gerer les session 
    if(requireRole($role)==="Accès interdit"){
        header("Location: ./../../../index.php");
        session_destroy();
    }

    //=========== verifier l'abonnement de cet entreprise
    $url="./../../../index.php";
    abonnement($url);

    //================== fetch les produits
    $produits=getApi('/api/produits/') ?? [];
    if (!is_array($produits)) {
      echo "<div class='alert alert-danger'>API error</div>";
      $produits = [];
    } 

    // ================== fetch les categories
    $categories = getApi('/api/categories/') ?? [];
    if (!is_array($categories)) {
        echo "<div class='alert alert-danger'>Erreur API Categories</div>";
        $categories = [];
    }

    //=========== gestion des pages dynamiques
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
            <h4 class="page-title">Produits</h4>
            <div class="">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li><!--end nav-item-->
                <li class="breadcrumb-item active">Produits</li>
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
                  <button class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#addRate"><i class="fas fa-plus me-1"></i> Ajouter un produit</button>
                </div><!--end col-->
              </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
              <div class="table-responsive">
                <table class="table mb-0" id="datatable_1">
                  <thead class="table-light">
                    <tr>
                      <th>Nom</th>
                      <th>Categorie</th>
                      <th>Quantite</th>
                      <th>Prix</th>
                      <th>Date</th>
                      <th class="text-end">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php  foreach ($produits as $p ): ?>
                    <tr>
                      <td><?= htmlspecialchars($p['nom']) ?></td>
                      <td><?= htmlspecialchars($p['categorie']) ?></td>
                      <td> <?= htmlspecialchars($p['quantite']) ?></td>
                      <td><?= htmlspecialchars($p['prix']) ?> FBu</td>
                      <td><?= htmlspecialchars((new DateTime($p['created_at']))->format('d/m/Y')) ?></td>
                      <td class="text-end">
                        <!-- Modifier -->
                        <a href="#"
                          class="editBtn"
                          data-bs-toggle="modal"
                          data-bs-target="#modifyProductModal"
                          data-id="<?= $p['id'] ?>"
                          data-nom="<?= htmlspecialchars($p['nom']) ?>"
                          data-categorie="<?= htmlspecialchars($p['categorie']) ?>"
                          data-prix="<?= $p['prix'] ?>"
                          data-unite="<?= $p['mesure'] ?>">
                          <i class="las la-pen text-secondary fs-18"></i>
                        </a>


                        <!-- Supprimer -->
                        <a href="#"
                          class="text-danger delete-btn"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteModal"
                          data-id="<?= $p['id'] ?>"
                          data-nom="<?= htmlentities($p['nom']) ?>">
                          <i class="las la-trash-alt fs-18"></i>
                        </a>

                      </td>

                    </tr>
                  <?php endforeach ; ?>
                  </tbody>
                </table>
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
          <form action="./../../../backend/admin/produit/add.php" method="post" id="form-add-produit">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title">Ajouter un produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body">

                <!-- Nom du produit -->
                <div class="mb-2">
                  <label>Produit</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                    <input type="text" id="add-produit" name="nom" class="form-control" placeholder="Nom du produit" required>
                  </div>
                </div>

                <!-- Catégorie -->
                <div class="mb-2">
                  <label class="form-label">Catégorie</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-tags"></i></span>
                    <select id="add-categorie" name="categorie" class="form-select" required>
                      <option value="" selected disabled>Choisir une catégorie</option>

                      <?php foreach($categories as $c): ?>
                        <option value="<?= htmlspecialchars($c['nom']) ?>">
                          <?= htmlspecialchars($c['nom']) ?>
                        </option>
                      <?php endforeach; ?>

                    </select>
                  </div>
                </div>

                <!-- Unité -->
                <div class="mb-2">
                  <label class="form-label">Unité de mesure</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-ruler"></i></span>
                    <select id="add-unite" name="unite" class="form-select" required>
                      <option value="" disabled selected>Choisir une unité</option>
                      <option value="kg">Kg</option>
                      <option value="L">L</option>
                      <option value="m">m</option>
                      <option value="unite">unite</option>
                      <option value="paire">Paire</option>
                      <option value="piece">Pièce</option>
                      <option value="carton">Carton</option>
                    </select>
                  </div>
                </div>

                <!-- Prix -->
                <div class="mb-2">
                  <label>Prix</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                    <input type="number" name="prix" id="add-prix" class="form-control" placeholder="Prix du produit" required>
                  </div>
                </div>

              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100" name="send">Ajouter</button>
              </div>

            </div>
            </form>

        </div>
      </div>

      <!-- Popup Modifier  -->
<div class="modal fade" id="modifyProductModal" tabindex="-1" aria-labelledby="modifyProductLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="./../../../backend/admin/produit/edit.php" method="post" id="form-edit-produit">
      <input type="hidden" name="id" id="edit-id">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modifyProductLabel">Modifier le produit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

          <!-- Nom du produit -->
          <div class="mb-2">
            <label>Produit</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-box"></i></span>
              <input type="text" name="nom" id="edit-nom" class="form-control" placeholder="Nom du produit" required>
            </div>
          </div>

          <!-- Catégorie -->
          <div class="mb-2">
            <label class="form-label">Catégorie</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-tags"></i></span>
              <select name="categorie" id="edit-categorie" class="form-select" required>
                <option value="" disabled>Choisir une catégorie</option>
                <?php foreach($categories as $c): ?>
                  <option value="<?= htmlspecialchars($c['nom']) ?>"><?= htmlspecialchars($c['nom']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <!-- Unité -->
          <div class="mb-2">
            <label class="form-label">Unité de mesure</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-ruler"></i></span>
              <select name="unite" id="edit-unite" class="form-select" required>
                <option value="" disabled>Choisir une unité</option>
                <option value="kg">Kg</option>
                <option value="L">L</option>
                <option value="m">m</option>
                <option value="unite">Unité</option>
                <option value="paire">Paire</option>
                <option value="piece">Pièce</option>
                <option value="carton">Carton</option>
              </select>
            </div>
          </div>

          <!-- Prix -->
          <div class="mb-2">
            <label>Prix</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
              <input type="number" name="prix" id="edit-prix" class="form-control" placeholder="Prix du produit" required>
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
              <h5 class="modal-title text-danger">Supprimer Produit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <p>
                Voulez-vous vraiment supprimer
                <strong id="catName"></strong> ?
              </p>
            </div>

            <div class="modal-footer">
              <form method="POST" action="./../../../backend/admin/produit/delete.php">
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
            btn.addEventListener('click', function () {
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
                document.getElementById('edit-prix').value = this.dataset.prix;
                document.getElementById('edit-unite').value = this.dataset.unite;
                document.getElementById('edit-categorie').value = this.dataset.categorie;
              });
            });
          });
        </script>

