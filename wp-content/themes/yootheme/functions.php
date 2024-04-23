<?php

/**
 * Boostrap theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions
 * 
 * 
 *
 */


$app = require 'bootstrap.php';
$app->load(__DIR__ . '/{vendor/yootheme/{platform-wordpress,theme{,-analytics,-cookie,-highlight,-settings,-wordpress*},styler,builder{,-source*,-templates,-newsletter,-wordpress*}}/bootstrap.php,config.php}');

/**
 * Fire the wp_body_open action.
 *
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if (!function_exists('wp_body_open')) {
    function wp_body_open() {
        do_action('wp_body_open');
    }
}


/*
function mostrar_datos_tabla($atts) {
    // Configura los parámetros del shortcode
    $atts = shortcode_atts(array(
        'tabla' => 'catastro_fincas', // Nombre de la tabla en la base de datos
    ), $atts);

    // Verifica si se proporcionó un nombre de tabla
    if (empty($atts['tabla'])) {
        return 'Por favor, proporciona el nombre de la tabla.';
    }

    // Conecta a la base de datos de WordPress
    global $wpdb;

    // Obtén los datos de la tabla
    $tabla = $wpdb->prefix . $atts['tabla'];
    $nombreFinca = $_POST['nombre'];
    $resultados = $wpdb->get_results("SELECT * FROM catastro_fincas");

    // Genera el contenido HTML para mostrar los datos
    $output = '<table>';
    $output .= '<tr><th>ID</th><th>Finca</th><th>Región</th></tr>'; // Reemplaza con los nombres de tus columnas

    foreach ($resultados as $fila) {
        $output .= '<tr>';
        $output .= '<td>' . $fila->id_catastro_finca . '</td>';
        $output .= '<td>' . $fila->nombre_finca . '</td>'; // Reemplaza con el nombre de tus columnas
        $output .= '<td>' . $fila->region . '</td>'; // Reemplaza con el nombre de tus columnas
        $output .= '</tr>';
    }

    $output .= '</table>';



    return $output;



}

add_shortcode('mostrar_tabla', 'mostrar_datos_tabla');
// [mostrar_tabla tabla="nombre_de_la_tabla"]
//---------------------------------------------------------


//---------------------------insertar un archivo js-----

/*function arch_insert_js(){
    wp_register_script('catastro',get_stylesheet_directory_uri().'./catastro_finca.js',array('jquery'),'1',true);
    wp_enqueue_script('catastro');
}
add_action ("wp_enqueue_scripts","arch_insert_js");*/


//add_shortcode('mostrar_panel_busqueda', 'mostrarPanelBusqueda');

// [wp_enqueue_scripts tabla="arch_insert_js"]




//-------------------------insertar un archivo php-------

/*function arch_insert_php(){
    wp_enqueue_style('catastrophp',get_stylesheet_directory_uri().'./catastro_finca.php');
   
}*/
/*add_action("wp_enqueue_scripts","arch_insert_php");*/



//------------Busqueda -----------------

