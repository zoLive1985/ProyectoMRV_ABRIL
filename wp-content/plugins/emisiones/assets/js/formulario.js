"use strict";
$(function () {
    $('#metano_enterica,#metano_excretas,#N20_excretas,#N20_pasturas').maskNumber({
      decimal:',',
      thousands:'.'
    });
    //metano_enterica
    //metano_excretas
    //N20_excretas
    //N20_pasturas


    $("#metano_enterica").on("change", function () {
        console.log("Metano enterica:",$(this).val());
        let metano_enterica = parseFloat($("#metano_enterica").val());
        let metano_excretas = parseFloat($("#metano_excretas").val());
        let N2O_excretas = parseFloat($("#N20_excretas").val());
        let N2O_pasturas = parseFloat($("#N20_pasturas").val());
        let total = metano_enterica + metano_excretas + N2O_excretas + N2O_pasturas;
        
        $("#total_emisiones").val(total.toFixed(2));
    });
    $("#metano_excretas").on("change", function () {

        let metano_enterica = parseFloat($("#metano_enterica").val());
        let metano_excretas = parseFloat($("#metano_excretas").val());
        let N2O_excretas = parseFloat($("#N20_excretas").val());
        let N2O_pasturas = parseFloat($("#N20_pasturas").val());
        let total = metano_enterica + metano_excretas + N2O_excretas + N2O_pasturas;
        $("#total_emisiones").val(total.toFixed(2));
    });
    $("#N20_excretas").on("change", function () {
   
        let metano_enterica = parseFloat($("#metano_enterica").val());
        let metano_excretas = parseFloat($("#metano_excretas").val());
        let N2O_excretas = parseFloat($("#N20_excretas").val());
        let N2O_pasturas = parseFloat($("#N20_pasturas").val());
        let total = metano_enterica + metano_excretas + N2O_excretas + N2O_pasturas;
        $("#total_emisiones").val(total.toFixed(2));
    });
    $("#N20_pasturas").on("change", function () {
        
        let metano_enterica = parseFloat($("#metano_enterica").val());
        let metano_excretas = parseFloat($("#metano_excretas").val());
        let N2O_excretas = parseFloat($("#N20_excretas").val());
        let N2O_pasturas = parseFloat($("#N20_pasturas").val());
        let total = metano_enterica + metano_excretas + N2O_excretas + N2O_pasturas;
        $("#total_emisiones").val(total.toFixed(2));
    });
    $("#finca, #producto").on("keypress", function(event){
      var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9.,()\\s ]+$");
      var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
      if (!regex.test(key)) {
         event.preventDefault();
         return false;
      }
     // console.log(event);
    });
 
    $("#guardar").on("click",function (event){
      
        let modeloEmisiones = new EmisionModel();
        modeloEmisiones.id_iniciativa = $("#id_iniciativa").val();
        modeloEmisiones.nombre_iniciativa = $( "#id_iniciativa option:selected" ).text().trim();
        modeloEmisiones.anio = $("#anio option:selected").val();
        modeloEmisiones.provincia = $("#provincia option:selected").val();
        modeloEmisiones.finca = $("#finca").val();
        modeloEmisiones.producto = $("#producto").val();
        modeloEmisiones.metano_enterica = $("#metano_enterica").val();
        modeloEmisiones.metano_excretas = $("#metano_excretas").val();
        modeloEmisiones.N2O_excretas = $("#N20_excretas").val();
        modeloEmisiones.N2O_pasturas = $("#N20_pasturas").val();
        modeloEmisiones.total_emisiones = $("#total_emisiones").val();
        modeloEmisiones.leche = $("#leche").val();
        modeloEmisiones.carne = $("#carne").val();
        modeloEmisiones.IE_leche = $("#IE_leche").val();
        modeloEmisiones.IE_carne = $("#IE_carne").val();
        //modeloEmisiones.estado = $("#edicion").val();


        let apiUrl = 
            window.location.origin + "/esteveza/wp-json/mrv/v1/emision";
        Swal.fire({
            title: "Guardando",
            html: "Por favor espere...",
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen:() =>{
                Swal.showLoading();
            },
        });
        axios 
        .post(apiUrl, modeloEmisiones)
        .then((res) => {
            if(res.statusText === "OK"){
                Swal.fire(res.data);
                $("#formulario_emisiones").trigger("reset");
            }
        })
        .catch((erro) =>{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: erro.response.data,
            });
        });

    });
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
function leerArchivo(evento) {
    const datosCSV = evento.target.result;
    const filas = datosCSV.split('\n');
    let emisiones = [];
    filas.forEach(fila => {
      //console.log("elemento:",fila);
      const columnas =fila.split(',');
      let emision = {};
      //iniciativa.id = columnas[0];
      emision.id_iniciativa = columnas[0];
      emision.nombre_iniciativa = columnas[1];
      emision.anio = columnas[2];
      emision.provincia = columnas[3];
      emision.finca = columnas[4];
      emision.producto = columnas[5];
      emision.metano_enterica = columnas[6];
      emision.metano_excretas = columnas[7];
      emision.N2O_excretas = columnas[8];
      emision.N2O_pasturas = columnas[9];
      emision.total_emisiones = columnas[10];
      emision.leche = columnas[11];
      emision.carne = columnas[12];
      emision.IE_leche = columnas[13];
      emision.IE_carne = columnas[14];
      emisiones.push(emision);
    });
    cargarDatos(emisiones); 
  }
  //Funcion que envia el arreglo de objetos a la API
  function cargarDatos(datos){
    let url = ApiUrl + "/wp-json/mrv/v1/cargaremisiones";
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