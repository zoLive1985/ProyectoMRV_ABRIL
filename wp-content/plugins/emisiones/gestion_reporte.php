<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" >
    <title>Módulo de Reporte</title>
    <!--link rel="stylesheet" href="./estilo.css"-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="container-fluid">
    <div class="row">
        <div class="col">
            <center>
                <h1>GESTIONAR REPORTE</h1>
            </center>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <!-- NDC -->
                            <div class="form-floating mb-3">
                                <select class="form-select" name="ndc" id="ndc" required>
                                    <option value="">Seleccione la NDC</option>
                                    <option value="2020-2025">2020 - 2025</option>
                                    <option value="2026-2035">2026 - 2035</option>
                                </select>
                                <label for="ndc">Periodo de la NDC</label>
                            </div>
                        </div>
                        <div class="col">
                            <!--Consolidar Iniciativa-->
                            <div class="form-floating mb-3">
                                <select name="coniniciativa" id="coniniciativa" class="form-select">
                                    <option value="null">Seleccione la Iniciativa</option>
                                    <?php

                                    ?>
                                </select>
                                <label for="coninciativa">Iniciativa</label>
                            </div>
                        </div>
                        <div class="col">
                            <!--Boton buscar-->
                            <button class="btn" id="buscar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="#3FACF5"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                            <!--Boton reset-->
                            <button class="btn" id="reset">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="red"
                                    class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
                                    <path
                                        d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.8 6.8 0 0 0 1.16 8z" />
                                    <path
                                        d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <table class="table table-hover mt-3" id="consolidacion" style="text-align: center; vertical-align: middle;">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Año</th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Metano Fermentación Entérica
                        <div>
                            <p>tCO2 eq</p>
                        </div>
                    </th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Metano Manejo Excretas
                        <div>
                            <p>tCO2 eq</p>
                        </div>
                    </th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">N2O Manejo Excretas
                        <div>
                            <p>tCO2 eq</p>
                        </div>
                    </th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">N2O Excretas en Pasturas
                        <p>tCO2 eq</p>
                    </th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Total de emisiones <div> t CO2eq
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
            <tfoot class="table-group-divider">
                <tr>
                    <td style="border:none;"></td>
                    <td style="border:none;"></td>
                    <td style="border:none;"></td>
                    <td style="border:none;"></td>
                    <td style="border:none;"></td>
                    <td style="border:none;"></td>
                    <td style="border:none;"></td>
                </tr>
            </tfoot>
            </tbody>
        </table>
    </div>
    <div class="col-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-2" type="button" id="btnreporte">Generar Reporte</button>

        </div>
    </div>

    </div>

</body>

</html>