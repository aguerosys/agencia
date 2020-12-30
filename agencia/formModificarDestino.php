<?php

    require 'config/config.php';
    require 'clases/Destino.php';
    require 'clases/Region.php';
    require 'clases/Conexion.php';

    $destino = new Destino;
    $destino->verDestinoPorID();

    $region = new Region;
    $regiones = $region->listarRegiones();

    include 'includes/over-all-header.html';
    include 'includes/nav.php';

?>
    
    <main class="container">
            <h1>Modificar un destino</h1>

            <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

                <form action="modificarDestino.php" method="post">

                    <div class="form-group">
                    <label for="destNombre">Nombre del Destino:</label>
                    <input type="hidden" name="destID" value="<?= $destino->getDestID(); ?>">
                    <input type="text" name="destNombre" 
                           id="destNombre" class="form-control" value="<?= $destino->getDestNombre(); ?>"
                           required>
                    </div>

                    
                    <div class="form-group">
                    <label for="regID">Región</label> 
                    <select name="regID" id="regID" 
                        class="form-control" required>
                        <option value="<?= $destino->getRegID(); ?>"><?= $destino::getRegNombre(); ?></option>
                        <?php 
                            foreach ($regiones as $region){
                        ?>    
                        <option value="<?= $region['regID'];?>"><?= $region['regNombre'];?></option>
                        <?php
                            }
                        ?>
                    </select>

                    
                    </div>
                    

                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="number" name="destPrecio"
                                   class="form-control" placeholder="Ingrese el precio" value="<?= $destino->getDestPrecio(); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">#</div>
                            </div>
                            <input type="number" name="destAsientos"
                                   class="form-control" placeholder="Ingrese cantidad de Asientos Totales" value="<?= $destino->getDestAsientos(); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">#</div>
                            </div>
                            <input type="number" name="destDisponibles"
                                   class="form-control" placeholder="Ingrese cantidad de Asientos Disponibles" value="<?= $destino->getDestDisponibles(); ?>" required>
                        </div>
                    </div>


                    <button class="btn btn-dark mr-3">Modificar destino</button>
                    <a href="adminDestinos.php" class="btn btn-outline-secondary">
                        Volver a panel de destinos
                    </a>

                </form>

            </div>


    </main>
<?php
    include 'includes/footer.php';
?>