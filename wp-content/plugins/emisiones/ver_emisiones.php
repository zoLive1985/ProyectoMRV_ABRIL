<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ver Emisiones</title>
    <!--link rel="stylesheet" href="./estilo.css"-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .fila1 {
            background-color: #EBF5FB;
            margin-left: 10px;
        }

        .fila2 {
            background-color: #F4ECF7;
            margin-top: 10px;
            margin-left: 10px;
        }

        .fila3 {
            background-color: #EBF5FB;
            margin-top: 10px;
            margin-left: 10px;
        }
    </style>
    </style>
</head>

<body class="container-fluid mt-3">

    <div class="row">
        <div class="col-6">
            <form action="form-horizontal">
                <div class="form-group row mt-3 ">
                    <a class="btn d-grid gap-2 col-3 mx-aut"
                        href="http://localhost/esteveza/gestionar_emisiones/" role="button" id="regresar"><svg
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
                <h1>PROCESO DE VERIFICACIÓN</h1>
            </center>
        </div>
    </div>
    <?php
    $id = $_GET['id'];
    global $wpdb;
    $emision = $wpdb->get_row("SELECT * FROM emisiones WHERE id=$id LIMIT 1", ARRAY_A);
    if ($emision) {
        ?>
        <div class="row">
            <div class="col fila1">
                <label for=""><strong>Año</strong></label>
                <p>
                    <?php echo $emision['anio'] ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Provincia</strong></label>
                <p>
                    <?php echo $emision['provincia'] ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Finca</strong></label>
                <p>
                    <?php echo $emision['finca'] ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Metano Fermentación Entérica / t CO2eq</strong></label>
                <p>
                    <?php echo number_format($emision['metano_enterica'], 2, ',', '.') ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col fila2">
                <label for=""><strong>Metano Manejo Excretas / t CO2eq</strong></label>
                <p>
                    <?php echo number_format($emision['metano_excretas'], 2, ',', '.') ?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>N2O Manejo Excretas / t CO2eq</strong></label>
                <p>
                    <?php echo number_format($emision['N2O_excretas'], 2, ',', '.') ?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>N2O Excretas en Pasturas / t CO2eq </strong></label>
                <p>
                    <?php echo number_format($emision['N2O_pasturas'], 2, ',', '.') ?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>Total Emisiones / t CO2eq</strong></label>
                <p>
                    <?php echo number_format($emision['total_emisiones'], 2, ',', '.') ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col fila3">
                <label for=""><strong>Leche / l/año</strong></label>
                <p>
                    <?php echo number_format($emision['leche'], 2, ',', '.') ?>
                </p>
            </div>
            <div class="col fila3">
                <label for=""><strong>Carne / kg canal/año</strong></label>
                <p>
                    <?php echo number_format($emision['carne'], 2, ',', '.') ?>
                </p>
            </div>
            <div class="col fila3">
                <label for=""><strong>IE Leche / kg CO2eq/l</strong></label>
                <p>
                    <?php echo number_format($emision['IE_leche'], 2, ',', '.') ?>
                </p>
            </div>
            <div class="col fila3">
                <label for=""><strong>IE Carne / kg CO2eq/kg canal</strong></label>
                <p>
                    <?php echo number_format($emision['IE_carne'], 2, ',', '.') ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col fila2">
                <label for=""><strong>Fecha de Registro</strong></label>
                <p>
                    <?php echo $emision['fecha_registro'] ?>
                </p>
            </div>
        </div>

        <?php
    }
    ?>

</body>

</html>