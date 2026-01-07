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
                            <h4 class="page-title">Client</h4>
                            <div class="">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                                    <li class="breadcrumb-item"><a href="#">Admin</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item active">Client</li>
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
                                        <button class="btn bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#addRate"><i class="fas fa-plus me-1"></i> Ajouter un client</button> 
                                    </div><!--end col-->
                                </div><!--end row-->                                  
                            </div><!--end card-header-->
                           <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table mb-0" id="datatable_1">
                                        <thead class="table-light">
                                          <tr>
                                             <th class=>Nom</th>
                                                <th class=>Prenom</th>
                                                <th class=>Telephone</th>
                                                <th class=>Email</th>
                                                <th class=>adresse</th>
                                            <th class="text-end">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <tr>                                                
                                                 <td> Audry</td>
                                                <td>Wakanda</td>
                                                <td>62661187</td>
                                                <td>audrywakanda@gmail.com</td>                                   
                                                <td>Carama-gahahe</td>
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
include "./../../../includes/footer.php";
?>
   

<!-- Popup Ajouter -->
<div class="modal fade" id="addRate" tabindex="-1" aria-labelledby="addRateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="#">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="addRateLabel">Ajouter un client</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>

    <div class="modal-body">

      <div class="mb-2">
        <label>Nom</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-user"></i>
          </span>
          <input type="text" id="add-nom" class="form-control" placeholder="Nom du client">
        </div>
      </div>

      <div class="mb-2">
        <label>Prénom</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-user-tag"></i>
          </span>
          <input type="text" id="add-prenom" class="form-control" placeholder="Prénom du client">
        </div>
      </div>

      <div class="mb-2">
        <label>Téléphone</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-phone"></i>
          </span>
          <input type="number" id="add-telephone" class="form-control" placeholder="Numéro de téléphone">
        </div>
      </div>

      <div class="mb-2">
        <label>Email</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-envelope"></i>
          </span>
          <input type="email" id="add-email" class="form-control" placeholder="Email du client">
        </div>
      </div>

      <div class="mb-2">
        <label>Adresse</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-map-marker-alt"></i>
          </span>
          <input type="text" id="add-adresse" class="form-control" placeholder="Adresse du client">
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
          <h5 class="modal-title" id="modifyRateLabel">Modifier un client</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

            <div class="mb-2">
        <label>Nom</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-user"></i>
          </span>
          <input type="text" id="add-nom" class="form-control" placeholder="Nom du client">
        </div>
      </div>

      <div class="mb-2">
        <label>Prénom</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-user-tag"></i>
          </span>
          <input type="text" id="add-prenom" class="form-control" placeholder="Prénom du client">
        </div>
      </div>

      <div class="mb-2">
        <label>Téléphone</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-phone"></i>
          </span>
          <input type="number" id="add-telephone" class="form-control" placeholder="Numéro de téléphone">
        </div>
      </div>

      <div class="mb-2">
        <label>Email</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-envelope"></i>
          </span>
          <input type="email" id="add-email" class="form-control" placeholder="Email du client">
        </div>
      </div>

      <div class="mb-2">
        <label>Adresse</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-map-marker-alt"></i>
          </span>
          <input type="text" id="add-adresse" class="form-control" placeholder="Adresse du client">
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


