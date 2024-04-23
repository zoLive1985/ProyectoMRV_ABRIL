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
</head>

<body class="container-fluid mt-3">
    <div class="row">
        <h1>Gestionar Mediciones</h1>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="form-horizontal">

                <div class="form-group row">
                    <label for="ano_medicion" class="control-label" >Año de medición </label>
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="ano_medicion">
                            <option selected>2022</option>
                            <option value="1">2021</option>
                            <option value="2">2020</option>
                            <option value="3">2019</option>
                        </select>
                    </div>

                </div>

                <div class=" row">

                    <div class="col">
                        <label for="buscar" class="control-label">Buscar </label>
                        <input text="text" class="form-control" id="buscar_text" name="buscar" required
                            placeholder="Palabra Clave">
                    </div>
                    <div class="col">
                        <label for="desde" class="control-label">Desde </label>
                        <input type="date" class="form-control" id="desde" name="desde" required>
                    </div>
                    <div class="col">
                        <label for="hasta" class="control-label">Hasta </label>
                        <input type="date" class="form-control" id="hasta" name="hasta" required>
                    </div>
                </div>
                <div class="col">
                    <label for="estado" class="control-label">Estado </label>
                    <select class="form-select" aria-label="Default select example" id="estado">
                        <option selected>Seleccione una opción:</option>
                        <option value="V">Válido</option>
                        <option value="NV">No validado</option>
                    </select>
                </div>


                <div class="form-group row mt-3">
                    <button class="btn btn-primary  d-grid gap-2 col-6 mx-aut" type="button" id="buscar"
                        name="submit">Buscar</button>
                </div>

            </form>

        </div>
    </div>


    <div class="row ">
        <table class="table table-hover mt-3" id="listado_mediciones">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col" style="width: 100px;">Fecha</th>
                    <th scope="col">Código de la finca</th>
                    <th scope="col">Emisiones (Gg CO2 Equivalente)</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
 

    <nav aria-label="...">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <span class="page-link">2</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</body>

</html>