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

    //=============== fetch les ventes
    $ventes=getApi('/api/produits/') ?? [];
    if (!is_array($ventes)) {
      echo "<div class='alert alert-danger'>API error</div>";
      $ventes = [];
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
                                    <button class="btn bg-primary text-white" data-bs-toggle="modal"
                                        data-bs-target="#addRate"><i class="fas fa-plus me-1"></i> Ajouter une
                                        vente</button>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">

                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Client</th>
                                            <th>Produit</th>
                                            <th>Quantité</th>
                                            <th>Prix de vente</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Fer</td>
                                            <td>Aluminium</td>
                                            <td>10</td>
                                            <td>12000 FBu</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <span class="badge rounded text-warning bg-warning-subtle">
                                                    En attente
                                                </span>
                                            </td>

                                            <td class="text-end">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modifyRate"
                                                    class="edit-product">
                                                    <i class="las la-pen text-secondary fs-18"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                        class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jean</td>
                                            <td>Ordinateur</td>
                                            <td>5</td>
                                            <td>12000 FBu</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <span class="badge rounded text-success bg-success-subtle">
                                                    Payée
                                                </span>
                                            </td>

                                            <td class="text-end">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modifyRate"
                                                    class="edit-product">
                                                    <i class="las la-pen text-secondary fs-18"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                        class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Marie</td>
                                            <td>Smartphone</td>
                                            <td>8</td>
                                            <td>12000 FBu</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <span class="badge rounded text-info bg-info-subtle">
                                                    Paiement partiel
                                                </span>
                                            </td>

                                            <td class="text-end">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modifyRate"
                                                    class="edit-product">
                                                    <i class="las la-pen text-secondary fs-18"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                        class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Paul</td>
                                            <td>Tablette</td>
                                            <td>3</td>
                                            <td>12000 FBu</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <span class="badge rounded text-danger bg-danger-subtle">
                                                    Annulée
                                                </span>
                                            </td>

                                            <td class="text-end">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modifyRate"
                                                    class="edit-product">
                                                    <i class="las la-pen text-secondary fs-18"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                        class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lucie</td>
                                            <td>Imprimante</td>
                                            <td>2</td>
                                            <td>12000 FBu</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <span class="badge rounded text-primary bg-primary-subtle">
                                                    Remboursée
                                                </span>
                                            </td>

                                            <td class="text-end">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modifyRate"
                                                    class="edit-product">
                                                    <i class="las la-pen text-secondary fs-18"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                        class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr>
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


            <!-- Popup Ajouter -->
            <div class="modal fade" id="addRate" tabindex="-1" aria-labelledby="addRateLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="#">
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
                                            <i class="fas fa-user"></i>
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
                                        <input type="number" id="add-quantite" class="form-control"
                                            placeholder="Quantité">
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
                                <h5 class="modal-title" id="modifyRateLabel">Modifier une vente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-2">
                                    <label for="add-categorie" class="form-label">Client</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
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
                                        <input type="number" id="add-quantite" class="form-control"
                                            placeholder="Quantité">
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label>Prix de vente</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                        <input type="number" id="add-prix" class="form-control"
                                            placeholder="Prix de vente du produit">
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

            <!-- modal de suppression -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="DeleteUserLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-white">
                            <h5 class="modal-title text-danger" id="addUserLabel">Supprimer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-muted">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est
                                irréversible.</p>
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