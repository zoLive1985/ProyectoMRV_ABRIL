"use strict";
$(function () { 
  $("#linea_accion, #componente, #nombre").on("keypress", function(event) {
    var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9.,()\\s]+$");
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
    $("#actualizar").on("click", function () {
        let objeto = new IniciativaModel();
        objeto.id = $("#id").val(); 
        objeto.codigo = $("#codigo").val();
        objeto.nombre = $("#nombre").val();
        objeto.ndc = $("#ndc").val();
        objeto.meta_anual = $("#meta_anual").val();
        objeto.escenario = $("#escenario").val() ;
        objeto.linea_accion = $("#linea_accion").val() ;
        objeto.componente = $("#componente").val();
        objeto.elemento = $("#elemento").val();
        objeto.objetivo_desarrollo = $("#objetivo_desarrollo").val();
        objeto.sector = $("#sector").val();
        objeto.estado = $("#estado").val();

        let apiUrl=
        window.location.origin + "/esteveza/wp-json/iniciativas/v1/edit_iniciativa";
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
        .put(apiUrl, objeto)
        .then((res) => {
          if (res.statusText === "OK") {
            Swal.fire(res.data);
            $("#formulario").trigger("reset");
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