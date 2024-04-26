<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="UTF-8">
        <title>formulario</title>
        <!--link rel="stylesheet" href="./estilo.css"-->
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
        <script>
                var ApiUrl = <?php echo json_encode(get_site_url()); ?>;
                console.log(ApiUrl);
        </script>
</head>

<body>
        <div class="row">
                <center>
                        <h1>EDITAR INICIATIVAS</h1>
                </center>
        </div>
        <?php
        $id = $_GET['id'];
        global $wpdb;
        $iniciativa = $wpdb->get_row("SELECT * FROM iniciativas WHERE id=$id LIMIT 1", ARRAY_A);
        //var_dump($iniciativa);
        if ($iniciativa) {
                ?>
                <div class="row">
                        <div class="col-6">
                                <form class="form-horizontal" id="formulario">
                                        <input type="hidden" value="<?php echo $iniciativa['id'] ?>" id="id">
                                        <div class="form-group row">
                                                <label for="codigo" class="control-label"><strong>Código Inciativa
                                                        </strong></label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="codigo" name="codigo"
                                                                required value="<?php echo $iniciativa['codigo']; ?>">
                                                </div>

                                        </div>
                                        <div class="form form-group row">
                                                <label for="sector" class="control-label"><strong>Sector</strong></label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="sector" name="sector"
                                                                required value="<?php echo $iniciativa['sector']; ?>">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="nombre" class="control-label"><strong>Nombre
                                                                Iniciativa</strong></label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                                                required value="<?php echo $iniciativa['nombre']; ?>">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="ndc" class="control-label"><strong>Periodo de la NDC</strong>
                                                </label>
                                                <div class="col">
                                                        <select class="form-select" name="ndc" id="ndc" required>
                                                                <option value="">Por favor escoja la opción</option>
                                                                <option value="2020-2025" <?php echo ($iniciativa["ndc"] == "2020-2025") ? 'selected' : '' ?>>
                                                                        2020 - 2025</option>
                                                                <option value="2026-2035" <?php echo ($iniciativa["ndc"] == "2026-2035") ? 'selected' : '' ?>>
                                                                        2026 - 2035</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="meta_anual" class="control-label"><strong>Meta anual</strong>
                                                </label>
                                                <div class="col">
                                                        <div class="input-group">
                                                                <input type="number" class="form-control" id="meta_anual"
                                                                        name="meta_anual" required
                                                                        value="<?php echo $iniciativa['meta_anual']; ?>">
                                                                <span class="unidades" style="margin-left: 5px;"><strong>Gg CO2
                                                                                eq</strong></span>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="escenario" class="control-label"><strong>Escenario</strong> </label>
                                                <div class="col">

                                                        <select class="form-select" name="escenario" id="escenario" required>
                                                                <option value="">Por favor escoja el escenario</option>
                                                                <option value="0" <?php echo ($iniciativa["escenario"] == 0) ? 'selected' : '' ?>>Incondicional</option>
                                                                <option value="1" <?php echo ($iniciativa["escenario"] == 1) ? 'selected' : '' ?>>Condicional</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <label for="linea_accion" class="control-label"><strong>Linea de
                                                                acción</strong></label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="linea_accion"
                                                                name="linea_accion" required
                                                                value="<?php echo $iniciativa['linea_accion']; ?>">
                                                </div>

                                        </div>
                                        <div class="form form-group row">
                                                <label for="componente"
                                                        class="control-label"><strong>Componente</strong></label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="componente"
                                                                name="componente" required
                                                                value="<?php echo $iniciativa['componente']; ?>">
                                                </div>
                                        </div>
                                       <!--  <div class="form form-group row">
                                                <label for="elemento" class="control-label"><strong>Elemento</strong></label>
                                                <div class="col">
                                                        <input type="text" class="form-control" id="elemento" name="elemento"
                                                                required value="<?php echo $iniciativa['elemento']; ?>">
                                                </div>
                                        </div> -->
                                        <div class="form form-group row">
                                                <label for="objetivo_desarrollo" class="control-label"><strong>Vinculación de la
                                                                iniciativacon los ODS</strong></label>
                                                <div class="col">
                                                        <select class="form-select form-select-sm mb-3"
                                                                name="objetivo_desarrollo" id="objetivo_desarrollo"
                                                                data-placeholder="Escoja los objetivos" multiple>
                                                                <option value="1" <?php echo ($iniciativa["objetivo_desarrollo"] == 1) ? 'selected' : '' ?>>1. Fin de la pobreza</option>
                                                                <option value="2" <?php echo ($iniciativa["objetivo_desarrollo"] == 2) ? 'selected' : '' ?>>2. Hambre cero</option>
                                                                <option value="3" <?php echo ($iniciativa["objetivo_desarrollo"] == 3) ? 'selected' : '' ?>>3. Salud</option>
                                                                <option value="4" <?php echo ($iniciativa["objetivo_desarrollo"] == 4) ? 'selected' : '' ?>>4. Educación de calidad</option>
                                                                <option value="5" <?php echo ($iniciativa["objetivo_desarrollo"] == 5) ? 'selected' : '' ?>>5. Igualdad de género</option>
                                                                <option value="6" <?php echo ($iniciativa["objetivo_desarrollo"] == 6) ? 'selected' : '' ?>>6. Agua limpia y Saneamiento</option>
                                                                <option value="7" <?php echo ($iniciativa["objetivo_desarrollo"] == 7) ? 'selected' : '' ?>>7. Energía Asequible y no contaminante</option>
                                                                <option value="8" <?php echo ($iniciativa["objetivo_desarrollo"] == 8) ? 'selected' : '' ?>>8. Trabajo decente y Crecimiento Económico
                                                                </option>
                                                                <option value="9" <?php echo ($iniciativa["objetivo_desarrollo"] == 9) ? 'selected' : '' ?>>9. Industria Innovación e Infraestructura</option>
                                                                <option value="10" <?php echo ($iniciativa["objetivo_desarrollo"] == 10) ? 'selected' : '' ?>>10. Reducción de las Desigualdades</option>
                                                                <option value="11" <?php echo ($iniciativa["objetivo_desarrollo"] == 11) ? 'selected' : '' ?>>11. Cuidades y Comunidades Sostenibles</option>
                                                                <option value="12" <?php echo ($iniciativa["objetivo_desarrollo"] == 12) ? 'selected' : '' ?>>12. Producción y Consumo Responsable.</option>
                                                                <option value="13" <?php echo ($iniciativa["objetivo_desarrollo"] == 13) ? 'selected' : '' ?>>13. Acción por el clima</option>
                                                                <option value="14" <?php echo ($iniciativa["objetivo_desarrollo"] == 14) ? 'selected' : '' ?>>14. Vida Submarina</option>
                                                                <option value="15" <?php echo ($iniciativa["objetivo_desarrollo"] == 15) ? 'selected' : '' ?>>15. Paz, Justicia e Instituciones Sólidas</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="form form-group row">
                                                <?php
                                                if (is_user_logged_in()) {
                                                        // Obtenemos la información del usuario logueado
                                                        $infoUser = wp_get_current_user();
                                                        $perfil = reset($infoUser->roles);
                                                        if ($perfil !== false) {
                                                                if ($perfil == 'innovacion') { ?>
                                                                        <label for="estado" class="control-label"><strong>Estado</strong></label>
                                                                        <div class="col">
                                                                                <select class="form-select" name="estado" id="estado" required <?php echo ($perfil == 'innovacion') ? '' : 'disabled' ?>>
                                                                                        <option value="">Por favor escoja la opción</option>
                                                                                        <option value="1" <?php echo ($iniciativa["estado"] == 1) ? 'selected' : '' ?>>Activo</option>
                                                                                        <option value="0" <?php echo ($iniciativa["estado"] == 0) ? 'selected' : '' ?>>Inactivo</option>
                                                                                </select>
                                                                                <?php
                                                                }
                                                        }

                                                } else {
                                                        //echo "El visitante no ha iniciado sesión";
                                                }

                                                ?>

                                                </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                                <button class="btn d-grid gap-2 col-3 mx-aut" type="button"
                                                        id="actualizar" name="actualizar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                                                fill="#5DADE2" class="bi bi-arrow-repeat"
                                                                viewBox="0 0 16 16">
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
                                                <a class="btn d-grid gap-2 col-3 mx-aut"
                                                        href="http://localhost/esteveza/gestionar-iniciativa/" role="button"
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
                $ruta_archivo = plugin_dir_path(__FILE__) . 'funcionalidad.php';
                /*if (file_exists($ruta_archivo)) {
                        include $ruta_archivo;
                }*/

        }
        ?>


</body>

</html>