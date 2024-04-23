"use strict";
$(function () {
  //alert('Hola');
  //modeloPrueba.codigo='COD-001';
  //console.log(modeloPrueba);
  
  $("#codigo").on("keypress", function(event){
    var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9.,()\\s ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
   // console.log(event);
  });
  $("#sector").on("keypress", function(event){
    var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9.,()\\s ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
   // console.log(event);
  });
  $("#nombre").on("keypress", function(event){
    var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9.,()\\s ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
   // console.log(event);
  });
  $("#linea_accion").on("keypress", function(event){
    var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9.,()\\s ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
   // console.log(event);
  });
  $("#componente").on("keypress", function (event) {
    var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9.,()]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
    
  });
  $("#objetivo_desarrollo").select2({
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
  });
  $("#guardar").on("click", function (event) {
    let modeloPrueba = new IniciativaModel();
    modeloPrueba.codigo = $("#codigo").val();
    modeloPrueba.nombre = $("#nombre").val();
    modeloPrueba.ndc = $("#ndc").val();
    modeloPrueba.meta_anual = $("#meta_anual").val();
    modeloPrueba.escenario = $("#escenario").val();
    modeloPrueba.linea_accion = $("#linea_accion").val();
    modeloPrueba.componente = $("#componente").val();
    modeloPrueba.elemento = $("#elemento").val();
    modeloPrueba.objetivo_desarrollo = $("#objetivo_desarrollo").val();
   // console.log($("#objetivo_desarrollo").val());
    modeloPrueba.sector = $("#sector").val();
    modeloPrueba.estado = $("#estado").val();
       
      
    let apiUrl =
      window.location.origin + "/esteveza/wp-json/iniciativas/v1/iniciativa";
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
      .post(apiUrl, modeloPrueba)
      .then((res) => {
        if (res.statusText === "OK") {
          Swal.fire(res.data);
          $("#formulario_iniciativa").trigger("reset");
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
  let iniciativas = [];
  filas.forEach(fila => {
    //console.log("elemento:",fila);
    const columnas =fila.split(',');
    let iniciativa = {};
    //iniciativa.id = columnas[0];
    iniciativa.codigo = columnas[1];
    iniciativa.nombre = columnas[2];
    iniciativa.ndc = columnas[3];
    iniciativa.meta_anual = columnas[4];
    iniciativa.escenario = columnas[5];
    iniciativa.linea_accion = columnas[6];
    iniciativa.componente = columnas[7];
    iniciativa.elemento = columnas[8];
    iniciativa.objetivo_desarrollo = columnas[9];
    iniciativa.sector = columnas[10];
    iniciativa.estado = columnas[11];
    iniciativas.push(iniciativa);
  });
  cargarDatos(iniciativas); 
}
//Funcion que envia el arreglo de objetos a la API
function cargarDatos(datos){
  let url = ApiUrl + "/wp-json/iniciativas/v1/iniciativas";
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

