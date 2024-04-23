<?php
    if ($_FILES['csv-file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['csv-file']['name'];
        $tmp_name = $_FILES['csv-file']['tmp_name'];

        // Mueve el archivo temporal a una ubicación permanente en el servidor
        move_uploaded_file($tmp_name,"C:/xampp/htdocs/uploads/$file_name");

        echo "El archivo CSV se ha cargado correctamente.";

        //Procesar el archivo CSV e inserta los datos en la base de datos 
        $csvFilePath ="C:/xampp/htdocs/uploads/$file_name";
        //conexion
        $conexion = new mysqli("localhost", "root", "", "esteveza_mrv");
        if($conexion -> connect_error){
            die("Conexion a la base de datos fallida". $conexion -> connect_error);
        }
    //       echo "conexio exitosa";
        if(($handle = fopen($csvFilePath,"r")) !== FALSE) {
            $insertedData = 0;
            while(($data = fgetcsv($handle,1000,",")) !== FALSE) {
                $id = $conexion->real_escape_string($data[0]);
                $codigo = $conexion->real_escape_string($data[1]);
                $nombre = $conexion->real_escape_string($data[2]);
                $meta_anual = $conexion->real_escape_string($data[3]);
                $escenario = $conexion->real_escape_string($data[4]);
                $linea_accion = $conexion->real_escape_string($data[5]);
                $componente = $conexion->real_escape_string($data[6]);
                $elemento = $conexion->real_escape_string($data[7]);
                $objetivo_desarrollo = $conexion->real_escape_string($data[8]);
                $sector = $conexion->real_escape_string($data[9]);
                $estado = $conexion->real_escape_string($data[10]);

     /*            $id = $data[0];
                $codigo = $data[1];
                $nombre = $data[2];
                $meta_anual = $data[3];
                $escenario = $data[4];
                $linea_accion = $data[5];
                $componente = $data[6];
                $elemento = $data[7];
                $objetivo_desarrollo = $data[8];
                $sector = $data[9];
                $estado = $data[10]; */
               
                //Insertar los datos en la tabla

                $sql = "INSERT INTO iniciativas (id,codigo,nombre,meta_anual,escenario,linea_accion,componente,elemento,objetivo_desarrollo,sector,estado)
                VALUES('$id','$codigo','$nombre','$meta_anual','$escenario','$linea_accion','$componente','$elemento','$objetivo_desarrollo','$sector','$estado')";
                if($conexion->query($sql) === TRUE) {
                    echo "Datos insertados correctamente";
                    $insertedData++;
                }else{
                    echo "Error al insertar datos";
                }
            }
            fclose($handle);
        }
        $conexion->close();

    } else {
        echo "Hubo un error al cargar el archivo CSV.";
    }

?>