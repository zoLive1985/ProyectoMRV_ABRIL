<?php
/*
Plugin Name: Finca
Version: 1.0
Description:Pagina Finca
*/
//register_activation_hook(__FILE__, 'tabla_fincas');

/**
 * Crea la tabla fincas para activar el plugin
 *
 * @return void
 */
function incluir_formulario_fincas(){
    $ruta_archivo = plugin_dir_path(__FILE__) . 'formulario.php';
    if (file_exists($ruta_archivo)) {
        wp_register_script('modelo_finca_model_js', plugin_dir_url(__FILE__) . 'assets/js/finca_model.js', array('jquery'), '1.0', true);
        wp_enqueue_script('modelo_finca_model_js');
        include $ruta_archivo;
        wp_register_script('formulario_js', plugin_dir_url(__FILE__) . 'assets/js/formulario.js', array('jquery'), '1.0', true);
        wp_enqueue_script('formulario_js');
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'css/estilo.css');
        wp_enqueue_style('estilo');
    }
}
add_shortcode('formulario_guardar_fincas', 'incluir_formulario_fincas');

function incluir_listado_fincas()
{
    $listado_visualizar = plugin_dir_path(__FILE__) . 'listado_finca.php';
    if (file_exists($listado_visualizar)) {
        wp_register_script('listado_finca_js', plugin_dir_url(__FILE__) . 'assets/js/listado_fincas.js', array('jquery'), '1.0', true);
        wp_enqueue_script('listado_finca_js');
        include $listado_visualizar;
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'css/estilo.css');
        wp_enqueue_style('estilo');
    
       
    }

}
add_shortcode('listado_visualizacion_fincas', 'incluir_listado_fincas');

function mostrar_finca(){
    $ruta_archivo_ver_finca = plugin_dir_path(__FILE__) . 'ver_fincas.php';
    //   var_dump($ruta_archivo_ver_finca);
    if (file_exists($ruta_archivo_ver_finca)) {
        include $ruta_archivo_ver_finca;
        wp_register_script('ver_fincas', plugin_dir_url(__FILE__) . 'assets/js/ver_fincas.js', array('jquery'), '1.0', true);
        wp_enqueue_script('ver_fincas');
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'css/estilo.css');
        wp_enqueue_style('estilo');
    } else {
        echo "No existe el archivo";
    }
}
add_shortcode('alias_ver_finca', 'mostrar_finca');

function editar_finca(){
    $ruta_archivo_editar = plugin_dir_path(__FILE__) . 'editar_finca.php';
    if(file_exists($ruta_archivo_editar)){
        // Agregamos el modelo
        wp_register_script('modelo_finca_js', plugin_dir_url(__FILE__) . 'assets/js/finca_model.js', array('jquery'), '1.0', true);
        wp_enqueue_script('modelo_finca_js');
        include $ruta_archivo_editar;
        // Agregamos los archivos JavaScript para el formulario
        wp_register_script('formulario_editar_js', plugin_dir_url(__FILE__) . 'assets/js/formulario_editar_finca.js', array('jquery'), '1.0', true);
        wp_enqueue_script('formulario_editar_js');
        wp_register_style('estilo', plugin_dir_url(__FILE__) . 'css/estilo.css');
        wp_enqueue_style('estilo');
    }else{
        echo "No existe el archivo";
    }
}
add_shortcode('alias_editar_finca', 'editar_finca');
 function shortcode_pagina_incluida_fincas()
{
    ob_start(); // Captura la salida

    incluir_formulario_fincas(); // Llama a la función que incluye la página
    incluir_listado_fincas();
   wp_enqueue_script('');

    return ob_get_clean(); // Retorna el contenido capturado
}
add_shortcode('shortcode_pagina_incluida_fincas', 'shortcode_pagina_incluida_fincas');  
function registrar_rutas_rest_finca(){

    //Consultar fincas
    register_rest_route(
        'fincas/v1',
        '/finca',
        array(
            'methods' => 'GET',
            'callback' => 'getFincas',
            'permission_callback' => function () {
                return true;
            }
        )
    );

    //Guardar una finca
    register_rest_route(
        'fincas/v1',
        '/savefinca',
        array(
            'methods' => 'POST',
            'callback' => 'newFinca'
        )
        
        );
    //editar_finca
        register_rest_route(
            'fincas/v1',
            'edit_finca',
            array(
                'methods' => 'PUT',
                'callback' => 'EditFincas',
                'permission_callback' => function(){
                    return true;
                }
            )
        );

        //mapa
        /*register_rest_route(
            'fincas/v1', 
            '/mapas', 
            array(
                'methods' => 'GET',
                'callback' => 'Mapas',
                'permission_callback' => function () {
                    return true;
                }
            )
         );*/

        //Cargar Archivo
        //fincas/v1/cargarfincas
    register_rest_route(
        'fincas/v1', 
        '/cargarfincas', 
        array(
        'methods' => 'POST',
        'callback' => 'cargarFincas'
    ));
    

}
add_action('rest_api_init', 'registrar_rutas_rest_finca');

