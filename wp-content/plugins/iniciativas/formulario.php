<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="UTF-8">
        <title>formulario</title>
      
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <!--  links de multiple select -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
        <link rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- scripts de multiple select -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
        <!--  Iconos para los botones -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
                crossorigin="anonymous">
        <script>
                var ApiUrl = <?php echo json_encode(get_site_url()); ?>;
                console.log(ApiUrl);
        </script>
</head>

<body>
        <div class="row">
                        <center>
                                <h1>CREAR INICIATIVAS</h1>
                        </center>            
        </div>
        <div class="row">
                <div class="col-6">
                        <form class="form-horizontal" id="formulario_iniciativa">

                                <div class="form-group row">
                                        <label for="codigo" class="control-label"> <strong>Código Iniciativa</strong>
                                        </label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="codigo" name="codigo"
                                                        required>
                                        </div>

                                </div>
                                <div class="form form-group row">
                                        <label for="sector" class="control-label"><strong>Sector</strong></label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="sector" name="sector"
                                                        required>
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <label for="nombre" class="control-label"> <strong>Nombre Iniciativa</strong>
                                        </label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="nombre" name="nombre"
                                                        required>
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <label for="nombre" class="control-label"><strong>Periodo de la NDC</strong>
                                        </label>
                                        <div class="col">
                                                <select class="form-select" name="ndc" id="ndc" required>
                                                        <option value="">Por favor escoja la opción</option>
                                                        <option value="2020-2025">2020 - 2025</option>
                                                        <option value="2026-2035">2026 - 2035</option>
                                                </select>
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="meta_anual" class="control-label"><strong>Meta anual</strong>
                                        </label>
                                        <div class="col">
                                                <div class="input-group">
                                                        <input type="number" class="form-control" id="meta_anual"
                                                                name="meta_anual" required value="0">
                                                        <span class="unidades" style="margin-left: 5px; "><strong>Gg CO2
                                                                        eq</strong>
                                                        </span>
                                                </div>
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="escenario" class="control-label"> <strong>Escenario</strong>
                                        </label>
                                        <div class="col">
                                                <select class="form-select" name="escenario" id="escenario" required>
                                                        <option value="">Por favor escoja el escenario</option>
                                                        <option value="0">Incondicional</option>
                                                        <option value="1">Condicional</option>
                                                </select>
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="linea_accion" class="control-label"><strong>Linea de
                                                        acción</strong></label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="linea_accion"
                                                        name="linea_accion" required>
                                        </div>

                                </div>
                                <div class="form form-group row">
                                        <label for="componente"
                                                class="control-label"><strong>Componente</strong></label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="componente"
                                                        name="componente" required>
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="elemento" class="control-label"><strong>Elemento</strong></label>
                                        <div class="col">
                                                <input type="text" class="form-control" id="elemento" name="elemento"
                                                        required>
                                        </div>
                                </div>
                                <div class="form form-group row">
                                        <label for="objetivo_desarrollo" class="control-label"><strong>Vinculación de
                                                        Iniciativa con los ODS</strong></label>
                                        <div class="col">
                                                <select class="form-select form-select-sm mb-3"
                                                        name="objetivo_desarrollo" id="objetivo_desarrollo"
                                                        data-placeholder="Escoja los objetivos" multiple>
                                                        <option value="1">1. Fin de la pobreza</option>
                                                        <option value="2">2. Hambre cero</option>
                                                        <option value="3">3. Salud</option>
                                                        <option value="4">4. Educación de calidad</option>
                                                        <option value="5">5. Igualdad de género</option>
                                                        <option value="6">6. Agua limpia y Saneamiento</option>
                                                        <option value="7">7. Energía Asequible y no contaminante
                                                        </option>
                                                        <option value="8">8. Trabajo decente y Crecimiento Económico
                                                        </option>
                                                        <option value="9">9. Industria Innovación e Infraestructura
                                                        </option>
                                                        <option value="10">10. Reducción de las Desigualdades</option>
                                                        <option value="11">11. Cuidades y Comunidades Sostenibles
                                                        </option>
                                                        <option value="12">12. Producción y Consumo Responsable.
                                                        </option>
                                                        <option value="13">13. Acción por el clima</option>
                                                        <option value="14">14. Vida Submarina</option>
                                                        <option value="15">15. Paz, Justicia e Instituciones Sólidas
                                                        </option>
                                                </select>
                                        </div>

                                </div>
                                <div class="form form-group row">
                                        <label for="estado" class="control-label"><strong>Estado</strong></label>
                                        <div class="col">
                                                <select class="form-select" name="estado" id="estado" required>
                                                        <option value="">Por favor escoja la opción</option>
                                                        <option value="1">Activo</option>
                                                        <option value="0">Inactivo</option>
                                                </select>

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
                                                </svg>
                                        </button>
                                </div>

                        </form>

                        <div class="form-group row mt-3">
                                <div class="col">
                                        <h5> <strong>Cargar Archivo</strong> </h5>
                                        <input type="file" id="csv-file" accept=".csv">
                                        <button class="btn" id="cargar" type="submit"> <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                                        fill="#5DADE2" class="bi bi-filetype-csv" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                                d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM3.517 14.841a1.13 1.13 0 0 0 .401.823q.195.162.478.252.284.091.665.091.507 0 .859-.158.354-.158.539-.44.187-.284.187-.656 0-.336-.134-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.566-.21l-.621-.144a1 1 0 0 1-.404-.176.37.37 0 0 1-.144-.299q0-.234.185-.384.188-.152.512-.152.214 0 .37.068a.6.6 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.2-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.439 0-.776.15-.337.149-.527.421-.19.273-.19.639 0 .302.122.524.124.223.352.367.228.143.539.213l.618.144q.31.073.463.193a.39.39 0 0 1 .152.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.167.07-.413.07-.175 0-.32-.04a.8.8 0 0 1-.248-.115.58.58 0 0 1-.255-.384zM.806 13.693q0-.373.102-.633a.87.87 0 0 1 .302-.399.8.8 0 0 1 .475-.137q.225 0 .398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.4 1.4 0 0 0-.489-.272 1.8 1.8 0 0 0-.606-.097q-.534 0-.911.223-.375.222-.572.632-.195.41-.196.979v.498q0 .568.193.976.197.407.572.626.375.217.914.217.439 0 .785-.164t.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.8.8 0 0 1-.118.363.7.7 0 0 1-.272.25.9.9 0 0 1-.401.087.85.85 0 0 1-.478-.132.83.83 0 0 1-.299-.392 1.7 1.7 0 0 1-.102-.627zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879z" />
                                                </svg></button>
                                </div>
                        </div>
                </div>

        </div>
        <div class="row">
                <div class="col-6">
                        <form action="form-horizontal">
                                <div class="form-group row mt-3 ">
                                        <a class="btn d-grid gap-2 col-3 mx-aut"
                                                href="http://localhost/esteveza/gestionar-iniciativa/" role="button"
                                                id="regresar"><svg xmlns="http://www.w3.org/2000/svg" width="42"
                                                        height="42" fill="gray" class="bi bi-arrow-left-square-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                                d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
                                                </svg></a>
                                </div>
                        </form>
                </div>
        </div>
            <?php
        ?>


</body>

</html>