<?php
/*
/*
Plugin Name: emisiones
Version: 1.0
Description:Pagina Inicitivas
*/
//register_activation_hook(__FILE__, 'tabla_emisiones');

/**
 * Crea la tabla emisiones para activar el plugin
 *
 * @return void
 */
function incluir_emisiones()
{
    $ruta_archivo = plugin_dir_path(__FILE__) . 'formulario_emisiones.php';
    if (file_exists($ruta_archivo)) {
        wp_register_script('modelo_emisiones_js', plugin_dir_url(__FILE__) . 'assets/js/emisiones_model.js', array('jquery'), '1.0', true);
        wp_enqueue_script('modelo_emisiones_js');
        include $ruta_archivo;
        wp_register_script('formulario_js', plugin_dir_url(__FILE__) . 'assets/js/formulario.js', array('jquery'), '1.0', true);
        wp_enqueue_script('formulario_js');
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'assets/css/estilo.css');
        wp_enqueue_style('estilo');
        //mascara para el ingreso de numeros
       /*  wp_register_script('mascara_numeros_js', plugin_dir_url(__FILE__) . 'assets/js/jquery.masknumber.js');
        wp_enqueue_script('mascara_numeros_js');
 */


    }
}
add_shortcode('formulario_guardar_emisiones', 'incluir_emisiones');

function incluir_listado_emisiones()
{
    $listado_visualizar = plugin_dir_path(__FILE__) . 'listado_emisiones.php';
    if (file_exists($listado_visualizar)) {
        wp_register_script('listado_emisiones_js', plugin_dir_url(__FILE__) . 'assets/js/listado_emisiones.js', array('jquery'), '1.0', true);
        wp_enqueue_script('listado_emisiones_js');
        include $listado_visualizar;
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'assets/css/estilo.css');
        wp_enqueue_style('estilo');
    }
}

add_shortcode('listado_visualizacion_emisiones', 'incluir_listado_emisiones');

function mostrar_emisiones()
{
    $ruta_archivo_ver_emisiones = plugin_dir_path(__FILE__) . 'ver_emisiones.php';
    if (file_exists($ruta_archivo_ver_emisiones)) {
        include $ruta_archivo_ver_emisiones;
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'assets/css/estilo.css');
        wp_enqueue_style('estilo');
    } else {
        echo "No existe el archivo";
    }
}
add_shortcode('alias_ver_emisiones', 'mostrar_emisiones');

function editar_emisiones()
{
    $ruta_archivo_editar = plugin_dir_path(__FILE__) . 'editar_emisiones.php';
    if (file_exists($ruta_archivo_editar)) {
        wp_register_script('modelo_emisiones_js', plugin_dir_url(__FILE__) . 'assets/js/emisiones_model.js', array('jquery'), '1.0', true);
        wp_enqueue_script('modelo_emisiones_js');
        include $ruta_archivo_editar;
        wp_register_script('formulario_editar_emi_js', plugin_dir_url(__FILE__) . 'assets/js/formulario_editar_emi.js', array('jquery'), '1.0', true);
        wp_enqueue_script('formulario_editar_emi_js');
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'assets/css/estilo.css');
        wp_enqueue_style('estilo');
    } else {
        echo "No existe el archivo";
    }

}
add_shortcode('alias_editar_emisiones', 'editar_emisiones');

function consolidar_emisiones()
{
    $ruta_archivo_consolidar = plugin_dir_path(__FILE__) . 'consolidacion_provincia.php';
    if (file_exists($ruta_archivo_consolidar)) {
        wp_register_script('modelo_emisiones_js', plugin_dir_url(__FILE__) . 'assets/js/emisiones_model.js', array('jquery'), '1.0', true);
        wp_enqueue_script('modelo_emisiones_js');
        include $ruta_archivo_consolidar;
        wp_register_script('modelo_consolidar_js', plugin_dir_url(__FILE__) . 'assets/js/consolidacion.js', array('jquery'), '1.0', true);
        wp_enqueue_script('modelo_consolidar_js');
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'assets/css/estilo.css');
        wp_enqueue_style('estilo');


    }
}
add_shortcode('alias_consolidar', 'consolidar_emisiones');

