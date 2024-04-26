<?php

if (isset($_POST['submit'])) {
    global $wpdb;
    $tabla = 'iniciativas';

    $codigo = sanitize_text_field($_POST['codigo']);
    $nombre = sanitize_text_field($_POST['nombre']);
    $ndc = ($_POST['ndc']);
    $meta_anual =sanitize_text_field ($_POST['meta_anual']);
    $escenario = ($_POST['escenario']);
    $linea_accion = ($_POST['linea_accion']);
    $componente = ($_POST['componente']);
   // $elemento = ($_POST['elemento']);
    $objetivo_desarrollo = isset($_POST['objetivo_desarrollo']) ? implode(',', $_POST['objetivo_desarrollo']) : '';
    $sector =($_POST['sector']);
    $estado = ($_POST['estado']);
    //datos a insertar
   // var_dump($_POST);

    $datos = array(
        'codigo' => $codigo,
        'estado' => $estado,
        'nombre' => $nombre,
        'ndc' => $ndc,
        'meta_anual' => $meta_anual,
        'escenario' => $escenario,
        'linea_accion' => $linea_accion,
        'componente' => $componente,
       // 'elemento' => $elemento,
        'objetivo_desarrollo' => $objetivo_desarrollo,
        'sector' => $sector,
        'fecha_registro' => $currentDate

        
 
    ); 
    // Formato de los datos (especifica el formato de cada dato)
    $formato = array('%s', '%s');

    $resultado = $wpdb->insert( 
        $tabla,$datos,$formato
    
    );

    // Verificar el resultado de la inserción

    if ($resultado !== false) {
        echo "Registro guardado exitosamente";
    } else {
        echo "Error al guardar el registro:" . $wpdb->last_error;
    }

}

?>