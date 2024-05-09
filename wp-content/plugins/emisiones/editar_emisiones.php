<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="UTF-8">
        <title>formulario</title>
        <!--  enlace Pooper -->
        <script src="https://cdn.jsdelivr.net/npm/@floating-ui/core@1.6.1"></script>
        <script src="https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.5"></script>
        <!--link rel="stylesheet" href="./estilo.css"-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
                var ApiUrl = <?php echo json_encode(get_site_url()); ?>;
                console.log(ApiUrl);
        </script>
</head>

<body>
        <div class="row">
                <center>
                        <h1>EDITAR EMISIÓN</h1>
                </center>
        </div>
        <?php
        $id = $_GET['id'];
        global $wpdb;
        $emision_editar = $wpdb->get_row("SELECT * FROM emisiones WHERE id=$id LIMIT 1", ARRAY_A);
        //var_dump($emision_editar);
        if ($emision_editar) {
                ?>
                <div class="row">
                        <div class="col-6">
                                <form class="form-horizontal" id="formulario_edit">
                                        <div class="form-group row">
                                                <label for="iniciativa" class="control-label"> <strong> Nombre de la
                                                                Iniciativa</strong></label>
                                                <div class="col">
                                                        <input style="width: 455px;" style="width: 460px;" type="text"
                                                                class="form-control" id="nombre_iniciativa"
                                                                name="nombre_iniciativa" required
                                                                value=" <?php echo htmlspecialchars($emision_editar['nombre_iniciativa']); ?>"
                                                                disabled>
                                                </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $emision_editar['id_iniciativa'] ?>">
                                        <input type="hidden" value="<?php echo $emision_editar['id']; ?>" id="id">
                                        <div class="form-group row">
                                                <label for="anio" class="control-label"> <strong>Año</strong></label>
                                                <div class="col">
                                                        <input readonly type="text" class="form-control" id="anio" name="anio"
                                                                required value="<?php echo $emision_editar['anio']; ?>"
                                                                style="width: 455px;">
                                                </div>

                                        </div>
                                        <div class="form-group row">
                                                <label for="provincia" class="control-label"><strong>Provincia</strong> </label>
                                                <div class="col">
                                                        <input readonly type="text" class="form-control" id="provincia"
                                                                name="provincia" required
                                                                value="<?php echo strtoupper($emision_editar['provincia']); ?>"
                                                                style="width: 455px;">
                                                        <!--  <?php
                                                        /*  global $wpdb;
                                                         $tabla_nombre = 'provincias';
                                                         $provincias = $wpdb->get_results("SELECT * FROM $tabla_nombre", ARRAY_A); */
                                                        ?>
                                                <div class="col">
                                                      <select class="form-control" name="provincia" id="provincia" >
                                                                <option value="" selected disabled></option>
                                                                <?php
                                                                /*  foreach ($provincias as $item) {
                                                                         ?> 
                                                                        <?php if($item['nombre_provincia'] == strtoupper($emision_editar['provincia'])){
                                                                                 echo '<option value="' . $item['nombre_provincia'] . '" selected>' . $item['nombre_provincia'] . '</option>';
                                                                        }else {
                                                                         echo '<option value="' . $item['nombre_provincia'] . '">' . $item['nombre_provincia'] . '</option>';
                                                                         }
                                                                         
                                                                        } */
                                                                ?>


                                                      </select>          
                                                </div>  -->
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="finca" class="control-label"> <strong>Finca</strong> </label>
                                                <div class="col">
                                                        <input readonly text="text" class="form-control" id="finca" name="finca"
                                                                required value="<?php echo $emision_editar['finca']; ?>"
                                                                style="width: 455px;">
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="producto" class="control-label"><strong> Producto</strong></label>
                                                <div class="col">
                                                        <input readonly type="text" class="form-control" id="producto"
                                                                name="producto" required
                                                                value="<?php echo $emision_editar['producto']; ?>"
                                                                style="width: 455px;">


                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="metano_enterica" class="control-label"><strong>Metano Fermentación
                                                                Enterica</strong> </label>
                                                <div class="col">
                                                        <div class="input-group" style="width: 520px;">
                                                                <input type="number" class="form-control" id="metano_enterica"
                                                                        name="metano_enterica" required
                                                                        value="<?php echo $emision_editar['metano_enterica']; ?>">
                                                                <span class="unidades" style="margin-left: 5px; "><strong>t
                                                                                CO2eq</strong>
                                                                </span>
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="form form-group row">
                                                <label for="metano_excretas" class="control-label"> <strong> Metano Manejo
                                                                Excretas </strong></label>
                                                <div class="col">
                                                        <div class="input-group" style="width: 520px;">
                                                                <input type="number" class="form-control" id="metano_excretas"
                                                                        name="metano_excretas" required
                                                                        value="<?php echo $emision_editar['metano_excretas']; ?>">
                                                                <span class="unidades" style="margin-left: 5px; "><strong>t
                                                                                CO2eq</strong>
                                                                </span>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="N20_excretas" class="control-label"> <strong>N2O Manejo
                                                                Excretas</strong> </label>
                                                <div class="col">
                                                        <div class="input-group" style="width: 520px;">
                                                                <input type="number" class="form-control" id="N20_excretas"
                                                                        name="N20_excretas" required
                                                                        value="<?php echo $emision_editar['N2O_excretas']; ?>">
                                                                <span class="unidades" style="margin-left: 5px; "><strong>t
                                                                                CO2eq</strong>
                                                                </span>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="N20_pasturas" class="control-label"><strong>N2O Excretas en
                                                                Pasturas</strong></label>
                                                <div class="col">
                                                        <div class="input-group" style="width: 520px;">
                                                                <input type="number" class="form-control" id="N20_pasturas"
                                                                        name="N20_pasturas" required
                                                                        value="<?php echo $emision_editar['N2O_pasturas']; ?>">
                                                                <span class="unidades" style="margin-left: 5px; "><strong>t
                                                                                CO2eq</strong>
                                                                </span>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="total_emisiones" class="control-label"><strong>Total
                                                                Emisiones</strong> </label>
                                                <div class="col">
                                                        <div class="input-group" style="width: 520px;">
                                                                <input type="number" class="form-control" id="total_emisiones"
                                                                        name="total_emisiones" required readonly
                                                                        value="<?php echo $emision_editar['total_emisiones']; ?>">
                                                                <span class="unidades" style="margin-left: 5px; "><strong>t
                                                                                CO2eq</strong>
                                                                </span>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="leche" class="control-label"><strong>Leche</strong></label>
                                                <div class="col">
                                                        <div class="input-group" style="width: 500px;">
                                                                <input type="number" class="form-control" id="leche"
                                                                        name="leche" required
                                                                        value="<?php echo $emision_editar['leche']; ?>">
                                                                <span class="unidades"
                                                                        style="margin-left: 5px; "><strong>l/año</strong>
                                                                </span>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="carne" class="control-label"><strong>Carne</strong></label>
                                                <div class="col">
                                                        <div class="input-group" style="width: 550px;">
                                                                <input type="number" class="form-control" id="carne"
                                                                        name="carne" required
                                                                        value="<?php echo $emision_editar['carne']; ?>">
                                                                <span class="unidades" style="margin-left: 5px; "><strong>kg
                                                                                canal/año</strong>
                                                                </span>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="IE_leche" class="control-label"><strong>Intensidad de la
                                                                leche</strong> </label>
                                                <div class="col">
                                                        <div class="input-group" style="width: 540px;">
                                                                <input type="number" class="form-control" id="IE_leche"
                                                                        name="IE_leche" required
                                                                        value="<?php echo $emision_editar['IE_leche']; ?>">
                                                                <span class="unidades" style="margin-left: 5px; "><strong>kg
                                                                                CO2eq/l</strong>
                                                                </span>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="IE_carne" class="control-label"><strong>Intensidad de la
                                                                Carne</strong></label>
                                                <div class="col">
                                                        <div class="input-group" style="width: 595px;">
                                                                <input type="number" class="form-control" id="IE_carne"
                                                                        name="IE_carne" required
                                                                        value="<?php echo $emision_editar['IE_carne']; ?>">
                                                                <span class="unidades" style="margin-left: 5px; "><strong>kg
                                                                                CO2eq/kg canal</strong>
                                                                </span>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                                <button class="btn d-grid gap-2 col-3 mx-aut actualiza_tooltip" type="button" id="actualizar"
                                                        name="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                                                fill="#5DADE2" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                                <path
                                                                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                                                                <path fill-rule="evenodd"
                                                                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                                                        </svg>
                                                </button>
                                        </div>

                                </form>

                                <!-- <div class="form-group row mt-3">
                                <div class="col">
                                        <h5>Cargar Archivo</h5>
                                        <input type="file" id="csv-file" accept=".csv">
                                        <button class="btn btn-primary" id="cargar" type="submit"> Cargar CSV</button>
                                </div>
                        </div> -->
                        </div>

                </div>
                <div class="row">
                        <div class="col-6">
                                <form action="form-horizontal">
                                        <div class="form-group row mt-3 ">
                                                <a class="btn regresar_tooltip d-grid gap-2 col-3 mx-aut"
                                                        href="http://localhost/esteveza/gestionar_emisiones/" role="button"
                                                        id="regresar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                                                fill="gray" class="bi bi-arrow-left-square-fill"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                        d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
                                                        </svg>
                                                </a>
                                        </div>
                                </form>
                        </div>
                </div>
                <div class="row">

                </div>

                <?php
                $ruta_archivo = plugin_dir_path(__FILE__) . 'funcionalidad_emisiones.php';
                /*   if (file_exists($ruta_archivo)) {
                          include $ruta_archivo;
                  } */

        }
        ?>


</body>

</html>