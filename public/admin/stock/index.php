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


    //===================== fetch fournisseurs
     $fournisseurs=getApi('/api/partners/fournisseurs/') ?? [];
      if (!is_array($fournisseurs)) {
        echo "<div class='alert alert-danger'>API error</div>";
        $fournisseurs = [];
      }    

    // ================== fetch les categories
    $stocks = getApi('/api/stocks/') ?? [];
    if (!is_array($stocks)) {
        echo "<div class='alert alert-danger'>Erreur API Categories</div>";
        $stocks = [];
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
            <h4 class="page-title">Stock</h4>
            <div class="">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li><!--end nav-item-->
                <li class="breadcrumb-item active">Stock</li>
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
                      class="fas fa-plus me-1"></i> Ajouter un produit</button>
                </div><!--end col-->
              </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
              <div class="table-responsive">
                <table class="table " id="datatable_1">
                  <thead class="table-light">
                    <tr>
                      <th>Produit</th>
                      <th>Fournisseurs</th>
                      <th>Quantite</th>
                      <th>Prix d'achat</th>
                      <th>Prix total </th>
                      <th>Date</th>
                      <th class="text-end">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($stocks as $s): ?>
                    <?php 
                        $quantite = floatval($s['quantite']);
                        $prix = floatval($s['prix_achat']);
                        $total = $quantite * $prix;
                    ?>
                    <tr>
                      <td><?= getAPI_id('/api/produits/',$s['produit'])['nom'] ?></td>
                      <td><?= getAPI_id('/api/partners/',$s['fournisseur'])['nom'] ?> <?= getAPI_id('/api/partners/',$s['fournisseur'])['prenom'] ?></td>
                      <td> <?=  htmlspecialchars(number_format($s['quantite']),2)?></td>
                      <td><?=  htmlspecialchars(number_format($s['prix_achat']),2)?></td>
                      <td><?=  htmlspecialchars(number_format($total),2)?></td>
                      <td><?= htmlspecialchars((new DateTime($s['date_entree']))->format('d/m/Y')) ?></td>
                      <td class="text-end">

                        <!-- Modifier -->
                        <a href="#"
                          class="editBtn"
                          data-bs-toggle="modal"
                          data-bs-target="#modifyProductModal"
                          data-id="<?= $s['id'] ?>"
                          data-prix_achat="<?= htmlspecialchars($s['prix_achat']) ?>"
                          data-date_entree="<?= htmlspecialchars($s['date_entree']) ?>"
                          data-quantite="<?= $s['quantite'] ?>"
                          data-produit="<?= $s['produit'] ?>"
                          data-fournisseur="<?= $s['fournisseur'] ?>">
                          <i class="las la-pen text-secondary fs-18"></i>
                        </a>

                        <!-- Supprimer -->
                        <a href="#"
                          class="text-danger delete-btn"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteModal"
                          data-id="<?= $s['id'] ?>"
                          data-nom="la tracabilite de l'entree de <?= getAPI_id('/api/produits/',$s['produit'])['nom'] ?> ">
                          <i class="las la-trash-alt fs-18"></i>
                        </a>

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
          <form action="./../../../backend/admin/stocks/add.php" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addRateLabel">Ajouter un produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">

                <div class="mb-2">
                  <label for="add-categorie" class="form-label">Fournisseurs</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-user"></i>
                    </span>
                    <select id="add-categorie" name="fournisseur" class="form-select">
                      <option value="" selected disabled>Choisir un fournisseur</option>
                      <?php foreach($fournisseurs as $f): ?>
                        <option value="<?= htmlspecialchars($f['id']) ?>">
                          <?= htmlspecialchars($f['nom']) ?> <?= htmlspecialchars($f['prenom']) ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="mb-2">
                  <label for="add-categorie" class="form-label">Produits</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-tags"></i>
                    </span>
                    <select id="add-categorie" name="produit" class="form-select">
                      <option value="" selected disabled>Choisir un produit</option>
                      <?php foreach($produits as $p): ?>
                        <option value="<?= htmlspecialchars($p['id']) ?>">
                          <?= htmlspecialchars($p['nom']) ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="mb-2">
                  <label>Prix d'achat</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                    <input type="number" id="add-prix" name="prix_achat" class="form-control" placeholder="Prix d'achat du produit">
                  </div>
                </div>



                <div class="mb-2">
                  <label>Quantité</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                    <input type="number" id="add-quantite" name="quantite" class="form-control" placeholder="Quantité">
                  </div>
                </div>

                <div class="mb-2">
                  <label>Data d'entree</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                    <input type="date" id="add-data" name="date_entree" class="form-control" placeholder="Data d'entree">
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
          <form action="./../../../backend/admin/stocks/edit.php" method="post" id="form-edit-produit">
            <input type="hidden" name="id" id="edit-id">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modifyProductLabel">Modifier l'entree dans le stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">

                <!-- Nom du Fournisseurs -->
                <div class="mb-2">
                  <label for="add-categorie" class="form-label">Fournisseurs</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-user"></i>
                    </span>
                    <select id="edit-fournisseur" name="fournisseur" class="form-select">
                      <option value="" selected disabled>Choisir un fournisseur</option>
                      <?php foreach($fournisseurs as $f): ?>
                        <option value="<?= htmlspecialchars($f['id']) ?>">
                          <?= htmlspecialchars($f['nom']) ?> <?= htmlspecialchars($f['prenom']) ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="mb-2">
                  <label for="add-categorie" class="form-label">Produits</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-tags"></i>
                    </span>
                    <select id="edit-produit" name="produit" class="form-select">
                      <option value="" selected disabled>Choisir un produit</option>
                      <?php foreach($produits as $p): ?>
                        <option value="<?= htmlspecialchars($p['id']) ?>">
                          <?= htmlspecialchars($p['nom']) ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="mb-2">
                  <label>Prix d'achat</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                    <input type="number" id="edit-prix_achat" name="prix_achat" class="form-control" placeholder="Prix d'achat du produit">
                  </div>
                </div>



                <div class="mb-2">
                  <label>Quantité</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                    <input type="number" id="edit-quantite" name="quantite" class="form-control" placeholder="Quantité">
                  </div>
                </div>

                <div class="mb-2">
                  <label>Data d'entree</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                    <input type="date" id="edit-date_entree" name="date_entree" class="form-control" placeholder="Data d'entree">
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
              <h5 class="modal-title text-danger">Supprimer l'entree</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <p>
                Voulez-vous vraiment supprimer
                <strong id="catName"></strong> ?
              </p>
            </div>

            <div class="modal-footer">
              <form method="POST" action="./../../../backend/admin/stocks/delete.php">
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
                document.getElementById('edit-fournisseur').value = this.dataset.fournisseur;
                document.getElementById('edit-produit').value = this.dataset.produit;
                document.getElementById('edit-prix_achat').value = this.dataset.prix_achat;
                document.getElementById('edit-quantite').value = this.dataset.quantite;
                document.getElementById('edit-date_entree').value = this.dataset.date_entree;
              });
            });
          });
       </script>