function reporte()
{
    $ruta_archivo_reporte = plugin_dir_path(__FILE__) . 'reporte.php';
    if (file_exists($ruta_archivo_reporte)) {
        include $ruta_archivo_reporte;
    }

}
add_shortcode('alias_reporte', 'reporte');


function shortcode_pagina_incluida_emisiones()
{
    ob_start(); // Captura la salida

    incluir_emisiones(); // Llama a la función que incluye la página
    incluir_listado_emisiones();
    wp_enqueue_script('');

    return ob_get_clean(); // Retorna el contenido capturado
}
add_shortcode('shortcode_pagina_incluida_emisiones', 'shortcode_pagina_incluida_emisiones');

function registrar_rutas_rest_emi()
{
    // REST API
    register_rest_route(
        'mrv/v1',
        '/emisiones',
        array(
            'methods' => 'GET',
            'callback' => 'getEmisiones',
            'permission_callback' => function () {
                return true;
            }
        )
    );
    // Guardar una emisiones
    register_rest_route(
        'mrv/v1',
        '/emision',
        array(
            'methods' => 'POST',
            'callback' => 'newEmision'
        )
    );

    //editar emision
    //http://localhost/esteveza/wp-json/editaremision/v1/editar
    register_rest_route(
        'editaremision/v1',
        'editar',
        array(
            'methods' => 'PUT',
            'callback' => 'EditEmisiones',
            'permission_callback' => function () {
                return true;
            }
        )
    );

    //Cargar Archivo
    register_rest_route(
        'mrv/v1',
        '/cargaremisiones',
        array(
            'methods' => 'POST',
            'callback' => 'cargarEmisiones'
        )
    );
    //consolidar
    register_rest_route(
        'mrv/v1',
        'searchconsolidar/(?P<iniciativa>[\d]+)/(?P<anio>[a-zA-Z0-9]+)',
        array(
            'methods' => 'GET',
            'callback' => 'searchConsolidar'
        )
    );
    //consolidar todos enviar

    register_rest_route(
        'mrv/v1',
        'consolidarTodos/(?P<id_iniciativa>[\d]+)/(?P<anio>[a-zA-Z0-9]+)',
        array(
            'methods' => 'POST',
            'callback' => 'consolidarTodos'
        )
    );


    register_rest_route('mrv/v1', '/aprobarEmision/(?P<id>[\d]+)', [
        'methods' => 'POST',
        'callback' => 'aprobarEmision'
    ]);
    register_rest_route('mrv/v1', '/validarTodo', [
        'methods' => 'POST',
        'callback' => 'validarTodo'
    ]);
    register_rest_route('emision/v1', '/consultarFincas', [
        'methods' => 'GET',
        'callback' => 'consultarFincas'
    ]);
    register_rest_route('emision/v1', '/consultarEmisiones/(?P<finca>[a-zA-Z0-9-]+)', [
        'methods' => 'GET',
        'callback' => 'consultarEmisionesPorFinca'
    ]);
    register_rest_route('emision/v1', '/validarEmisionesPorFinca/(?P<finca>[a-zA-Z0-9-]+)', [
        'methods' => 'POST',
        'callback' => 'validarEmisionesPorFinca'
    ]);

    //contar los registros en Edición
    register_rest_route('emision/v1', 'contarregistros', [
        'methods' => 'GET',
        'callback' => 'contarRegistros'
    ]);

    
}
add_action('rest_api_init', 'registrar_rutas_rest_emi');

function getEmisiones($request)
{
    global $wpdb;
    $tabla_nombre = 'emisiones';
    $registros = $wpdb->get_results("SELECT * FROM $tabla_nombre", ARRAY_A);
    $response = new WP_REST_Response($registros);
    return $response;
}

