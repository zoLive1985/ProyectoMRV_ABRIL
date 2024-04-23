<?php

global $wpdb;
$tabla_nombre = 'historial_emisiones';
$registros = $wpdb->get_results("SELECT anio, nombre_finca, emision_total, N2O_Excretas_en_pasturas, N2O_Manejo_de_Excretas FROM $tabla_nombre", ARRAY_A);

?>
<script>
    var datosOriginales = <?php echo json_encode($registros); ?>;
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Historial Emisiones</title>
</head>

<body class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                        <div class="col">
                            <!--Nombre Finca-->
                            <div class="form-floating mb-3">
                                <input class="form-control input-sm " value="" type="text" id="nom_finca">
                                <label for="nom_finca">Nombre Finca</label>
                            </div>
                        </div>
                        <div class="col">
                            <!--Año-->
                            <div class="form-floating mb-3">
                                <input class="form-control input-sm" type="text" id="anio">
                                <label for="alimento">A&ntilde;o</label>
                            </div>
                        </div>
                        <div class="col">
                            <!--Boton Buscar-->
                            <button class="btn btn-primary" id="buscar"><i class="bi bi-search btn-xsm"></i></button>
                            <!--Boton reset-->
                            <button class="btn btn-primary" id="reset"><i class="bi bi-arrow-clockwise btn-xsm"></i>
                            </button>
                            <!--Boton Descargar -->
                            <button class="btn btn-primary" id="descargar"><i
                                    class="bi bi-arrow-down-circle btn-xsm"></i> </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover mt-3" id="catastro">
            <thead>
                <tr>
                    <th scope="col">A&ntilde;o</th>
                    <th scope="col" style="width: 100px;">Nombre finca</th>
                    <th scope="col">Emision Total</th>
                    <th scope="col">N2O Excretas en pasturas</th>
                    <th scope="col">N2O Manejo de Excretas</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <div class="input-group  input-group-sm mb-3">
                            <span class="input-group-text">Registros Totales:</span>
                            <input class="form-control-sm" id="totalRegistros" type="text" readonly>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="input-group  input-group-sm mb-3">
                            <span class="input-group-text">Total emisiones:</span>
                            <input class="form-control-sm" id="totalEmisiones" type="text" readonly>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text">Total Excretas en pasturas:</span>
                            <input class="form-control-sm" id="totalExcretasPasturas" type="text" readonly>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text">Total Manejo de Excretas: </span>
                            <input class="form-control-sm" id="totalManejoExcretas" type="text" readonly>
                        </div>


                    </td>

                </tr>
            </tfoot>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--script src="./historial_emisiones.js"></script-->


</body>

</html>