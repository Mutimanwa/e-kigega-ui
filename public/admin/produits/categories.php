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

//================== fetch les categories
$categories = getApi('/api/categories/') ?? [];
if (!is_array($categories)) {
    echo "<div class='alert alert-danger'>API error</div>";
    $categories = [];
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
            <h4 class="page-title">Categorie des produits</h4>
            <div class="">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li><!--end nav-item-->
                <li class="breadcrumb-item active">Categorie des produits</li>
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
                  <button class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#addRate"><i class="fas fa-plus me-1"></i> Ajouter une catégorie</button>
                </div><!--end col-->
              </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
              <div class="table-responsive">
                <table class="table mb-0" id="datatable_1">
                  <thead class="table-light">
                    <tr>
                      <th>Nom</th>
                      <th>Date</th>
                      <th class="text-end">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($categories as $c): ?>

                    <tr>
                      <td><?= htmlentities($c['nom']) ?></td>
                      <td><?= htmlspecialchars((new DateTime($c['created_at']))->format('d/m/Y')) ?></td>

                      <td class="text-end">
                        <!-- Modifier -->
                        <a href="#"
                          data-bs-toggle="modal"
                          data-bs-target="#modifyRate"
                          class="edit-product"
                          data-produit="Ordinateur HP"
                          data-categorie="Informatique"
                          data-prix="1200"
                          data-quantite="10">
                          <i class="las la-pen text-secondary fs-18"></i>
                        </a>

                        <!-- Supprimer -->
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="las la-trash-alt text-secondary fs-18"></i></a>

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

      <script>
        // toast success
        <?php if (isset($_GET['success'])): ?>
          showToast("<?= htmlspecialchars($_GET['success']) ?>", 'success');
   
        <?php endif; ?>
        // toast error
        <?php if (isset($_GET['error'])): ?>
         showToast("<?= htmlspecialchars($_GET['error']) ?>", 'danger');
       
        <?php endif; ?>

        function showToast(message, type = 'info') {
    // Créer un toast Bootstrap
      const toastContainer = document.getElementById('toastContainer');
      if (!toastContainer) {
          const container = document.createElement('div');
          container.id = 'toastContainer';
          container.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999;';
          document.body.appendChild(container);
    }
    
    const toastId = 'toast-' + Date.now();
    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-white bg-${type} border-0`;
    toast.id = toastId;
    toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;
    
    document.getElementById('toastContainer').appendChild(toast);
    
    const bsToast = new bootstrap.Toast(toast, {
        autohide: true,
        delay: 3000
    });
    
    bsToast.show();
    
    toast.addEventListener('hidden.bs.toast', function () {
        toast.remove();
    });
}
      </script>

      <!-- Popup Ajouter -->
      <div class="modal fade" id="addRate" tabindex="-1" aria-labelledby="addRateLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="./../../../backend/admin/categorie/add.php" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addRateLabel">Ajouter une categorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">

                <div class="mb-2">
                  <label>Nom de la catégorie</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                    <input type="text" id="add-produit" name="nom" class="form-control" placeholder="Nom de la catégorie">
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <input type="hidden" name="send">
                <button type="submit" class="btn btn-primary w-100">Ajouter</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Popup Modifier  -->
      <div class="modal fade" id="modifyRate" tabindex="-1" aria-labelledby="modifyRateLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="#">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modifyRateLabel">Modifier une catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">

                <div class="mb-2">
                  <label>Nom de la catégorie</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                    <input type="text" id="add-produit" class="form-control" placeholder="Nom de la catégorie">
                  </div>
                </div>

                <div class="mb-2">
                  <label for="add-description" class="form-label">Description</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-align-left"></i>
                    </span>
                    <textarea id="add-description"
                      class="form-control"
                      rows="3"
                      placeholder="Description de la dépense"></textarea>
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
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="DeleteUserLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-white">
              <h5 class="modal-title text-danger" id="addUserLabel">Supprimer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-muted">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-outline-danger">Oui</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Annuler
              </button>

            </div>
          </div>
        </div>
      </div>