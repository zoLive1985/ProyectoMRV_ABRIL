<?php
/*
Plugin Name: Mediciones
Version: 1.0
Description:Pagina mediciones
*/


/**
 * Crea la tabla mediciones para activar el plugin
 *
 * @return void
 */
function incluir_fmedicion()
{
    $ruta_archivo = plugin_dir_path(__FILE__) . 'formulario_mediciones.php';
    if (file_exists($ruta_archivo)) {
        wp_register_script('modelo_medicion_js', plugin_dir_url(__FILE__) . 'assets/js/mediciones_model.js', array('jquery'), '1.0', true);
        wp_enqueue_script('modelo_medicion_js');
        wp_register_script('formulario_mediciones', plugin_dir_url(__FILE__) . 'assets/js/formulario_mediciones.js', array('jquery'), '1.0', true);
        wp_enqueue_script('formulario_mediciones');
        include $ruta_archivo;
    }

}

add_shortcode('formulario_medicion', 'incluir_fmedicion');

function incluir_listadoMediciones()
{
    $listado_visualizar = plugin_dir_path(__FILE__) . 'listado_mediciones.php';
    if (file_exists($listado_visualizar)) {
        wp_register_script('listado_mediciones_js', plugin_dir_url(__FILE__) . 'assets/js/listado_mediciones.js', array('jquery'), '1.0', true);
        wp_enqueue_script('listado_mediciones_js');
        include $listado_visualizar;
    }
}

add_shortcode('listado_mediciones', 'incluir_listadoMediciones');

//REST
function mediciones_rest()
{
    //consultar mediciones
    register_rest_route('mediciones/v1', '/mediciones', array(
        'methods' => 'GET',
        'callback' => 'getMediciones',
        'permission_callback' => function () {
            return true; }
    )
    );
    /*register_rest_route('mediciones/v1','/medicion',array(
        'methods' => 'POST',
        'callback' => 'newMedicion'
    ));*/
    // espacio_nombre/ruta
    /*register_rest_route('api_2','/cedulas',array(
        'methods' => 'POST',
        'callback' => 'newMedicion'
    ));*/

}

add_action('rest_api_init', 'mediciones_rest');

function getMediciones($request)
{
    // var_dump($request->get_params() );
    $parametros = $request->get_params(); // localhost/mediciones?nombre=stalin&id=43&apelliod=villacis
    /* $parametros = [
        'nombre' => "Staloi",
        'id' => 433,
        'apelliod' => "Villacis",
        'estado'=> "habilitado"
    ];*/
    $condiciones = [];
    if (isset($parametros['estado'])) {
        //$valor = ' estado = ' . $parametros['estado'];
        $valor = " estado = '".$parametros['estado']."' ";
        // $valor = 'estado = 'habilitado''
        array_push($condiciones, $valor);
    }
    if (isset($parametros['texto'])) {
        $valor = " codigo_finca = '".$parametros['texto']."' ";
        // $valor = 'estado = 'habilitado''
        array_push($condiciones, $valor);
    }
    if (isset($parametros['desde']) && isset($parametros['hasta'])) {
        $valor = " fecha BETWEEN '".$parametros['desde']."' AND '".$parametros['hasta']."' ";
        // $valor = 'estado = 'habilitado''
        array_push($condiciones, $valor);
    }
    /*
    $condicioones = [
        'estado = 'habilitado',
        'anio_medicion' = 2023
    ];
     */
    // Luego de todas las condiciones
    $resultadoCondiciones = implode(' AND ', $condiciones);
    // $resultadoCondiciones = "estado='habilitado' AND anio_medicion=2023 "
    // SELECT * FROM tabla_nombre WHERE estado='habilitado';
    global $wpdb;
    $tabla_nombre = 'mediciones';
    $query = "SELECT * FROM $tabla_nombre ";
    if (strlen($resultadoCondiciones) > 0) {
        $query .= " WHERE ".$resultadoCondiciones;
    }
    $registros = $wpdb->get_results($query, ARRAY_A);
    $response = new WP_REST_Response($registros);
    return $response;
}
