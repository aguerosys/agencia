<?php

    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Destino.php';
    $destino = new Destino;
    $chequeo = $destino->modificarDestino();

    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Modificación de un destino</h1>


            <?php 
                $css = 'danger';
                $mensaje = 'No se pudo modificar el destino';

                if ($chequeo){
                    $css = 'success';
                    $mensaje = 'Destino: '. $destino->getDestNombre(). ' modificado correctamente';
                }
            ?>

            <div class="alert alert-<?= $css?> col-6 mx-auto">
                
                <?= $mensaje ?> <br>
                <a href="adminDestinos.php" class="btn btn-outline-secondary">
                    Volver a panel de destinos
                </a>

            </div>

    </main>

<?php
    include 'includes/footer.php';
?>