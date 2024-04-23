"use strict";
$(function () {
  $("#codigo_finca, #canton, #parroquia, #nombre_propietario, #asociacion").on("keypress", function(event){
    var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9.,()\\s ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
   // console.log(event);
  });
  
  $("#guardar").on("click", function (event) {
    let modeloFinca = new FincaModel();
    modeloFinca.codigo_finca = $("#codigo_finca").val();
    modeloFinca.provincia = $("#provincia option:selected").text().trim();
    modeloFinca.canton = $("#canton").val();
    modeloFinca.parroquia = $("#parroquia").val();
    modeloFinca.nombre_propietario = $("#nombre_propietario").val();
    modeloFinca.telefono = $("#telefono").val();
    modeloFinca.asociacion = $("#asociacion").val();
    modeloFinca.nombre_predio = $("#nombre_predio").val();
    modeloFinca.geopoint = $("#geopoint").val();
    modeloFinca.geopoint_latitude = $("#geopoint_latitude").val();
    modeloFinca.geopoint_longitude = $("#geopoint_longitude").val();
    modeloFinca.geopoint_altitude = $("#geopoint_altitude").val();
    modeloFinca.geopoint_precision = $("#geopoint_precision").val();
    modeloFinca.info_coordenadaX = $("#info_coordenadaX").val();
    modeloFinca.info_coordenadaY = $("#info_coordenadaY").val();
    modeloFinca.info_altitud = $("#info_altitud").val();
      
      
    let apiUrl =
      window.location.origin + "/esteveza/wp-json/fincas/v1/savefinca";
    Swal.fire({
      title: "Guardando",
      html: "Por favor espere...",
      allowEscapeKey: false,
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
        
      },
    });

    axios
      .post(apiUrl, modeloFinca)
      .then((res) => {
        if (res.statusText === "OK") {
          Swal.fire(res.data);
          $("#formulario_finca").trigger("reset");
        }
      })
      .catch((err) => {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: err.response.data,
        });
      });
  });

  // Subir registros por archivo CSV
  // Escucha el evento click del botón Cargar CSV
  $("#cargar").on("click", function () {
    // Obtenemos el contenido del archivo CSV
    const fileInput = $("#csv-file")[0];
    // console.log(fileInput.files);
    if (fileInput.files.length > 0) {
      const file = fileInput.files[0];
      //  console.log(file);
      const reader = new FileReader();
      reader.onload = leerArchivo;
      reader.readAsText(file);
    } else {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "No se ha seleccionado un archivo",
      });
    }
  });
 });
// Funcion que lee el archivo CSV y genera un arreglo de objetos que serán enviados a la API
function leerArchivo(evento) {
  const datosCSV = evento.target.result;
  const filas = datosCSV.split('\n');
  let fincas = [];
  filas.forEach(fila => {
    //console.log("elemento:",fila);
    const columnas =fila.split(',');
    let finca = {};
    finca.codigo_finca = columnas[0];
    finca.provincia = columnas[1];
    finca.canton = columnas[2];
    finca.parroquia = columnas[3];
    finca.nombre_propietario = columnas[4];
    finca.telefono = columnas[5];
    finca.asociacion = columnas[6];
    finca.nombre_predio = columnas[7];
    finca.geopoint = columnas[8];
    finca.geopoint_latitude = columnas[9];
    finca.geopoint_longitude = columnas[10];
    finca.geopoint_altitude = columnas[11];
    finca.geopoint_precision = columnas[12];
    finca.info_coordenadaX = columnas[13];
    finca.info_coordenadaY = columnas[14];
    finca.info_altitud = columnas[15];
    fincas.push(finca);
  });
  cargarDatos(fincas); 
}
//Funcion que envia el arreglo de objetos a la API
function cargarDatos(datos){
  let url = ApiUrl + "/wp-json/fincas/v1/cargarfincas";
  console.log(url);
  axios.post(url,datos)
  .then( respuesta => {
    if(respuesta.statusText == "OK"){
      Swal.fire(respuesta.data);
    }
  })
  .catch( error => {
    console.log(error.response.data);
    Swal.fire({
      icon: "error",
      title: "Error",
      text: error.response.data,
    });
  });
}

