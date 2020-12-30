<?php
    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Region.php';
    $region = new Region;
    $region->verRegionPorID();
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Baja de una región</h1>

        <div class="alert bg-light border-danger text-danger shadow-sm col-5 mx-auto p-4">
            Se eliminará la región <span class="lead"><?= $region->getRegNombre(); ?></span>
            <form action="eliminarRegion.php" method="post">
                <input type="hidden" name="regID"
                       value="<?= $region->getRegID() ?>">
                <input type="hidden" name="regNombre"
                       value="<?= $region->getRegNombre() ?>">
                <button class="btn btn-danger btn-block my-3">Confirmar baja</button>
                <a href="adminRegiones.php" class="btn btn-outline-secondary btn-block my-2">
                    volver a panel
                </a>
            </form>
        </div>

        <script>
            Swal.fire(
                'Advertencia',
                'Si confirma la baja, se eliminará la región seleccionada',
                'warning'
            )
        </script>

    </main>

<?php
    include 'includes/footer.php';
?>