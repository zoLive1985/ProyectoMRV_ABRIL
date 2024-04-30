<?php
/*
Plugin Name: Iniciativa
Version: 1.0
Description:Pagina Inicitivas
*/
//register_activation_hook(__FILE__, 'tabla_iniciativas');

/**
 * Crea la tabla iniciativas para activar el plugin
 *
 * @return void
 */


function incluir_formulario()
{
    $ruta_archivo = plugin_dir_path(__FILE__) . 'formulario.php';
    if (file_exists($ruta_archivo)) {
        wp_register_script('modelo_iniciativa_js', plugin_dir_url(__FILE__) . 'assets/js/iniciativa_model.js', array('jquery'), '1.0', true);
        wp_enqueue_script('modelo_iniciativa_js');
        include $ruta_archivo;
        wp_register_script('formulario_js', plugin_dir_url(__FILE__) . 'assets/js/formulario.js', array('jquery'), '1.0', true);
        wp_enqueue_script('formulario_js');
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'assets/css/estilo.css');
        wp_enqueue_style('estilo');
    }

}

add_shortcode('formulario_guardar_iniciativa', 'incluir_formulario');

function incluir_listado()
{
    $listado_visualizar = plugin_dir_path(__FILE__) . 'listado_iniciativas.php';
    if (file_exists($listado_visualizar)) {
        wp_register_script('listado_iniciativas_js', plugin_dir_url(__FILE__) . 'assets/js/listado_iniciativas.js', array('jquery'), '1.0', true);
        wp_enqueue_script('listado_iniciativas_js');
        include $listado_visualizar;
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'assets/css/estilo.css');
        wp_enqueue_style('estilo');
    }
}

add_shortcode('listado_visualizacion', 'incluir_listado');

function mostrar_iniciativa()
{
    $ruta_archivo_ver_inicitiva = plugin_dir_path(__FILE__) . 'ver_iniciativa.php';
    //   var_dump($ruta_archivo_ver_inicitiva);
    if (file_exists($ruta_archivo_ver_inicitiva)) {
        include $ruta_archivo_ver_inicitiva;
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'assets/css/estilo.css');
        wp_enqueue_style('estilo');
    } else {
        echo "No existe el archivo";
    }
}
add_shortcode('alias_ver_iniciativa', 'mostrar_iniciativa');

function editar_iniciativa(){
    $ruta_archivo_editar = plugin_dir_path(__FILE__) . 'editar_iniciativas.php';
    if(file_exists($ruta_archivo_editar)){
        // Agregamos el modelo
        wp_register_script('modelo_iniciativa_js', plugin_dir_url(__FILE__) . 'assets/js/iniciativa_model.js', array('jquery'), '1.0', true);
        wp_enqueue_script('modelo_iniciativa_js');
        include $ruta_archivo_editar;
        // Agregamos los archivos JavaScript para el formulario
        wp_register_script('formulario_editar_js', plugin_dir_url(__FILE__) . 'assets/js/formulario.editar.js', array('jquery'), '1.0', true);
        wp_enqueue_script('formulario_editar_js');
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'assets/css/estilo.css');
        wp_enqueue_style('estilo');
    }else{
        echo "No existe el archivo";
    }

}
add_shortcode('alias_editar_iniciativa', 'editar_iniciativa');
function shortcode_pagina_incluida()
{
    ob_start(); // Captura la salida

    incluir_formulario(); // Llama a la función que incluye la página
    incluir_listado();
    wp_enqueue_script('');

    return ob_get_clean(); // Retorna el contenido capturado
}
add_shortcode('shortcode_pagina_incluida', 'shortcode_pagina_incluida');


// REST 
function registrar_rutas_rest()
{
    // Consultar iniciativas
    register_rest_route(
        'iniciativas/v1',
        '/iniciativas',
        array(
            'methods' => 'GET',
            'callback' => 'getIniciativas',
            'permission_callback' => function () {
                return true;
            }
        )
    );
    //Cargar la ndc
    register_rest_route(
        'iniciativas/v1',
        '/iniciativa/(?P<ndc>[a-zA-Z0-9-]+)',
        array(
            'methods' => 'GET',
            'callback' => 'getIniciativa',
            'permission_callback' => function () {
                return true;
            }
        )
    );
    //cargar anio
    register_rest_route(
        'iniciativas/v1',
        '/iniciativa_por_anio/(?P<id_iniciativa>[a-zA-Z0-9-]+)',
        array(
            'methods' => 'GET',
            'callback' => 'getAnio',
            'permission_callback' => function () {
                return true;
            }
        )
    );
    //cargar ALL años
    register_rest_route(
        'iniciativas/v1',
        '/iniciativaTodoanios/(?P<id_iniciativa>[a-zA-Z0-9-]+)',
        array(
            'methods' => 'GET',
            'callback' => 'getTodoanios',
            'permission_callback' => function () {
                return true;
            }
        )
    );
    

    // Guardar una iniciativa
    register_rest_route(
        'iniciativas/v1',
        '/iniciativa',
        array(
            'methods' => 'POST',
            'callback' => 'newIniciativa'
        )
    );

    //editar_iniciativas
    register_rest_route(
        'iniciativas/v1',
        'edit_iniciativa',
        array(
            'methods' => 'PUT',
            'callback' => 'EditIniciativas',
            'permission_callback' => function () {
                return true;
            }
        )
    );

    //Cargar Archivo
    register_rest_route('iniciativas/v1', '/iniciativas', array(
        'methods' => 'POST',
        'callback' => 'cargarIniciativa'
    ));

   
}
add_action('rest_api_init', 'registrar_rutas_rest');
function getIniciativas($request)
{
    global $wpdb;
    $tabla_nombre = 'iniciativas';
    $registros = $wpdb->get_results("SELECT * FROM $tabla_nombre", ARRAY_A);
    $response = new WP_REST_Response($registros);
    return $response;
}

