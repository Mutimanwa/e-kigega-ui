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
                      <th>Date</th>
                      <th class="text-end">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>Fer</td>
                      <td>Alminium</td>
                      <td> 14</td>
                      <td>2024-06-01</td>
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

                  </tbody>
                </table>

              </div>
              <br>
              <div class="d-flex justify-content-center">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Précédent</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">Suivant</a>
                  </li>
                </ul>
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


      <!-- Popup Ajouter -->
      <div class="modal fade" id="addRate" tabindex="-1" aria-labelledby="addRateLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="#">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addRateLabel">Ajouter un produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">

                <div class="mb-2">
                  <label>Produit</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                    <input type="text" id="add-produit" class="form-control" placeholder="Nom de produit">
                  </div>
                </div>

                <div class="mb-2">
                  <label for="add-categorie" class="form-label">Catégorie</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-tags"></i>
                    </span>
                    <select id="add-categorie" class="form-select">
                      <option value="" selected disabled>Choisir une catégorie</option>
                      <option value="autre">Autre</option>
                    </select>
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

      <!-- Popup Modifier  -->
      <div class="modal fade" id="modifyRate" tabindex="-1" aria-labelledby="modifyRateLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="#">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modifyRateLabel">Modifier un produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">

                <div class="mb-2">
                  <label>Produit</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                    <input type="text" id="modify-produit" class="form-control" placeholder="Nom de produit">
                  </div>
                </div>

                <div class="mb-2">
                  <label for="add-categorie" class="form-label">Catégorie</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fas fa-tags"></i>
                    </span>
                    <select id="add-categorie" class="form-select">
                      <option value="" selected disabled>Choisir une catégorie</option>
                      <option value="autre">Autre</option>
                    </select>
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