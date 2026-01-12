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
    $clients=getApi('/api/partners/') ?? [];
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
                                        <button class="btn bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#addRate"><i class="fas fa-plus me-1"></i> Ajouter un fournisseur</button> 
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
                                                <th class=>N° Telephone</th>
                                                <th class=>Email</th>
                                                <th class=>adresse</th>
                                                <th>Date</th>
                                            <th class="text-end">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <tr>                                                
                                                 <td> Urbain</td>
                                                <td>Kamana</td>
                                                <td>60110011</td>
                                                 <td>
                                <a href="mailto:kamana@gmail.com" class="text-primary text-decoration-underline">
                                    kamana@gmail.com
                                </a>
                                </td>                                  
                                                <td>Kanyosha</td>
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
                                <i class="las la-pen text-secondary fs-18"  data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Modifier"></i>
                                </a>

                                <!-- Supprimer -->
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="las la-trash-alt text-secondary fs-18 "  data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Supprimer"></i></a>

                            </td>
                                                                    </tr>
                                                                                                                        
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
   

<!-- Popup Ajouter -->
<div class="modal fade" id="addRate" tabindex="-1" aria-labelledby="addRateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="#">
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
          <input type="text" id="add-nom" class="form-control" placeholder="Nom du fournisseur">
        </div>
      </div>

      <div class="mb-2">
        <label>Prénom</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-user-tag"></i>
          </span>
          <input type="text" id="add-prenom" class="form-control" placeholder="Prénom du fournisseur">
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
          <input type="email" id="add-email" class="form-control" placeholder="Email du fournisseur">
        </div>
      </div>

      <div class="mb-2">
        <label>Adresse</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-map-marker-alt"></i>
          </span>
          <input type="text" id="add-adresse" class="form-control" placeholder="Adresse du fournisseur">
        </div>
      </div>


  <div class="mb-2">
  <label>Type</label>
  <div class="input-group">
    <span class="input-group-text">
      <i class="fas fa-tags"></i>
    </span>
    <input type="text" id="add-type" class="form-control" placeholder="Type du fournisseur">
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
          <h5 class="modal-title" id="modifyRateLabel">Modifier un fournisseur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

            <div class="mb-2">
        <label>Nom</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-user"></i>
          </span>
          <input type="text" id="add-nom" class="form-control" placeholder="Nom du fournisseur">
        </div>
      </div>

      <div class="mb-2">
        <label>Prénom</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-user-tag"></i>
          </span>
          <input type="text" id="add-prenom" class="form-control" placeholder="Prénom du fournisseur">
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
          <input type="email" id="add-email" class="form-control" placeholder="Email du fournisseur">
        </div>
      </div>

      <div class="mb-2">
        <label>Adresse</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fas fa-map-marker-alt"></i>
          </span>
          <input type="text" id="add-adresse" class="form-control" placeholder="Adresse du fournisseur">
        </div>
      </div>

      <div class="mb-2">
  <label>Type</label>
  <div class="input-group">
    <span class="input-group-text">
      <i class="fas fa-tags"></i>
    </span>
    <input type="text" id="add-type" class="form-control" placeholder="Type du fournisseur">
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


   <!-- js pour le tooltip -->
    <script>
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>

