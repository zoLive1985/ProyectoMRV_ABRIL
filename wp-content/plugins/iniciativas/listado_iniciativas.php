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
    <!-- enlace para iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body class="container-fluid mt-3">
    <center>
        <h1>GESTIONAR INICIATIVAS</h1>
    </center>
    <div class="row">
        <?php
        if (is_user_logged_in()) {
            // Obtenemos la información del usuario logueado
            $infoUser = wp_get_current_user();
            $perfil = reset($infoUser->roles);
            if ($perfil !== false) {
                if ($perfil == 'innovacion') { ?>
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn agregar_tooltip" href="http://localhost/esteveza/agregar-iniciativa/" role="button" id="agregar"><svg
                                xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="green"
                                class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0" />
                            </svg></a>
                    </div>
                    <?php
                }
            }


        } else {
            //die();
        }

        ?>

    </div>
    <?php
    if (is_user_logged_in()) {
        ?>
        <div class="row ">
            <table class="table table-hover mt-3" id="listado" style="text-align: center; vertical-align: middle;">
                <thead>
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Nombre Iniciativa</th>
                        <th scope="col">Escenario</th>
                        <th scope="col">Periodo de la NDC</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    global $wpdb;
                    $tabla_nombre = 'iniciativas';
                    $registros = $wpdb->get_results("SELECT * FROM $tabla_nombre", ARRAY_A);
                    if (is_array($registros)) {
                        foreach ($registros as $iniciativa) {
                            echo "<tr>";
                            echo "<td>" . $iniciativa["id"] . "</td>";
                            echo "<td>" . $iniciativa["nombre"] . "</td>";
                            if ($iniciativa["escenario"] == 0) {
                                echo "<td>Incondicional</td>";
                            } else {
                                echo "<td>Condicional</td>";
                            }
                            if ($iniciativa["ndc"] == 0) {
                                echo "<td>2020 - 2025</td>";
                            } else {
                                echo "<td>2026 - 2035</td>";
                            }
                            if ($perfil == 'ganaderia' || $perfil == 'mate') {
                                echo '<td> 
                                    <a class="btn visualizar_tooltip"  id="visualizar"  href="http://localhost/esteveza/ver-inicitiva?id=' . $iniciativa["id"] . '" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="green" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg></a>';

                            } elseif ($perfil == 'innovacion') {
                                echo '<td>
                                        <a class="btn visualizar_tooltip" id="visualizar"  href="http://localhost/esteveza/ver-inicitiva?id=' . $iniciativa["id"] . '" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="green" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                        </svg></a>';
                                echo '<a class="btn editar_tooltip" id="editar"  href="http://localhost/esteveza/editar-iniciativas?id=' . $iniciativa["id"] . '" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="blue" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                                        </svg></a>';
                                echo '<a class="btn suspender_tooltip" id="suspender"  href="#" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="red" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                                        <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
                                        </svg></a>';
                                echo "</td>";
                            }
                            echo "<tr>";
                        }
                    }
                    ?>

                </tbody>
            </table>

        </div>
    <?php } ?>

</body>

</html>