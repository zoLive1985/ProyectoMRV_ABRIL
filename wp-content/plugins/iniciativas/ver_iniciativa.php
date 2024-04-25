<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ver Inicitiva</title>
    <!--link rel="stylesheet" href="./estilo.css"-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="container-fluid mt-3">

    <div class="row">
        <div class="col-6">
            <form action="form-horizontal">
                <div class="form-group row mt-3 ">
                    <a class="btn d-grid gap-2 col-3 mx-aut" href="http://localhost/esteveza/gestionar-iniciativa/"
                        role="button" id="regresar"><svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                            fill="gray" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
                        </svg></a>
                </div>
            </form>
        </div>
    </div>
    <center>
        <div class="row">
            <div class="col">
                <h1>INICIATIVAS MITIGACIÓN</h1>
            </div>
        </div>
    </center>
    <?php
    $id = $_GET['id'];
    global $wpdb;
    $iniciativa = $wpdb->get_row("SELECT * FROM iniciativas WHERE id=$id LIMIT 1", ARRAY_A);
    if ($iniciativa) {
        //print_r($iniciativa);
        ?>
        <div class="row">
            <div class="col fila1">
                <label for=""><strong>Código Iniciativa</strong></label>
                <p>
                    <?php echo $iniciativa['codigo'] ?>
                </p>
            </div>
            <div class="col fila1 ">
                <label for=""><strong>Sector</strong></label>
                <p>
                    <?php echo $iniciativa['sector'] ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Nombre Iniciativa</strong></label>
                <p>
                    <?php echo $iniciativa['nombre'] ?>
                </p>
            </div>
            <div class="col fila1">
                <label for=""><strong>Periodo de la NDC</strong></label>
                <p>
                    <?php echo ($iniciativa['ndc'] == 0) ? '2020 - 2025' : '2026 - 2035' ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col fila2">
                <label for=""><strong>Meta Anual</strong></label>
                <p>
                    <?php echo number_format($iniciativa['meta_anual'], 2, ',', '.') ?> 
                    <span>Gg CO2 eq</span>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>Escenario</strong></label>
                <p>
                    <?php echo ($iniciativa['escenario'] == 0) ? 'Incondicional' : 'Condicional' ?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>Lineas de Acción</strong></label>
                <p>
                    <?php echo $iniciativa['linea_accion'] ?>
                </p>
            </div>
            <div class="col fila2">
                <label for=""><strong>Componente</strong></label>
                <p>
                    <?php echo $iniciativa['componente'] ?>
                </p>
            </div>

        </div>
        <div class="row">
            <div class="col fila3">
                <label for=""><strong>Elemento</strong></label>
                <p>
                    <?php echo $iniciativa['elemento'] ?>
                </p>
            </div>
            <div class="col fila3">
                <label for=""><strong>Vinculación de Iniciativa con los ODS</strong></label>
                <p>
                    <?php
                    $arregloObjetivos = ($iniciativa['objetivo_desarrollo'] == "") ? [] : json_decode($iniciativa['objetivo_desarrollo']);
                    if (count($arregloObjetivos) == 0) {
                        echo 'No hay dana';
                    } else {
                        foreach ($arregloObjetivos as $objetivo) {
                            if ($objetivo == 1) {
                                echo '1. Fin de la pobreza<br/>';
                            }
                            if ($objetivo == 2) {
                                echo '2. Hambre cero<br/>';
                            }
                            if ($objetivo == 5) {
                                echo '5. Igualdad de género<br/>';
                            }
                            if ($objetivo == 12) {
                                echo '12. Garantizar modalidades de consumo y producción sostenibles.<br/>';
                            }
                            if ($objetivo == 13) {
                                echo '13. Adoptar medidas urgentes para combatir el cambio climático y sus efectos.<br/>';
                            }
                        }
                    }
                    ?>

                </p>
            </div>
            <div class="col fila3">
                <label for=""><strong>Estado</strong></label>
                <p>
                    <?php echo ($iniciativa['estado'] == 0) ? 'Inactivo' : 'Activo' ?>
                </p>
            </div>
            <div class="col fila3">
                <label for=""><strong>Fecha de Registro</strong></label>
                <p>
                    <?php echo $iniciativa['fecha_registro'] ?>
                </p>
            </div>
        </div>



        <?php
    }
    ?>

</body>

</html>