<?php
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
                                        <h4 class="card-title">Produits Details</h4>                      
                                    </div><!--end col-->
                                    <div class="col-auto"> 
                                        <button class="btn bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#addRate"><i class="fas fa-plus me-1"></i> Ajouter un produit</button> 
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
                                            <th>Prix</th>
                                            <th>Quantite</th>
                                            <th class="text-end">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <tr>                                                
                                                <td>Fer</td>
                                                <td>Alminium</td>
                                                <td> $14500</td>
                                                <td> 14</td>
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
                                <a href="#">
                                <i class="las la-trash-alt text-secondary fs-18"></i>
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

            </div>
            <!--Start Footer-->
            
       

<?php
include "./../../../includes/footer.php";
?>
   

<!-- Popup Ajouter -->
<div class="modal fade" id="addRate" tabindex="-1" aria-labelledby="addRateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="">
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
            <label>Catégorie</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-tags"></i></span>
              <input type="text" id="add-categorie" class="form-control" placeholder="Nom de catégorie">
            </div>
          </div>

          <div class="mb-2">
            <label>Prix</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
              <input type="number" id="add-prix" class="form-control" placeholder="Prix du produit">
            </div>
          </div>

          <div class="mb-2">
            <label>Quantité</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
              <input type="number" id="add-quantite" class="form-control" placeholder="Quantité">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary w-100">Ajouter</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Popup Modifier  -->
<div class="modal fade" id="modifyRate" tabindex="-1" aria-labelledby="modifyRateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="">
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
            <label>Catégorie</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-tags"></i></span>
              <input type="text" id="modify-categorie" class="form-control" placeholder="Nom de catégorie">
            </div>
          </div>

          <div class="mb-2">
            <label>Prix</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
              <input type="number" id="modify-prix" class="form-control" placeholder="Prix du produit">
            </div>
          </div>

          <div class="mb-2">
            <label>Quantité</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
              <input type="number" id="modify-quantite" class="form-control" placeholder="Quantité">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary w-100">Modifier</button>
        </div>
      </div>
    </form>
  </div>
</div>


