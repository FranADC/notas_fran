<div class="row">
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['ej01_div_titulo']; ?></h6>                                    
            </div>
            <div class="card-body">
                <?php
                echo $data['ej01_textoresultado'];
                ?>
            </div>
        </div>
    </div> 
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['ej02_div_titulo']; ?></h6>                                    
            </div>
            <div class="card-body">
                <?php
                echo $data['ej02_textoresultado'];
                ?>
            </div>
        </div>
    </div> 
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['ej03_div_titulo']; ?></h6>                                    
            </div>
            <div class="card-body">
                <?php
                echo $data['ej03_textoresultado'];
                ?>
            </div>
        </div>
    </div> 
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['ej04_div_titulo']; ?></h6>                                    
            </div>
            <div class="card-body">
                <p class="<?php echo $data['ej04_p_class'] ?>"><?php echo $data['ej04_textoresultado']; ?></p>
            </div>
        </div>
    </div> 
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['ej06_div_titulo']; ?></h6>                                    
            </div>
            <div class="card-body">
                <?php
                if($data['ej06_neto'] > 2000){
                ?>
                <div class="alert alert-success">
                    <strong>Felicidades!</strong> cobras más que la media.
                </div>
                <?php
                }
                ?>
                <?php
                echo $data['ej06_textoresultado'];
                ?>
            </div>
        </div>
    </div> 
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['ej07_div_titulo']; ?></h6>                                    
            </div>
            <div class="card-body">                
                <div class="alert alert-<?php echo $data['ej07_alert_color']; ?>">
                    Tu nota es: <strong><?php echo ucfirst($data['ej07_nota_texto']); ?></strong>
                </div>                
                <?php echo ucfirst($data['ej07_nota_texto']); ?>
            </div>
        </div>
    </div> 
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['ej08_div_titulo']; ?></h6>                                    
            </div>
            <div class="card-body">                                
                <p>Ha seleccionado <?php echo $data['ej08_entrada']; ?> que es de la categoría: <?php echo $data['ej08_salida']; ?></p>
            </div>
        </div>
    </div> 
</div>
