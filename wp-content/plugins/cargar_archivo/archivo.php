<?php
/*
Plugin Name: Cargar Archivo
Version: 1.0
Description:Pagina para cargar archivos
*/


/**
 * 
 *
 * @return void
 */

function incluir_archivo(){
    $ruta_archivo = plugin_dir_path(__FILE__) . 'formulario_archivo.php';
    if(file_exists($ruta_archivo)){
        wp_register_script('formulario_archivo', plugin_dir_url(__FILE__) . 'assets/js/script_cargar.js', array('jquery'), '1.0', true);
        wp_enqueue_script('formulario_archivo');
        include $ruta_archivo;
    }
}

add_shortcode('formulario_archivo','incluir_archivo');


?>