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
            <h4 class="page-title">Log de connexion</h4>
            <div class="">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">E-Kigega</a></li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li><!--end nav-item-->
                <li class="breadcrumb-item active">Log de connexion</li>
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
                </div><!--end col-->
              </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
              <div class="table-responsive">
                <table class="table" id="datatable_1">
                  <thead class="table-light">
                    <tr>
                      <th>Entreprise</th>
                      <th>Utilisateur</th>
                      <th>Action</th>
                      <th>Details</th>
                      <th>Adresse IP</th>
                      <th>Date</th>

                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>PLC Lab</td>
                      <td>Audry Wakanda</td>
                      <td>fire</td>
                      <td>Alminium</td>
                      <td> 192.168.1.1</td>
                      <td>2024-06-01</td>

                    </tr>

                  </tbody>
                </table>

              </div>

            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->

      </div>
      <!--Start Footer-->

    </div>


    <?php
    $pageLibs = [
      LIBS_URL . "simple-datatables/umd/simple-datatables.js",
      JS_URL . "pages/datatables.init.js"
    ];
    include "./../../../includes/footer.php";
    ?>