function EditEmisiones($request)
{

    global $wpdb;
    $body = $request->get_body();
    $datos = json_decode($body, true);
    $datos['provincia'] = strtoupper($datos['provincia']);
    $tabla_nombre = 'emisiones';
    $valor_codigo = $datos['id'];
    $sql = "SELECT * FROM $tabla_nombre WHERE id='$valor_codigo' LIMIT 1";
    $consulta = $wpdb->get_row($sql, ARRAY_A);
    //unset($datos["fecha_registro"],$datos['id']);
    if (!$consulta) {
        return new WP_REST_Response("Error: No se encontró la iniciativa", 404);
    }
    // Añadir el valor actual de 'estado' al array de datos
    $datos['estado'] = 'ED';

    $formato = array('%s', '%s');
    $resultado = $wpdb->update(
        $tabla_nombre,
        $datos,
        ['id' => $valor_codigo],
        $formato
    );
    //var_dump($wpdb->last_error);
    if ($resultado !== false) {
        $response = new WP_REST_Response("Registro actulizado exitosamente");
        return $response;
    } else {
        $response = new WP_REST_Response("Error al actualizar el registro:", 400);
        return $response;
    }


}


function newEmision($request)
{
    global $wpdb;
    $body = $request->get_body();
    $datos = json_decode($body, true);
    $datos['provincia'] = strtoupper($datos['provincia']);
    $datos['estado'] = "ED";
    $formato = array('%s', '%s');
    //$currentDateTime = new DateTime('now'); 
    //$currentDate = $currentDateTime->format('Y-m-d');
    //$datos["fecha_registro"]=$currentDate;
    $resultado = $wpdb->insert(
        'emisiones',
        $datos,
        $formato
    );
    //var_dump($wpdb->last_error);
    if ($resultado !== false) {
        $response = new WP_REST_Response("Registro guardado exitosamente");
        return $response;
    } else {
        $response = new WP_REST_Response("Error al guardar el registro:", 400);
        return $response;
    }
}

function cargarEmisiones($request)
{
    global $wpdb;
    $body = $request->get_body();
    $datos = json_decode($body, true);
    $datos = array_map(function ($item) {
        $item['provincia'] = strtoupper($item['provincia']);
        return $item;
    }, $datos);
    foreach ($datos as $valores) {
        $valores['estado'] = "ED";
        $estado = $wpdb->insert(
            'emisiones',
            $valores,
        );
        //    var_dump($wpdb->last_error);
        if ($estado == false) {
            $respuesta = new WP_REST_Response("No se pudo guardar los datos", 400);
            return $respuesta;
        }
    }
    // Si todo sale bien
    $respuesta = new WP_REST_Response("Los datos fueron guardados correctamente");
    return $respuesta;
}

function searchConsolidar($request)
{
    global $wpdb;
    $parametros = $request->get_params();
    //var_dump($parametros);
    $tabla_nombre = 'emisiones';
    $where = [];
    $condicion = '';
    array_push($where, "id_iniciativa = '" . $parametros['iniciativa'] . "'");
    if ($parametros['anio'] == 'todos') {
    } else {
        array_push($where, "anio = '" . $parametros['anio'] . "'");
    }

    array_push($where, "estado='CF'");
    if (count($where) > 0) {
        $condicion = implode(" AND ", $where);
    }
    /*
    SELECT anio, SUM(metano_enterica) AS total_metano_enterica
FROM tu_tabla
GROUP BY anio;
    */
    $sql = '';
    if ($parametros['anio'] == 'todos') {
        $sql = "SELECT GROUP_CONCAT(finca SEPARATOR ', ') AS finca,anio,SUM(metano_enterica) as metano_enterica,SUM(metano_excretas) as metano_excretas,
        SUM(N2O_excretas) as N2O_excretas,SUM(N2O_pasturas) as N2O_pasturas ,SUM(total_emisiones) as total_emisiones,  estado FROM $tabla_nombre";
    } else {
        $sql = "SELECT finca,anio,metano_enterica,metano_excretas,N2O_excretas,N2O_pasturas,total_emisiones, estado FROM $tabla_nombre";

    }
    if (strlen($condicion) > 0) {
        $sql .= ' WHERE ' . $condicion;
    }
    if ($parametros['anio'] == 'todos') {
        $sql .= ' GROUP BY anio ';
    }
    $sql .= ' ORDER BY anio ASC ';
    $consulta = $wpdb->get_results($sql, ARRAY_A);
    if (!$consulta) {
        return new WP_REST_Response("Error: No se encontro emisiones", 404);
    } else {
        return new WP_REST_Response($consulta, 200);
    }

}
//Consolidar
function consolidarTodos($request){
    global $wpdb;
    $parametros = $request->get_params();
   // var_dump($parametros);
    $tabla_nombre ='emisiones';
    
    $condiciones = [];
    $condiciones['estado']= 'CF';
    $condiciones['id_iniciativa'] = $parametros['id_iniciativa'];
    if($parametros['anio'] == 'todos'){

    } else {
        $condiciones['anio'] = $parametros['anio'];
    }
    $registros = $wpdb->update(
        $tabla_nombre,
        ['estado' => 'CL'],
        $condiciones
    );

    if ($registros == false) {
        $response = new WP_REST_Response("Error al actualizar el registro:", 400);
        return $response;
    } else {
        $response = new WP_REST_Response("Registro actualizado exitosamente");
        return $response;
    }
}

