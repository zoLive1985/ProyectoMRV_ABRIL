<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="UTF-8">
        <title>formulario</title>
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
                        <h1>CREAR FINCA</h1>
                </center>
        </div>
        <div class="row">
                <div class="col-6">
                        <form class="form-horizontal" id="formulario_finca">

                                <div class="form-group row">
                                        <label for="codigo_finca" class="control-label"><strong>Código Finca</strong>
                                        </label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="codigo_finca"
                                                        name="codigo_finca" required>
                                        </div>

                                </div>
                                <div class="form-group row">
                                        <label for="provincia" class="control-label"><strong>Provincia</strong> </label>
                                        <div class="col">
                                                <?php
                                                global $wpdb;
                                                $tabla_nombre = 'provincias';
                                                $provincias = $wpdb->get_results("SELECT * FROM $tabla_nombre", ARRAY_A);
                                                ?>
                                                <div class="col">
                                                        <select class="form-control" name="provincia" id="provincia">
                                                                <option value="null" selected disabled></option>
                                                                <?php
                                                                foreach ($provincias as $item) {
                                                                        ?>
                                                                        <option
                                                                                value="<?php echo ($item['nombre_provincia']) ?>">
                                                                                <?php echo $item['nombre_provincia'] ?>
                                                                        </option>
                                                                <?php } ?>

                                                        </select>
                                                </div>
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="canton" class="control-label"><strong>Cantón</strong> </label>
                                        <div class="col">
                                                <input text="text" class="form-control" id="canton" name="canton"
                                                        required>
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="parroquia" class="control-label"><strong>Parroquia</strong> </label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="parroquia" name="parroquia"
                                                        required>

                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="nombre_propietario" class="control-label"><strong>Nombre
                                                        Propietario</strong></label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="nombre_propietario"
                                                        name="nombre_propietario" required>
                                        </div>

                                </div>
                                <div class="form form-group row">
                                        <label for="telefono" class="control-label"><strong>Telefono</strong></label>
                                        <div class="col">
                                                <input type="number" class="form-control" id="telefono" name="telefono"
                                                        required>
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="asociacion" class="control-label"><strong>Tipo
                                                        Asociacion</strong></label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="asociacion"
                                                        name="asociacion" required>
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="nombre_predio" class="control-label"><strong>Nombre de la finca</strong></label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="nombre_predio"
                                                        name="nombre_predio" required>
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="geopoint" class="control-label"><strong>Posición
                                                        Geográfica</strong></label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="geopoint" name="geopoint"
                                                        required value="0">
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="geopoint_latitude"
                                                class="control-label"><strong>Latitud</strong></label>
                                        <div class="col">
                                                <input type="number" class="form-control" id="geopoint_latitude"
                                                        name="geopoint_latitude" required value="0">
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="geopoint_longitude"
                                                class="control-label"><strong>Longitud</strong></label>
                                        <div class="col">
                                                <input type="number" class="form-control" id="geopoint_longitude"
                                                        name="geopoint_longitude" required value="0">
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="geopoint_altitude"
                                                class="control-label"><strong>Altitud</strong></label>
                                        <div class="col">
                                                <input type="number" class="form-control" id="geopoint_altitude"
                                                        name="geopoint_altitude" required value="0">
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="geopoint_precision" class="control-label"><strong>Exactitud
                                                        Geográfica</strong></label>
                                        <div class="col">
                                                <input type="number" class="form-control" id="geopoint_precision"
                                                        name="geopoint_precision" required value="0">
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="info_coordenadaX" class="control-label"><strong>Coordenada en
                                                        X</strong></label>
                                        <div class="col">
                                                <input type="number" class="form-control" id="info_coordenadaX"
                                                        name="info_coordenadaX" required value="0">
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="info_coordenadaY" class="control-label"><strong>Coordenada en
                                                        Y</strong></label>
                                        <div class="col">
                                                <input type="number" class="form-control" id="info_coordenadaY"
                                                        name="info_coordenadaY" required value="0">
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="info_altitud" class="control-label"><strong>Datos de
                                                        Elevación</strong></label>
                                        <div class="col">
                                                <input type="number" class="form-control" id="info_altitud"
                                                        name="info_altitud" required value="0">
                                        </div>
                                </div>


                                <div class="form-group row mt-3">
                                        <button class="btn d-grid gap-2 col-3 mx-aut" type="button" id="guardar"
                                                name="submit"><svg xmlns="http://www.w3.org/2000/svg" width="42"
                                                        height="42" fill="#C39BD3 " class="bi bi-floppy-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                                d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z" />
                                                        <path
                                                                d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z" />
                                                </svg></button>
                                </div>

                        </form>

                        <div class="form-group row mt-3">
                                <div class="col">
                                        <h5><strong>Cargar Archivo</strong></h5>
                                        <input type="file" id="csv-file" accept=".csv">
                                        <button class="btn" id="cargar" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                                        fill="#5DADE2" class="bi bi-filetype-csv" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                                d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM3.517 14.841a1.13 1.13 0 0 0 .401.823q.195.162.478.252.284.091.665.091.507 0 .859-.158.354-.158.539-.44.187-.284.187-.656 0-.336-.134-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.566-.21l-.621-.144a1 1 0 0 1-.404-.176.37.37 0 0 1-.144-.299q0-.234.185-.384.188-.152.512-.152.214 0 .37.068a.6.6 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.2-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.439 0-.776.15-.337.149-.527.421-.19.273-.19.639 0 .302.122.524.124.223.352.367.228.143.539.213l.618.144q.31.073.463.193a.39.39 0 0 1 .152.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.167.07-.413.07-.175 0-.32-.04a.8.8 0 0 1-.248-.115.58.58 0 0 1-.255-.384zM.806 13.693q0-.373.102-.633a.87.87 0 0 1 .302-.399.8.8 0 0 1 .475-.137q.225 0 .398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.4 1.4 0 0 0-.489-.272 1.8 1.8 0 0 0-.606-.097q-.534 0-.911.223-.375.222-.572.632-.195.41-.196.979v.498q0 .568.193.976.197.407.572.626.375.217.914.217.439 0 .785-.164t.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.8.8 0 0 1-.118.363.7.7 0 0 1-.272.25.9.9 0 0 1-.401.087.85.85 0 0 1-.478-.132.83.83 0 0 1-.299-.392 1.7 1.7 0 0 1-.102-.627zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879z" />
                                                </svg>
                                        </button>
                                </div>
                        </div>
                </div>

        </div>
        <div class="row">
                <div class="col-6">
                        <form action="form-horizontal">
                                <div class="form-group row mt-3 ">
                                        <a class="btn d-grid gap-2 col-3 mx-aut"
                                                href=" http://localhost/esteveza/gestionar-fincas/" role="button"
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


        ?>


</body>

</html>