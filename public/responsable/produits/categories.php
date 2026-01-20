<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
session_start();

require_once('./../../../backend/function/function.php');
$role = "VENTES";
    $entreprise = $_SESSION['entreprise'] ?? null;

    // Vérifier l’accès
    if (requireRole($role) === "Accès interdit") {
        session_destroy();
        header("Location: ./../../../index.php?error=Acces_interdit");
        exit;
    }

    // Vérifier l’abonnement (SUPER_ADMIN n’en a pas besoin)
    if ($_SESSION['role'] !== "SUPER_ADMIN") {
        abonnement("./../../../index.php", $entreprise);
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
                <li class="breadcrumb-item"><a href="#">Responsable des Ventes</a>
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
                  <h4 class="card-title"> Détails</h4>
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
                          class="editBtn"
                          data-bs-toggle="modal"
                          data-bs-target="#modifyRate"
                          data-id="<?= $c['id'] ?>"
                          data-nom="<?= htmlspecialchars($c['nom']) ?>">
                           <i class="las la-pen  fs-18"  data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Modifier"></i>
                        </a>


                        <!-- Supprimer -->
                        <a href="#"
                          class="text-danger delete-btn"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteModal"
                          data-id="<?= $c['id'] ?>"
                          data-nom="<?= htmlentities($c['nom']) ?>" >
                         <i class="las la-trash-alt  fs-18 "  data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Supprimer" ></i>
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
          <form action="./../../../backend/responsable/categorie/add.php" method="post">
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
      <div class="modal fade" id="modifyRate" tabindex="-1">
        <div class="modal-dialog">
          <form method="POST" action="./../../../backend/responsable/categorie/update.php">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title">Modifier catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body">

                <input type="hidden" name="id" id="edit-id">

                <div class="mb-3">
                  <label>Nom</label>
                  <input type="text" name="nom" id="edit-nom" class="form-control" required>
                </div>

              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
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
              <h5 class="modal-title text-danger">Supprimer catégorie</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <p>
                Voulez-vous vraiment supprimer
                <strong id="catName"></strong> ?
              </p>
            </div>

            <div class="modal-footer">
              <form method="POST" action="./../../../backend/responsable/categorie/delete.php">
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

      <!-- js pour recuperer l'id lors de modification -->
      <script>
        document.querySelectorAll('.editBtn').forEach(btn => {
          btn.addEventListener('click', function () {
            document.getElementById('edit-id').value = this.dataset.id;
            document.getElementById('edit-nom').value = this.dataset.nom;
          });
        });
      </script>

<!-- js pour le tooltip -->
          <script>
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>
