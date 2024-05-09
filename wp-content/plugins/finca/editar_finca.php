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
                        <h1>EDITAR FINCA</h1>
                </center>
        </div>
        <?php
        $id = $_GET['id'];
        global $wpdb;
        $finca_editar = $wpdb->get_row("SELECT * FROM fincas WHERE id=$id LIMIT 1", ARRAY_A);
        //var_dump($emision_editar);
        if ($finca_editar) {
                ?>
                <div class="row">
                        <div class="col-6">
                                <form class="form-horizontal" id="formulario_fincaedit">
                                        <input type="hidden" value="<?php echo $finca_editar['id'] ?>" id="id">
                                        <div class="form-group row">
                                                <label for="codigo_finca" class="control-label"><strong> Código Finca</strong>
                                                </label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="codigo_finca"
                                                                name="codigo_finca" required
                                                                value="<?php echo $finca_editar['codigo_finca']; ?>" readonly>
                                                </div>

                                        </div>
                                        <div class="form-group row">
                                                <label for="provincia" class="control-label"><strong>Provincia</strong> </label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="provincia" name="provincia"
                                                                required
                                                                value="<?php echo strtoupper($finca_editar['provincia']); ?>"
                                                                readonly>

                                                        <?php
                                                        /*    global $wpdb;
                                                           $tabla_nombre = 'provincias';
                                                        //  echo $finca_editar['provincia'];
                                                           $provincias = $wpdb->get_results("SELECT * FROM $tabla_nombre", ARRAY_A); */
                                                        // var_dump($provincias);
                                                        ?>
                                                        <!--   <div class="col">
                                                      <select class="form-control" name="provincia" id="provincia">
                                                                <option value="" selected disabled></option>
                                                                 <?php
                                                                 /*  var_dump($finca_editar['provincia']);
                                                                  foreach ($provincias as $item) {
                                                                          ?> 
                                                                         <?php if($item['nombre_provincia'] == strtoupper($finca_editar['provincia'])){
                                                                                  echo '<option value="' . $item['nombre_provincia'] . '" selected>' . $item['nombre_provincia'] . '</option>';
                                                                         }else {
                                                                          echo '<option value="' . $item['nombre_provincia'] . '">' . $item['nombre_provincia'] . '</option>';
                                                                          }
                                                                          
                                                                         } */
                                                                 ?>
 

                                                      </select>

                                                </div> -->
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="canton" class="control-label"><strong>Cantón</strong> </label>
                                                <div class="col">
                                                        <input text="text" class="form-control" id="canton" readonly
                                                                name="canton" required
                                                                value="<?php echo $finca_editar['canton']; ?>">
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="parroquia" class="control-label"><strong>Parroquia</strong> </label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="parroquia" name="parroquia"
                                                                required value="<?php echo $finca_editar['parroquia']; ?>"
                                                                readonly>

                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="nombre_propietario" class="control-label"><strong>Nombre del
                                                                propietario</strong> </label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="nombre_propietario"
                                                                name="nombre_propietario" required
                                                                value="<?php echo $finca_editar['nombre_propietario']; ?>">
                                                </div>

                                        </div>
                                        <div class="form form-group row">
                                                <label for="telefono" class="control-label"><strong>Telefono</strong> </label>
                                                <div class="col">
                                                        <input type="number" class="form-control" id="telefono" name="telefono"
                                                                required value="<?php echo $finca_editar['telefono']; ?>">
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="asociacion" class="control-label"><strong>Tipo Asociación</strong>
                                                </label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="asociacion"
                                                                name="asociacion" required
                                                                value="<?php echo $finca_editar['asociacion']; ?>">
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="nombre_predio" class="control-label"> <strong>Nombre de la
                                                                finca</strong> </label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="nombre_predio"
                                                                name="nombre_predio" required
                                                                value="<?php echo $finca_editar['nombre_predio']; ?>">
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="geopoint" class="control-label"><strong> Posición
                                                                Geográfica</strong></label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="geopoint" name="geopoint"
                                                                required value="<?php echo str_replace('.', ',', $finca_editar['geopoint']); ?>"
                                                                readonly>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="geopoint_latitude"
                                                        class="control-label"><strong>Latitud</strong></label>
                                                <div class="col">
                                                        <input type="number" class="form-control" id="geopoint_latitude"
                                                                name="geopoint_latitude" required
                                                                value="<?php echo $finca_editar['geopoint_latitude']; ?>"
                                                                readonly>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="geopoint_longitude"
                                                        class="control-label"><strong>Longitud</strong></label>
                                                <div class="col">
                                                        <input type="number" class="form-control" id="geopoint_longitude"
                                                                name="geopoint_longitude" required
                                                                value="<?php echo $finca_editar['geopoint_longitude']; ?>"
                                                                readonly>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="geopoint_altitude"
                                                        class="control-label"><strong>Altitud</strong></label>
                                                <div class="col">
                                                        <input type="number" class="form-control" id="geopoint_altitude"
                                                                name="geopoint_altitude" required
                                                                value="<?php echo $finca_editar['geopoint_altitude']; ?>"
                                                                readonly>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="geopoint_precision" class="control-label"><strong>Exactitud
                                                                Geográfica</strong></label>
                                                <div class="col">
                                                        <input type="number" class="form-control" id="geopoint_precision"
                                                                name="geopoint_precision" required
                                                                value="<?php echo $finca_editar['geopoint_precision']; ?>"
                                                                readonly>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="info_coordenadaX" class="control-label"><strong>Coordenada en
                                                                X</strong></label>
                                                <div class="col">
                                                        <input type="number" class="form-control" id="info_coordenadaX"
                                                                name="info_coordenadaX" required
                                                                value="<?php echo $finca_editar['info_coordenadaX']; ?>"
                                                                readonly>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="info_coordenadaY" class="control-label"><strong>Coordenada
                                                                Y</strong></label>
                                                <div class="col">
                                                        <input type="number" class="form-control" id="info_coordenadaY"
                                                                name="info_coordenadaY" required
                                                                value="<?php echo $finca_editar['info_coordenadaY']; ?>"
                                                                readonly>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="info_altitud" class="control-label"><strong>Datos de
                                                                Elevación</strong></label>
                                                <div class="col">
                                                        <input type="number" class="form-control" id="info_altitud"
                                                                name="info_altitud" required
                                                                value="<?php echo $finca_editar['info_altitud']; ?>" readonly>
                                                </div>
                                        </div>


                                        <div class="form-group row mt-3">
                                                <button class="btn actualizar_tooltip d-grid gap-2 col-3 mx-aut" type="button" id="actualizar"
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

                        </div>

                </div>
                <div class="row">
                        <div class="col-6">
                                <form action="form-horizontal">
                                        <div class="form-group row mt-3 ">
                                                <a class="btn regresar_tooltip d-grid gap-2 col-3 mx-aut"
                                                        href="http://localhost/esteveza/gestionar-fincas/" role="button"
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

        }
        ?>



</body>

</html>