
        <!-- End Page Content -->
        
        <!-- Footer -->
             <footer class="footer text-center text-sm-start d-print-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0 rounded-bottom-0">
                                <div class="card-body">
                                    <p class="text-muted mb-0">
                                        © <?php echo date('Y'); ?> © <?php echo APP_NAME; ?> v<?php echo APP_VERSION; ?>
                                        <span class="text-muted d-none d-sm-inline-block float-end">
                                            Développé avec
                                            <i class="iconoir-heart-solid text-danger align-middle"></i>
                                            par Plc lab</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
    </div>
    </div>
    <!-- End Page Wrapper -->
    
    <!-- JavaScript Libraries -->
    <script src="<?= LIBS_URL ?>bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="<?= LIBS_URL ?>simplebar/simplebar.min.js"></script>
    <script src="<?= JS_URL ?>app.js"></script>
    
    <!-- Scripts spécifiques aux pages -->
    <?php
    // Charger automatiquement les scripts spécifiques à la page
    $current_script = basename($_SERVER['PHP_SELF']);
    $script_path = JS_URL . 'pages/' . str_replace('.php', '.js', $current_script);
    if (file_exists(ASSETS_PATH . 'js/pages/' . str_replace('.php', '.js', $current_script))) {
        echo '<script src="' . $script_path . '"></script>';
    }
    ?>
</body>
</html>