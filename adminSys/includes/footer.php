            <footer class="footer text-center text-sm-start d-print-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0 rounded-bottom-0">
                                <div class="card-body">
                                    <p class="text-muted mb-0">
                                        ©
                                        <script> document.write(new Date().getFullYear()) </script>
                                        E-Kigega
                                        <span
                                            class="text-muted d-none d-sm-inline-block float-end">
                                            créé par
                                          
                                            Plc Lab</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->

    <script src="<?= LIBS_URL ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= LIBS_URL ?>simplebar/simplebar.min.js"></script>
    <script src="<?= JS_URL ?>/app.js"></script>

        <?php 
        // Chargement des librairies spécifiques à la page
    if (isset($pageLibs) && is_array($pageLibs)) {
        foreach ($pageLibs as $libUrl) {
            echo '<script src="' . $libUrl . '"></script>';
        }
    }
    ?>
</body>
<!--end body-->

</html>