/**
 * Método que aprueba una emisión
 */
function aprobarEmision($request)
{
    global $wpdb;
    $id = (string) $request['id'];
    $formato = array('%s', '%s');
    $resultado = $wpdb->update(
        'emisiones',
        ['estado' => 'CF'],
        ['id' => $id],
        $formato
    );
    if ($resultado !== false) {
        $response = new WP_REST_Response("Registro actualizado exitosamente");
        return $response;
    } else {
        $response = new WP_REST_Response("Error al actualizar el registro:", 400);
        return $response;
    }
}
function validarTodo($request)
{
    global $wpdb;
    //$tabla_nombre = 'emisiones';
    $formato = array('%s', '%s');
    $resultado = $wpdb->update(
        'emisiones',
        ['estado' => 'CF'],
        ['estado' => 'ED'],
        $formato
    );
    if ($resultado !== false) {
        $response = new WP_REST_Response("Se validó correctamente todos los registros");
        return $response;
    } else {
        $response = new WP_REST_Response("Error al validar todos los registro.", 400);
        return $response;
    }
}

function contarRegistros()
{
    global $wpdb;
    $tabla_nombre = 'emisiones';
    $registros = $wpdb->get_results("SELECT COUNT(*) FROM $tabla_nombre WHERE estado='ED'", ARRAY_A);
    $response = new WP_REST_Response($registros);
    return $response;
}

function fincaValidar($request)
{
    global $wpdb;
    $valorfinca = $request['finca'];
    $tabla_nombre = 'emisiones';
    $registros = $wpdb->get_results("SELECT finca FROM $tabla_nombre WHERE finca='$valorfinca'", ARRAY_A);
    $response = new WP_REST_Response($registros);
    return $response;

}

function consultarFincas()
{
    global $wpdb;
    $tabla_nombre = 'emisiones';
    $registros = $wpdb->get_results("SELECT finca FROM $tabla_nombre WHERE estado='ED' GROUP BY finca", ARRAY_A);
    $response = new WP_REST_Response($registros);
    return $response;
}

function consultarEmisionesPorFinca($request)
{
    global $wpdb;
    $valorfinca = $request['finca'];
    $tabla_nombre = 'emisiones';
    $registros = $wpdb->get_results("SELECT * FROM $tabla_nombre WHERE estado='ED' AND finca='$valorfinca'", ARRAY_A);
    $response = new WP_REST_Response($registros);
    return $response;
}

function validarEmisionesPorFinca($request)
{
    global $wpdb;
    $valorfinca = $request['finca'];
    $formato = array('%s', '%s');
    $resultado = $wpdb->update(
        'emisiones',
        ['estado' => 'CF'],
        ['estado' => 'ED', 'finca' => $valorfinca],
        $formato
    );
    if ($resultado !== false) {
        $response = new WP_REST_Response("Se validó correctamente la emisión emisiones por finca");
        return $response;
    } else {
        $response = new WP_REST_Response("Error al validar el registro.", 400);
        return $response;
    }
}


/*
 $finca = (string) $request['ficna'];
['estado' => 'ED',
'finca'=> $finca
]*/

?>