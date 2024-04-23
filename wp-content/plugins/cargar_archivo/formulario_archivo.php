<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="UTF-8">
        <title>Cargar archivo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="container-fluid mt-3">
        <div class="row">
                <h1>Cargar Archivo</h1>

                <form id="csv-form" enctype="multipart/form-data">
                        <input type="file" name="csv-file" accept=".csv">
                        <button type="submit"> Cargar CSV</button>
                </form>
   
        </div>
        <div id="result"></div>
        <div class="row">
                <table class="table table-hover mt-3" id="lista_csv">
                        <thead>
                                <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col" style="width: 100px;">Código</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Meta Anual</th>
                                        <th scope="col">Escenario</th>
                                        <th scope="col">Linea de Acción</th>
                                        <th scope="col">Componente</th>
                                        <th scope="col">Elemento</th>
                                        <th scope="col">Objetivo de Desarrollo</th>
                                        <th scope="col">Sector</th>
                                        <th scope="col">Estado</th>

                                </tr>
                        </thead>
                </table>
        </div>

        <script type="text" src="/assets/js/script_cargar.js"></script>


</body>

</html>