function getFincas($request)
{
    global $wpdb;
    $tabla_nombre = 'fincas';
    $registro = $wpdb->get_results("SELECT * FROM $tabla_nombre",ARRAY_A);
    $response = new WP_REST_Response($registro);
    return $response;
}

function EditFincas($request){
    global $wpdb;
    $body = $request->get_body();
    $datos = json_decode($body, true);
    //var_dump($datos);
    $datos['provincia'] = strtoupper($datos['provincia']);  
  //  var_dump($datos['provincia']);  
    $tabla_nombre = 'fincas';
    $valor_codigo = $datos['id'];
    $sql = "SELECT * FROM $tabla_nombre WHERE id='$valor_codigo' LIMIT 1";
    $consulta = $wpdb->get_row($sql, ARRAY_A);
    unset($datos["fecha_registro"],$datos['id'], $datos['geopoint']);
    
    if (!$consulta) {
        return new WP_REST_Response("Error: No se encontró la iniciativa", 404);
    }
    $formato = array('%s', '%s');
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

function newFinca($request)
{
    global $wpdb;
    $body = $request->get_body();
    $datos = json_decode($body, true);
    $datos['provincia']= strtoupper($datos['provincia']);
    // Validar si el código ya existe.
    $tabla = 'fincas';

    $valor_codigo = $datos['codigo_finca'];
    $sql = "SELECT * FROM $tabla WHERE codigo_finca='$valor_codigo' LIMIT 1";
    $consulta = $wpdb->get_row($sql, ARRAY_A);
    if (is_array($consulta)) {
        $response = new WP_REST_Response("El código ya existe.", 400);
        return $response;
    }
    $formato = array('%s', '%s');
    $currentDateTime = new DateTime('now'); 
    $currentDate = $currentDateTime->format('Y-m-d');
    $datos["fecha_registro"]=$currentDate;
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
/*function Mapas($request){
    global $wpdb;
    $body = $request->get_body();
    $datos = json_decode($body, true);
    $tabla_nombre = 'fincas';
    $valor_codigo = $datos['id'];
    $registro = $wpdb->get_results("SELECT * FROM $tabla_nombre",ARRAY_A);
    $response = new WP_REST_Response($registro);
    return $response;
 
    

}*/
function cargarFincas($request)
{
    global $wpdb;
    $body = $request->get_body();
    $datos = json_decode($body, true);
    $datos = array_map(function($item){
        $item['provincia'] = strtoupper($item['provincia']);
        return $item;
    },$datos);
    foreach ($datos as $valores) {
        //var_dump($valores);
        $estado = $wpdb->insert(
            'fincas',
            $valores
        );
       // var_dump($wpdb->last_error);
        if ($estado == false) {
            $respuesta = new WP_REST_Response("No se pudo guardar los datos", 400);
            return $respuesta;
        }
    }
    // Si todo sale bien
    $respuesta = new WP_REST_Response("Los datos fueron guardados correctamente");
    return $respuesta;
} 