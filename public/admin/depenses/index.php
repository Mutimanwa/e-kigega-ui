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
                            <h4 class="page-title">Depenses</h4>
                            <div class="">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                                    <li class="breadcrumb-item"><a href="#">Admin</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item active">Depenses</li>
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
                                        <h4 class="card-title">Depenses Details</h4>                      
                                    </div><!--end col-->
                                    <div class="col-auto"> 
                                        <button class="btn bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#addRate"><i class="fas fa-plus me-1"></i> Ajouter une dépense</button> 
                                    </div><!--end col-->
                                </div><!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table mb-0" id="datatable_1">
                                        <thead class="table-light">
                                          <tr>
                                            <th>Categorie</th>
                                            <th>Description</th>
                                            <th>Montant</th>
                                            <th class="text-end">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <tr>                                                
                                                <td>Alminium</td>
                                                <td> this is wakanda product</td>
                                                <td> 1400</td>
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
                                  <br>
                                                      <div class="d-flex justify-content-center">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
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
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
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
          <h5 class="modal-title" id="addRateLabel">Ajouter une dépense</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

        
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
            <div class="mb-2">
                <label>Montant</label>
                <div class="input-group">
                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                <input type="number" id="add-prix" class="form-control" placeholder="Montant de la dépense">
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
          <h5 class="modal-title" id="modifyRateLabel">Modifier une dépense</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

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
            <div class="mb-2">
                <label>Montant</label>
                <div class="input-group">
                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                <input type="number" id="add-prix" class="form-control" placeholder="Montant de la prduit">
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


