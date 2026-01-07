
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
                                            <i class="iconoir-heart-solid  align-middle " style="color: #f86767ff;"></i>
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
    
    <!-- Scripts globaux -->
    <script src="<?= LIBS_URL ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= LIBS_URL ?>simplebar/simplebar.min.js"></script>
    <script src="<?= JS_URL ?>app.js"></script>

    <?php
    // Auto-chargement du script spécifique à la page
    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
    $pageScriptFile = ASSETS_PATH . "js/pages/{$currentPage}.js";
    $pageScriptUrl  = JS_URL . "pages/{$currentPage}.js";

    if (file_exists($pageScriptFile)) {
        echo '<script src="' . $pageScriptUrl . '"></script>';
    }

    // Chargement des librairies spécifiques à la page
    if (isset($pageLibs) && is_array($pageLibs)) {
        foreach ($pageLibs as $libUrl) {
            echo '<script src="' . $libUrl . '"></script>';
        }
    }
    ?>

</body>
</html>