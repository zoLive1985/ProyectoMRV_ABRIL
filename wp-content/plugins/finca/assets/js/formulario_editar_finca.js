"use strict";
$(function(){
  $("#codigo_finca, #canton, #parroquia, #nombre_propietario, #asociacion").on("keypress", function(event){
    var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9.,()\\s ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
   // console.log(event);
  });
    $("#actualizar").on("click", function () {
        let obj_editar = new FincaModel();
        obj_editar.id = $("#id").val(); 
        obj_editar.codigo_finca = $("#codigo_finca").val();
        obj_editar.provincia = $("#provincia").val();
        obj_editar.canton = $("#canton").val();
        obj_editar.parroquia = $("#parroquia").val();
        obj_editar.nombre_propietario = $("#nombre_propietario").val();
        obj_editar.telefono = $("#telefono").val();
        obj_editar.asociacion = $("#asociacion").val();
        obj_editar.nombre_predio = $("#nombre_predio").val();
        obj_editar.geopoint = $("#geopoint").val();
        obj_editar.geopoint_latitude = $("#geopoint_latitude").val();
        obj_editar.geopoint_longitude = $("#geopoint_longitude").val();
        obj_editar.geopoint_altitude = $("#geopoint_altitude").val();
        obj_editar.geopoint_precision = $("#geopoint_precision").val();
        obj_editar.info_coordenadaX = $("#info_coordenadaX").val();
        obj_editar.info_coordenadaY = $("#info_coordenadaY").val();
        obj_editar.info_altitud = $("#info_altitud").val();
        let apiUrl=
        window.location.origin + "/esteveza/wp-json/fincas/v1/edit_finca";
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
            $("#formulario_fincaedit").trigger("reset");
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