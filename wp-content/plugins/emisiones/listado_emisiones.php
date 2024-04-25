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
    <style>
        #cpvalidar {
            width: 150%;
            height: 150%;
            margin: 0 auto;
            background-color: transparent !important;
        }
    </style>

</head>

<body class="container-fluid mt-3">
    <center>
        <h1>GESTIONAR EMISIONES</h1>
    </center>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <div class="d-grid gap-2 d-md-block">
                                    <a class="btn" href="http://localhost/esteveza/agregar_emisiones/" role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="green"
                                            class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0" />
                                        </svg></a>
                                    <span class="texto_oculto">Agregar Emisión</span>

                                </div>
                            </div>
                        </div>
                        <!--  <div class="col">
                                <div class="d-grid gap-2 d-md-block">
                                     <a class="btn btn-primary" href=" http://localhost/esteveza/consolidacion/" role="button">Consolidar</a>
                                </div>      
                            </div> -->
                        <div class="col">
                            <div class="form-floating mb-3">
                                <div class="d-grid gap-2 d-md-block" id="valtodo">
                                    <a class="btn" href="#" role="button" id="validar_todo">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="orange"
                                            class="bi bi-list-check" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                                        </svg>
                                    </a>
                                    <span class="texto_oculto">Validar todo</span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class= "col">
                            <div class="d-grid gap-2 d-md-block">
                                     <a class="btn btn-primary" href=" http://localhost/esteveza/agregar-fincas/" role="button">Agregar fincas</a>
                                </div>
                            </div> -->

                        <div class="col ">
                            <div class="card" id="cardvalidar">
                                <div class="card-body" id="cpvalidar">
                                    <div class="row" >
                                        <h5 id="titulo">Validación por Finca</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="selectfinca" id="selectfinca">
                                                    <option value="null">Seleccione la Finca</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <div class="d-grid gap-2 d-md-block">
                                                    <a class="btn" href="#" role="button" id="validarFinca">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                                            fill="orange" class="bi bi-check-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                                                        </svg></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>
    <br>

    <div class="row ">
        <table class="table table-hover mt-3" id="listado"  style="text-align: center; vertical-align: middle;">
            <thead>
                <tr>
                    <th scope="col"  style="text-align: center; vertical-align: middle;">N°</th>
                    <th scope="col"  style="text-align: center; vertical-align: middle;">Año</th>
                    <th scope="col"  style="text-align: center; vertical-align: middle;">Código de la Finca</th>
                    <th scope="col" style="text-align: center;">Metano Fermentación Entérica <div>t CO2eq</div>
                    </th>
                    <th scope="col" style="text-align: center; vertical-align: middle;" >Metano Manejo Excretas <div>t CO2eq</div>
                    </th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">N2O Manejo Excretas <div>t CO2eq</div>
                    </th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">N2O Excretas en Pasturas <div>t CO2eq</div>
                    </th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Total de emisiones <div>t CO2eq</div></th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Estado</th>
                    <th scope="col" style="text-align: center; vertical-align: middle; width: 225px;">Acciones </th>
                </tr>
            </thead>

            <tbody>

            </tbody>
        </table>

    </div>

</body>

</html>