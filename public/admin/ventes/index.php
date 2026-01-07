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
                            <h4 class="page-title">Ventes</h4>
                            <div class="">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                                    <li class="breadcrumb-item"><a href="#">Admin</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item active">Ventes</li>
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
                                        <button class="btn bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#addRate"><i class="fas fa-plus me-1"></i> Ajouter une vente</button> 
                                    </div><!--end col-->
                                </div><!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">

                                                            <style>
                            /* Style et responsive pour tous les statuts */
                            .status {
                                display: inline-block;
                                padding: 0.15em 0.5em;       /* padding flexible */
                                font-weight: 600;
                                font-size: 0.65rem;          /* base mini */
                                border-radius: 0.35em;       /* arrondi subtil */
                                text-transform: uppercase;
                                letter-spacing: 0.025em;
                                text-align: center;
                                vertical-align: middle;
                                box-shadow: inset 0 -1px 0 rgba(0,0,0,0.1);
                                transition: all 0.2s ease-in-out;
                                white-space: nowrap;         /* empêcher le retour à la ligne */
                                overflow: hidden;
                                text-overflow: ellipsis;     /* ... si le texte est trop long */
                            }

                            /* Couleurs sobres, semi-transparentes (rgba) */
                            .status.en-attente {
                                background: linear-gradient(135deg, rgba(242, 186, 0, 0.09), rgba(245, 213, 71, 0.2));
                                color: #f9de12ff;
                            }

                            .status.payee {
                                background: linear-gradient(135deg, rgba(0, 158, 79, 0.08), rgba(102, 255, 110, 0.08));
                                color: #078f49ff;
                            }

                            .status.paiement-partiel {
                                background: linear-gradient(135deg, rgba(255, 128, 0, 0.19), rgba(255, 184, 77, 0.22));
                                color: #d27905ff;
                            }

                            .status.annulee {
                                background: linear-gradient(135deg, rgba(195, 0, 0, 0.2), rgba(255, 82, 82, 0.28));
                                color: #b30909ff;
                            }

                            .status.rembourse {
                                background: linear-gradient(135deg, rgba(41, 98, 255, 0.18), rgba(100, 180, 246, 0.21));
                                color: #0d47a1ff;
                            }

                            /* Hover subtil et professionnel */
                            .status:hover {
                                transform: scale(1.1);
                                box-shadow: 0 2px 6px rgba(0,0,0,0.25);
                            }

                            /* Optionnel : espace visuel discret pour badges */
                            .status::after {
                                content: "";
                                display: inline-block;
                                width: 0.15em;
                            }

                            /* Media Queries pour responsive */
                            @media (max-width: 768px) {
                                .status {
                                    font-size: 0.55rem;    /* texte plus petit sur tablette */
                                    padding: 0.1em 0.4em;
                                }
                            }

                            @media (max-width: 480px) {
                                .status {
                                    font-size: 0.5rem;     /* texte ultra petit sur mobile */
                                    padding: 0.08em 0.3em;
                                    letter-spacing: 0.02em;
                                }
                            }


                                </style>
                             <table class="table mb-0" id="datatable_1">
                            <thead class="table-light">
                                <tr>
                                    <th>Client</th>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Statut</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fer</td>
                                    <td>Aluminium</td>
                                    <td>10</td>
                                    <td><span class="status en-attente">En attente</span></td>
                                    <td class="text-end">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modifyRate" class="edit-product">
                                            <i class="las la-pen text-secondary fs-18"></i>
                                        </a>
                                        <a href="#">
                                            <i class="las la-trash-alt text-secondary fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jean</td>
                                    <td>Ordinateur</td>
                                    <td>5</td>
                                    <td><span class="status payee">Payée</span></td>
                                   <td class="text-end">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modifyRate" class="edit-product">
                                            <i class="las la-pen text-secondary fs-18"></i>
                                        </a>
                                        <a href="#">
                                            <i class="las la-trash-alt text-secondary fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Marie</td>
                                    <td>Smartphone</td>
                                    <td>8</td>
                                    <td><span class="status paiement-partiel">Paiement partiel</span></td>
                                    <td class="text-end">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modifyRate" class="edit-product">
                                            <i class="las la-pen text-secondary fs-18"></i>
                                        </a>
                                        <a href="#">
                                            <i class="las la-trash-alt text-secondary fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paul</td>
                                    <td>Tablette</td>
                                    <td>3</td>
                                    <td><span class="status annulee">Annulée</span></td>
                                    <td class="text-end">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modifyRate" class="edit-product">
                                            <i class="las la-pen text-secondary fs-18"></i>
                                        </a>
                                        <a href="#">
                                            <i class="las la-trash-alt text-secondary fs-18"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lucie</td>
                                    <td>Imprimante</td>
                                    <td>2</td>
                                    <td><span class="status rembourse">Remboursée</span></td>
                                    <td class="text-end">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modifyRate" class="edit-product">
                                            <i class="las la-pen text-secondary fs-18"></i>
                                        </a>
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
 $pageLibs = [
    LIBS_URL . "simple-datatables/umd/simple-datatables.js",
    JS_URL . "pages/datatables.init.js"
];
include "./../../../includes/footer.php";
?>
   

