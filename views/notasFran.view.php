<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Notas Fran</h1>

</div>
<!-- Content Row -->

<div class="row">
    <?php
    if (isset($data["resultado"])) {
        ?>
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabla de resultados</h6>
                </div>
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Módulo</th>
                                <th>Media</th>
                                <th>Aprobados</th>
                                <th>suspensas</th>
                                <th>Máximo</th>
                                <th>Mínimo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data["resultado"]["datos"] as $asignatura => $datos) { ?>
                                <tr>
                                    <td><?php echo $asignatura; ?></td>
                                    <td><?php echo $datos["media"]; ?></td>
                                    <td><?php echo $datos["aprobadosTotales"]; ?></td>
                                    <td><?php echo $datos["suspensosTotales"]; ?></td>
                                    <td><?php echo $datos["maxima"]["nombre"] . ": " . $datos["maxima"]["nota"]; ?></td>
                                    <td><?php echo $datos["minima"]["nombre"] . ": " . $datos["minima"]["nota"]; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="alert alert-success">
                <ul>
                    <?php
                    foreach ($data["resultado"]["cualificaciones"] as $nombre => $cualificaciones) {
                        if ($cualificaciones["suspensas"] == 0) {
                            echo "<li>$nombre</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="alert alert-warning">
                <ul>
                    <?php
                    foreach ($data["resultado"]["cualificaciones"] as $nombre => $cualificaciones) {
                        if ($cualificaciones["suspensas"] >= 1) {
                            echo "<li>$nombre</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="alert alert-primary">
                <ul>
                    <?php
                    foreach ($data["resultado"]["cualificaciones"] as $nombre => $cualificaciones) {
                        if ($cualificaciones["suspensas"] <= 1) {
                            echo "<li>$nombre</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="alert alert-danger">
                <ul>
                    <?php
                    foreach ($data["resultado"]["cualificaciones"] as $nombre => $cualificaciones) {
                        if ($cualificaciones["suspensas"] >= 2) {
                            echo "<li>$nombre</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
    }
    ?>
    <!-- comment -->
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Array de notas</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="./?sec=notasFran">
                    <!--<input type="hidden" name="sec" value="iterativas01" />-->
                    <div class="mb-3">
                        <label for="texto">Json Notas:</label>
                        <textarea class="form-control" id="json_notas" name="json_notas" rows="10"><?php echo isset($data['input']['json_notas']) ? $data['input']['json_notas'] : ''; ?></textarea>
                        <p class="text-danger small"><?php echo isset($data['errores']["json_notas"]) ? $data['errores']["json_notas"] : ''; ?></p>
                    </div>                    
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>