/*add_shortcode('mostrar_panel_busqueda', 'mostrarPanelBusqueda');

// [mostrar_panel_busqueda tabla="mostrarPanelBusqueda"]
*//*

/*function mostrarPanelBusqueda($atts){
  
    $atts = shortcode_atts(array(
        'tabla' => 'catastro_fincas', // Nombre de la tabla en la base de datos
    ), $atts);
   $contenido = '';
    if( isset($_POST['nombre']) ){
        echo '<h1>Su nombres: </h1'.$_POST['nombre'];
    }
    
    $contenido .='<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row">
                   
                    <div class="col">
                        <!--Nombre Finca-->
                        <div class="form-floating mb-3">
                            <input class="form-control input-sm" type="text" id="nom_finca" >
                            <label for="nom_finca">Nombre Finca</label>  
                        </div>
                    </div>
                    <div class="col">          
                        <!--Alimento-->
                       <div class="form-floating mb-3">
                               <select class="form-select"  id="alimento" >
                                   <option  value="null" selected>Ninguno</option>
                                   <option value="Carne">Carne</option>
                                   <option value="Leche">Leche</option>
                               </select>
                               <label for="alimento">Alimento</label>
                       </div>   
                    </div>
                    <div class="col">
                        <!--Regiones-->
                        <div class="form-floating mb-3">
                            <select  class="form-select" id="regiones">
                                <option value="null" selected>Ninguno</option>
                                <option value="COSTA">Costa</option>
                                <option value="SIERRA">Sierra</option>
                                <option value="AMAZONIA">Amazonia</option>
                            </select>
                            <label for="regiones">Region</label>
                        </div>
                    </div>
                   
                    <div class="col">
                        <!-- Especimen -->
                        <div class="form-floating mb-3">
                            <select class="form-select" id="especimen" style="width:200px" >
                                    <option value="null"selected>Ninguno</option>
                                    <option value="terneras">Terneras</option>
                                    <option value="terneros">Teneros</option>
                                    <option value="vaconas">Vaconas</option>
                                    <option value="toretes">Toretes</option>
                                    <option value="vacas">Vacas</option>
                                    <option value="toros">Toros</option>
                            </select>
                            <label for="especimen">Categoría de ganado:</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <h6> <small class="text-muted">Cantidad de animales:</small> </h6>  
                    </div>
                    <div class="col-1">
                        <!--Maximo y minimo-->  
                        
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" value="0" min="0" id="min">
                            <Label for="min">Desde</Label>
                        </div>  
                    </div> 
                    <div class="col-1">
                       
                        <div class="form-floating mb-3">
                             <input class="form-control" type="number" value="0" min="0" id="max" >
                             <Label for="min">Hasta</Label>
                        </div>
                    </div>
                    <div class="col">
                        <!--Boton Buscar-->
                        <button class="btn btn-primary" id="buscar"><i class="bi bi-search btn-xsm"></i></button>           
                        <!--Boton reset-->
                        <button class="btn btn-primary" id="reset"><i class="bi bi-arrow-clockwise btn-xsm"></i>  </button> 
                        <!--Boton Descargar -->
                        <button class="btn btn-primary" id="descargar"><i class="bi bi-arrow-down-circle btn-xsm" ></i> </button>                
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>';
    return $contenido;
}

add_shortcode('mostrar_panel_busqueda', 'mostrarPanelBusqueda');

// [mostrar_panel_busqueda tabla="mostrarPanelBusqueda"]
*//*
function agregar_mi_script() {
    wp_enqueue_script('mi-script', get_template_directory_uri() . 'C:/xampp/htdocs/esteveza/catastro_finca.js', array('jquery'), null, true);
     
}

add_action('wp_enqueue_scripts', 'agregar_mi_script');
*/
add_filter( 'the_title', 'remove_home_page_title', 10, 2 );
function remove_home_page_title( $title, $id ) {
    
	if ( is_front_page() ){
		$home_id = get_option('page_on_front');
		if ( $home_id == $id ) return '';	
	}
   
	return $title;	
}

/* function incluir_paginicitivas_pec($pagina)
{
    
    if(is_page('inicitivas_pecuariascont')){
    $pagina = get_template_directory() . 'http://localhost/esteveza/inicitivas_pecuariascont.php';
    echo "la pagina"+ $pagina;
    }
    else{
        echo "no se puede mostrar la pagina hola";
    }
    return $pagina;
}

add_shortcode('pagina_inipec', 'incluir_paginicitivas_pec'); */

function incluir_pag()
{
    $ruta_archivo = __DIR__.'/inicitivas_pecuariascont.php';
   // echo "ruta:" +$ruta_archivo;
    if (file_exists($ruta_archivo)) {
            include $ruta_archivo;
    }
    else{
        echo"no aparece la pagina";
    }
  
}
add_shortcode('pagina_inipec', 'incluir_pag');