<!-- Popup Ajouter -->
<div class="modal fade" id="addRate" tabindex="-1" aria-labelledby="addRateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="#" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRateLabel">Ajouter une vente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">


               <div class="mb-2">
    <label for="add-categorie" class="form-label">Client</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fas fa-tags"></i>
        </span>
        <select id="add-categorie" class="form-select">
            <option value="" selected disabled>Choisir un client</option>
            <option value="autre">Autre</option>
        </select>
    </div>
</div>
       

               <div class="mb-2">
    <label for="add-categorie" class="form-label">Produit</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fas fa-tags"></i>
        </span>
        <select id="add-categorie" class="form-select">
            <option value="" selected disabled>Choisir un produit</option>
            <option value="autre">Autre</option>
        </select>
    </div>
</div>
       


          <div class="mb-2">
            <label>Quantité</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
              <input type="number" id="add-quantite" class="form-control" placeholder="Quantité">
            </div>
          </div>

              <div class="mb-2">
    <label for="add-statut" class="form-label">Statut</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fas fa-tags"></i>
        </span>
        <select id="add-statut" class="form-select">
            <option value="" selected disabled>Choisir un statut</option>

            <option value="en-attente">En attente</option>
            <option value="payee">Payée</option>
            <option value="paiement-partiel">Paiement partiel</option>
            <option value="annulee">Annulée</option>
            <option value="rembourse">Remboursée</option>
        </select>
    </div>
</div>


        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-primary w-100">Ajouter</button>
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
          <h5 class="modal-title" id="modifyRateLabel">Modifier une vente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

               <div class="mb-2">
    <label for="add-categorie" class="form-label">Client</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fas fa-tags"></i>
        </span>
        <select id="add-categorie" class="form-select">
            <option value="" selected disabled>Choisir un client</option>
            <option value="autre">Autre</option>
        </select>
    </div>
</div>
       

               <div class="mb-2">
    <label for="add-categorie" class="form-label">Produit</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fas fa-tags"></i>
        </span>
        <select id="add-categorie" class="form-select">
            <option value="" selected disabled>Choisir un produit</option>
            <option value="autre">Autre</option>
        </select>
    </div>
</div>
       


          <div class="mb-2">
            <label>Quantité</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
              <input type="number" id="add-quantite" class="form-control" placeholder="Quantité">
            </div>
          </div>

              <div class="mb-2">
    <label for="add-statut" class="form-label">Statut</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fas fa-tags"></i>
        </span>
        <select id="add-statut" class="form-select">
            <option value="" selected disabled>Choisir un statut</option>

            <option value="en-attente">En attente</option>
            <option value="payee">Payée</option>
            <option value="paiement-partiel">Paiement partiel</option>
            <option value="annulee">Annulée</option>
            <option value="rembourse">Remboursée</option>
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