function getIniciativa($request){
    global $wpdb;
    $parametros = $request->get_params();
    $tabla_nombre = 'iniciativas';
    $valor_ndc = $parametros['ndc'];
    $registros = $wpdb->get_results("SELECT * FROM $tabla_nombre WHERE ndc='$valor_ndc'", ARRAY_A);
    $response = new WP_REST_Response($registros);
    return $response;

}
function getAnio($request){
    global $wpdb;
    $parametros = $request->get_params();
    $tabla_nombre ='emisiones';
    $valor_ini = $parametros['id_iniciativa'];
    $registros = $wpdb->get_results("SELECT anio, estado FROM $tabla_nombre WHERE id_iniciativa ='$valor_ini' AND estado='CF' GROUP BY anio ORDER BY anio ASC",ARRAY_A);
    $reponse = new WP_REST_Response($registros);
    // var_dump($reponse);
    return $reponse;


}
function getTodoanios($request){

    global $wpdb;
    $parametros = $request->get_params();
    //var_dump($parametros);
    $tabla_nombre = 'emisiones';
    $where = [];
    $condicion = '';
    array_push($where, "id_iniciativa = '" . $parametros['iniciativa'] . "'");
    array_push($where, "anio = '" . $parametros['anio'] . "'");
    array_push($where, "estado='CF'");
    if (count($where) > 0) {
        $condicion = implode(" AND ", $where);
    }
    $sql = "SELECT finca, metano_enterica,metano_excretas,N2O_excretas,N2O_pasturas,total_emisiones,  estado FROM $tabla_nombre";
    if (strlen($condicion) > 0) {
        $sql .= ' WHERE ' . $condicion;
    }
    $consulta = $wpdb->get_results($sql, ARRAY_A);
    if (!$consulta) {
        return new WP_REST_Response("Error: No se encontro emisiones", 404);
    } else {
        return new WP_REST_Response($consulta, 200);
    }
    
   // SELECT anio FROM `emisiones` WHERE id_iniciativa='101'AND estado='CF';
}
function EditIniciativas($request){
    global $wpdb;
    $body = $request->get_body();
    $datos = json_decode($body, true);
   // $datos['linea_accion'] = preg_replace(['/[^a-zA-Z\s()-ñÑ]/u', '/[áéíóúÁÉÍÓÚ]/'], ['', ''], $datos['linea_accion']);
    $tabla_nombre = 'iniciativas';
    $valor_codigo = $datos['id'];
    $sql = "SELECT * FROM $tabla_nombre WHERE id='$valor_codigo' LIMIT 1";
    $consulta = $wpdb->get_row($sql, ARRAY_A);
    unset($datos["fecha_registro"],$datos['id']);
    
    if (!$consulta) {
        return new WP_REST_Response("Error: No se encontró la iniciativa", 404);
    }
    $formato = array('%s', '%s');
    
    $datos["objetivo_desarrollo"]=json_encode($datos["objetivo_desarrollo"]);
    
    $resultado = $wpdb->update(
        $tabla_nombre,
        $datos,
        ['id' => $valor_codigo],
        $formato
    );
    if ($resultado !== false) {
        $response = new WP_REST_Response("Registro actulizado exitosamente");
        return $response;
    } else {
        $response = new WP_REST_Response("Error al actualizar el registro:", 400);
        return $response;
    } 
    
}

function newIniciativa($request)
{
    global $wpdb;
    $body = $request->get_body();
    $datos = json_decode($body, true);
    $tabla = 'iniciativas';
    $valor_codigo = $datos['codigo'];
    $sql = "SELECT * FROM $tabla WHERE codigo='$valor_codigo' LIMIT 1";
    $consulta = $wpdb->get_row($sql, ARRAY_A);
    if (is_array($consulta)) {
        $response = new WP_REST_Response("El código ya existe.", 400);
        return $response;
    }
    $formato = array('%s', '%s');
    $currentDateTime = new DateTime('now'); 
    $currentDate = $currentDateTime->format('Y-m-d');
    $datos["fecha_registro"]=$currentDate;
    $datos["objetivo_desarrollo"]=json_encode($datos["objetivo_desarrollo"]);
    $resultado = $wpdb->insert(
        $tabla,
        $datos,
        $formato
    );
    if ($resultado !== false) {
        $response = new WP_REST_Response("Registro guardado exitosamente");
        return $response;
    } else {
        $response = new WP_REST_Response("Error al guardar el registro:", 400);
        return $response;
    }
}


function cargarIniciativa($request)
{
    global $wpdb;
    $body = $request->get_body();
    $datos = json_decode($body, true);
    $datos = array_map(function ($item){
        $item['ndc'] = ($item['ndc'] == "2020-2025" )? 0:1;
       // var_dump($item);
        return $item;
    },$datos);
    foreach ($datos as $valores) {
        //var_dump($valores);
        $estado = $wpdb->insert(
            'iniciativas',
            $valores
        );
        if ($estado == false) {
            $respuesta = new WP_REST_Response("No se pudo guardar los datos", 400);
            return $respuesta;
        }
    }
    // Si todo sale bien
    $respuesta = new WP_REST_Response("Los datos fueron guardados correctamente");
    return $respuesta;
}

