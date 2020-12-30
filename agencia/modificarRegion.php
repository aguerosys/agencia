<?php

    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Region.php';
    $region = new Region;
    $chequeo = $region->modificarRegion();

    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Modificación de una región</h1>


            <?php 
                $css = 'danger';
                $mensaje = 'No se pudo modificar la región';

                if ($chequeo){
                    $css = 'success';
                    $mensaje = 'Región: '. $region->getRegNombre(). ' modificada correctamente';
                }
            ?>

            <div class="alert alert-<?= $css?> col-6 mx-auto">
                
                <?= $mensaje ?> <br>
                <a href="adminRegiones.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>

            </div>

    </main>

<?php
    include 'includes/footer.php';
?>