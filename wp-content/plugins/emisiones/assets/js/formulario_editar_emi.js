"use strict";
$(function(){

  $(".actualiza_tooltip").tooltip({
    title: 'Guardar cambios', 
    placement:'right'
  });
  $(".regresar_tooltip").tooltip({
    title: 'regresar', 
    placement:'right'
  });
      $("#metano_enterica").on("change", function () {

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
    $("#finca, #producto, #anio").on("keypress", function(event){
      var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9.,()\\s ]+$");
      var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
      if (!regex.test(key)) {
         event.preventDefault();
         return false;
      }
     // console.log(event);
    });

    $("#actualizar").on("click", function () {
        let obj_editar = new EmisionModel();
        obj_editar.id = $("#id").val(); 
        obj_editar.id_iniciativa = $("#id_iniciativa").val();
        obj_editar.nombre_iniciativa = $("#nombre_iniciativa").val().trim();
        obj_editar.anio = $("#anio").val();
        obj_editar.provincia = $("#provincia").val();
        obj_editar.finca = $("#finca").val();
        obj_editar.producto = $("#producto").val();
        obj_editar.metano_enterica = $("#metano_enterica").val();
        obj_editar.metano_excretas = $("#metano_excretas").val();
        obj_editar.N2O_excretas = $("#N20_excretas").val();
        obj_editar.N2O_pasturas = $("#N20_pasturas").val();
        obj_editar.total_emisiones = $("#total_emisiones").val();
        obj_editar.leche = $("#leche").val();
        obj_editar.carne = $("#carne").val();
        obj_editar.IE_leche = $("#IE_leche").val();
        obj_editar.IE_carne = $("#IE_carne").val();
      
        let apiUrl=
        window.location.origin + "/esteveza/wp-json/editaremision/v1/editar";
        Swal.fire({
            title: "Actualizando",
            html: "Por favor espere...",
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            },
        });
        axios
        .put(apiUrl, obj_editar)
        .then((res) => {
          if (res.statusText === "OK") {
            Swal.fire(res.data);
            $("#formulario_edit").trigger("reset");
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

});