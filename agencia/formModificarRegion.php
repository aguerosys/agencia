<?php
    require 'clases/Conexion.php';
    require 'clases/Region.php';
    require 'config/config.php';
    include 'includes/over-all-header.html';
    include 'includes/nav.php';

    $region = new Region;
    $region->verRegionPorID();

?>
    
    <main class="container">
            <h1>Modificar región</h1>

            <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

                <form action="modificarRegion.php" method="post">

                    <div class="form-group">
                    <label for="regNombre">Nombre de la región:</label>
                    <input type="text" name="regNombre" 
                           id="regNombre" class="form-control" value="<?= $region->getRegNombre();?>">
                    <input type="hidden" name="regID" value="<?= $region->getRegID(); ?>">
                    </div>

                    <button class="btn btn-dark">Modificar región</button>
                    <a href="adminRegiones.php" class="btn btn-outline-secondary">
                        Volver a panel de regiones
                    </a>
                </form>

            </div>


    </main>
<?php
    include 'includes/footer.php';
?>