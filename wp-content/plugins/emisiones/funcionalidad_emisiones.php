<?php
if(isset($_POST['submit'])){
    global $wpdb;
    $tabla ='emisiones';

    $anio = ($_POST['anio']);
    $provincia = sanitize_text_field($_POST['provincia']);
    $finca = sanitize_text_field($_POST['finca']);
    $producto = ($_POST['producto']);
    $metano_enterica = ($_POST['metano_enterica']);
    $metano_excretas = ($_POST['metano_excretas']);
    $N2O_excretas = ($_POST['N2O_excretas']);
    $N2O_pasturas = ($_POST['N2O_pasturas']);
    $total_emisiones = ($_POST['total_emisiones']);
    $leche = ($_POST['leche']);
    $carne = ($_POST['carne']);
    $IE_leche = ($_POST['IE_leche']);
    $IE_carne = ($_POST['IE_carne']);   

    $datos = array (
        'anio' => $anio,
        'provincia' => $provincia,
        'finca' => $finca,
        'producto' => $producto,
        'metano_enterica' => $metano_enterica,
        'metano_excretas' => $metano_excretas,
        'N2O_excretas' => $N2O_excretas,
        'N2O_pasturas' => $N2O_pasturas,
        'total_emisiones' => $total_emisiones,
        'leche' => $leche,
        'carne' => $carne,
        'IE_leche' => $IE_leche,
        'IE_carne' => $IE_carne
    );
    
    $formato = array ('%s','%s');

    $resultado = $wpdb->insert(
        $tabla,$datos,$formato
    );

    if($resultado !== false){
        echo"Registro guardado exitosamente";
    }else{
        echo"Error al guardar el registro" . $wpdb->last_error;
    }
 
}

?>