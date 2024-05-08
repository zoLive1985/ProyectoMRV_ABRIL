<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ver Finca</title>
    <!--link rel="stylesheet" href="./estilo.css"-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--leasef-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- estilo mapa -->
    <!--  <link rel="stylesheet" href="./mapa.css"> -->
</head>

<body class="container-fluid mt-3">

    <div class="row">
        <div class="col-6">
            <form action="form-horizontal">
                <div class="form-group row mt-3 ">
                    <a class="btn d-grid gap-2 col-3 mx-aut"
                        href="http://localhost/esteveza/gestionar-fincas/" role="button" id="regresar"><svg
                            xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="gray"
                            class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
                        </svg></a>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <center>
                <h1>FINCA MITIGACIÓN</h1>
            </center>
        </div>
    </div>
    <?php
    $id = $_GET['id'];
    global $wpdb;
    $finca = $wpdb->get_row("SELECT * FROM fincas WHERE id=$id LIMIT 1", ARRAY_A);
    if ($finca) {
        // print_r($finca);
        ?>
        <div class="row">
            <div class="col fila1">
                <label for=""><strong>Código finca</strong></label>
                <p>
                    <?php echo $finca['codigo_finca'] ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Provincia</strong></label>
                <p>
                    <?php echo $finca['provincia'] ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Cantón</strong></label>
                <p>
                    <?php echo $finca['canton'] ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Parroquia</strong></label>
                <p>
                    <?php echo $finca['parroquia'] ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col fila2">
                <label for=""><strong>Nombre del Propietario</strong></label>
                <p>
                    <?php echo $finca['nombre_propietario'] ?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>Teléfono</strong></label>
                <p>
                    <?php echo $finca['telefono'] ?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>Tipo Asociación</strong></label>
                <p>
                    <?php echo $finca['asociacion'] ?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>Nombre de la finca</strong></label>
                <input type="hidden" name="nombre_predio" id="nombre_predio" value="<?php echo $finca['nombre_predio'] ?>">
                <p>
                    <?php echo ($finca['nombre_predio']) ?>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col fila1">
                <label for=""><strong>Posición Geográfica</strong></label>
                <p>
                    <?php echo str_replace('.', ',',$finca['geopoint']) ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Latitud</strong></label>
                <input type="hidden" name="latitud" id="latitud" value="<?php echo $finca['geopoint_latitude'] ?>">
                <p>
                    <?php echo number_format($finca['geopoint_latitude'], 10, ',', '.') ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Longitud</strong></label>
                <input type="hidden" name="longitud" id="longitud" value="<?php echo $finca['geopoint_longitude'] ?>">
                <p>
                    <?php echo number_format($finca['geopoint_longitude'], 10, ',', '') ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Altitud</strong></label>
                <p>
                    <?php echo number_format($finca['geopoint_altitude'], 10, ',', '') ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col fila2">
                <label for=""><strong>Exactitud Geográfica</strong></label>
                <p>
                    <?php echo number_format($finca['geopoint_precision'], 10, ',', '') ?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>Coordenada en X</strong></label>
                <p>
                    <?php echo (number_format($finca['info_coordenadaX'], 10, ',', '')) ?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>Coordenada en Y</strong></label>
                <p>
                    <?php echo (number_format($finca['info_coordenadaY'],10,',',''))?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>Datos de Elevación</strong></label>
                <p>
                    <?php echo (number_format($finca['info_altitud'],10,',','')) ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col fila1">
                <label for=""><strong>Fecha de Registro</strong></label>
                <p>
                    <?php echo $finca['fecha_registro'] ?>
                </p>
            </div>
        </div>

        <div class="row">

            <div class="col" id="mapa" name="mapa">
                <h1>Mapa con la ubicación de la Finca</h1>
            </div>

        </div>
        <?php
    }
    ?>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</body>

</html>