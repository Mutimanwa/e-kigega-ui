<?php 
include "../../../includes/header.php";
include "../../../includes/sidebar.php";
?>

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                            <h4 class="page-title">Utilisateurs</h4>
                            <div class="">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">E-kigega</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item active">Utilisateurs</li>
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
                                        <h4 class="card-title">Détails Utilisateurs</h4>                      
                                    </div><!--end col-->
                                    <div class="col-auto"> 
                                        <button class="btn bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#addUser"><i class="fas fa-plus me-1"></i> Add User</button> 
                                    </div><!--end col-->
                                </div><!--end row-->                                  
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table mb-0" id="datatable_2">
                                        <thead class="table-light table-hover">
                                          <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>N° Téléphone</th>
                                            <th>Date d'inscription</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= IMAGES_URL ?>users/avatar-1.jpg" class="me-2 thumb-md align-self-center rounded" alt="...">
                                                        <div class="flex-grow-1 text-truncate"> 
                                                            <h6 class="m-0">Unity Pugh</h6>
                                                            <p class="fs-12 text-muted mb-0">USA</p>                                                                                           
                                                        </div><!--end media body-->
                                                    </div>
                                                </td>
                                                <td><a href="#" class="text-primary text-decoration-underline">dummy@gmail.com</a></td>
                                                <td>+1 234 567 890</td>
                                                <td>22 August 2024</td>
                                                <td><span class="badge rounded text-success bg-success-subtle">Active</span></td>
                                                <td class="text-end">                                                       
                                                    <a href="#" data-bs-target="modal" data-bs-toggle="#EditUser"><i class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                </td>
                                            </tr>
                                            
                                                                                                             
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div><!-- container -->

<?php 
 $pageLibs = [
    LIBS_URL . "simple-datatables/umd/simple-datatables.js",
    JS_URL . "pages/datatables.init.js"
];
include "../../../includes/footer.php"; ?>
<!-- moddal d'ajout et modification -->
  <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addUserLabel">Add User Detail</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-2">
                    <div class="d-flex align-items-center">
                         <i class="fas fa-user text-muted thumb-xl rounded me-2 border-dashed"></i>
                        <div class="flex-grow-1 text-truncate"> 
                            <label class="btn btn-primary text-light">
                                Add Avatar <input type="file" hidden="">
                            </label>                                                                                          
                        </div><!--end media body-->
                    </div>                    
                </div>
                <div class=" mb-2">
                    <label for="fullName">Full Name</label> 
                    <div class="input-group">                                                            
                        <span class="input-group-text" id="fullName"><i class="far fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="FullName">
                    </div>
                </div>
                <div class=" mb-2">
                    <label for="email">Email</label> 
                    <div class="input-group">                                                            
                        <span class="input-group-text" id="email"><i class="far fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Email address" aria-label="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="ragisterDate">Register Date</label> 
                            <div class="input-group">
                                <span class="input-group-text" id="ragisterDate"><i class="far fa-calendar"></i></span>
                                <input type="text" class="form-control" placeholder="00/2024" aria-label="ragisterDate">
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="mobilleNo">Mobille No</label> 
                            <div class="input-group">
                                <span class="input-group-text" id="mobilleNo"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" placeholder="+1 234 567 890" aria-label="mobilleNo">
                            </div>
                        </div>                                                            
                    </div><!--end col-->
                </div><!--end row-->                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary w-100">Add User</button>
            </div>
          </div>
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
              <button type="button" class="btn btn-secondary">Annuler</button>
            </div>
          </div>
        </div>
  </div>