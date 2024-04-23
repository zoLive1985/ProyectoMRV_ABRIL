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
    <!-- enlace para iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- estilos.css -->
    <link rel="stylesheet" href="../../plugins/iniciativas/assets/css/estilo.css">
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
                        <a class="btn" href="http://localhost/esteveza/agregar-iniciativa/" role="button"
                            id="agregar"><svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="green"
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
            //echo "El visitante no ha iniciado sesión";
        }

        ?>

    </div>
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

            </tbody>
        </table>

    </div>

</body>

</html>