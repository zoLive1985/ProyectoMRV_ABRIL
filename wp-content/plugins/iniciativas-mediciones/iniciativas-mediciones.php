<?php
/*
Plugin Name: Iniciativas y mediciones
Version: 1.0
Description: Un plugin personalizado para agregar y mostrar registros en una tabla.
*/

register_activation_hook(__FILE__, 'crear_iniciativas');

/**
 * Crea la tabla iniciativas para activar el plugin
 *
 * @return void
 */
function crear_iniciativas()
{
      global $wpdb;
      $tableName = $wpdb->prefix . 'iniciativas';
      $query = "CREATE TABLE IF NOT EXISTS $tableName (
            id INT NOT NULL AUTO_INCREMENT,
            nombre VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            PRIMARY KEY (id)
        )";
      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($query);
}

function cargar_estilos()
{
      wp_register_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
      wp_register_style('bootstrap-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css');
      wp_enqueue_style('bootstrap-style');
      wp_enqueue_style('bootstrap-icon');
}
//add_action('wp_enqueue_scripts', 'cargar_estilos');

function cargar_scripts()
{
      wp_register_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
      wp_register_script('sweetalert', 'https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js', array('jquery'), '1.0', true);
      wp_register_script('jspdf', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js', array('jquery'), '1.0', true);
      wp_register_script('jspdf-autotable', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.min.js', array('jquery'), '1.0', true);
      wp_register_script('historial-emisiones', plugin_dir_url(__FILE__) . 'js/historial_emisiones.js', array('jquery'), '1.0', true);
      wp_enqueue_script('bootstrap-bundle');
      wp_enqueue_script('sweetalert');
      wp_enqueue_script('jspdf');
      wp_enqueue_script('jspdf-autotable');
      wp_enqueue_script('historial-emisiones');
}
//add_action('wp_enqueue_scripts', 'cargar_scripts');

function mostrar_formulario_registro()
{
      if (isset($_POST['submit'])) {
            global $wpdb;
            $tabla_nombre = $wpdb->prefix . 'iniciativas';
            $nombre = sanitize_text_field($_POST['nombre']);
            $email = sanitize_email($_POST['email']);

            $wpdb->insert(
                  $tabla_nombre,
                  array(
                        'nombre' => $nombre,
                        'email' => $email
                  )
            );

            echo "Registro agregado exitosamente.";
      }
      if (isset($_POST['guardar_edicion'])) {
            global $wpdb;
            $tabla_nombre = $wpdb->prefix . 'iniciativas';
            $id = sanitize_text_field($_POST['id']);
            $nombre = sanitize_text_field($_POST['nombre']);
            $email = sanitize_email($_POST['email']);
            $datos = array(
                  'nombre' => $nombre,
                  'email' => $email
            );
            $donde = array('id' => $id);
            // Formatos para cadena
            $formatoContenido = array('%s', '%s');
            // Formato condicion
            $formatoDonde = array('%d');
            $resultado = $wpdb->update($tabla_nombre, $datos, $donde, $formatoContenido, $formatoDonde);
            if ($resultado !== false) {
                  echo 'Registro actualizado con éxito.';
            } else {
                  echo 'Error al actualizar el registro: ' . $wpdb->last_error;
            }
      }
      ?>

      <form method="post" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <input type="submit" name="submit" value="Agregar Registro">
      </form>

      <?php
      if (isset($_GET['editar_registro'])) {
            $id = intval($_GET['editar_registro']);
            mostrar_formulario_de_edicion($id);
      }
}


function mostrar_formulario_de_edicion($registro_id)
{
      global $wpdb;
      $tabla_nombre = $wpdb->prefix . 'iniciativas';
      $registro = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tabla_nombre WHERE id = %d", $registro_id), ARRAY_A);

      if ($registro) {
            // Muestra el formulario de edición con los datos del registro.
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="id" value="' . $registro['id'] . '" />';
            echo '<input type="text" name="nombre" value="' . $registro['nombre'] . '">';
            echo '<input type="text" name="email" value="' . $registro['email'] . '">';
            echo '<input type="submit" name="guardar_edicion" value="Guardar Cambios">';
            echo '</form>';
      } else {
            //var_dump($_GET);
            //var_dump($registro_id);
            echo 'Registro no encontrado.';
      }
}




function mostrar_registros()
{
      global $wpdb;
      $tabla_nombre = $wpdb->prefix . 'iniciativas';
      $registros = $wpdb->get_results("SELECT * FROM $tabla_nombre", ARRAY_A);

      if (!empty($registros)) {
            echo '<table>';
            echo '<tr><th>ID</th><th>Nombre</th><th>Correo</th></tr>';
            foreach ($registros as $registro) {
                  echo '<tr>';
                  echo '<td>' . $registro['id'] . '</td>';
                  echo '<td>' . $registro['nombre'] . '</td>';
                  echo '<td>' . $registro['email'] . '</td>';
                  echo '<td><a href="' . esc_url(add_query_arg(array('editar_registro' => $registro['id']), $_SERVER['REQUEST_URI'])) . '">Editar</a></td>';
                  echo '</tr>';
            }
            echo '</table>';
      } else {
            echo 'No se encontraron registros.';
      }
}

// Acción para mostrar el formulario en una página
add_shortcode('formulario_registro', 'mostrar_formulario_registro');
add_shortcode('mostrar_registros', 'mostrar_registros');


function incluir_historial_emisiones()
{
      $ruta_archivo = plugin_dir_path(__FILE__) . 'historial_emisiones.php';
      if (file_exists($ruta_archivo)) {
            include $ruta_archivo;
      }
}
function shortcode_pagina_incluida()
{
      ob_start(); // Captura la salida

      incluir_historial_emisiones(); // Llama a la función que incluye la página
      wp_register_script('historial-emisiones', plugin_dir_url(__FILE__) . 'js/historial_emisiones.js', array('jquery'), '1.0', true);
      wp_enqueue_script('historial-emisiones');

      return ob_get_clean(); // Retorna el contenido capturado
}
add_shortcode('mostrar_pagina_incluida', 'shortcode_pagina_incluida');