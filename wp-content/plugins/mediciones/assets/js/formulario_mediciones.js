'use strict';
$(function(){
    //alert('Hola');
   $("#buscar").on("click",function(event){
        let modeloPrueba = new MedicionModel();
        modeloPrueba.fecha = $("#ano_medicion").val();
        modeloPrueba.codigo_finca =$("#buscar").val();
        
         let apiUrl =window.location.origin; + '/esteveza/wp-json/mediciones/v1/mediciones';
        //  console.log("el origen"+ apiUrl);

        Swal.fire({
            position: 'top-end',
            title: 'Buscando....',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });

        axios.post(apiUrl,modeloPrueba)
        .then(res => {
            if(res.statusText === "OK"){
                Swal.fire(res.data);
            }
        }).catch(err => {
            Swal.fire({
                icon: 'error',
                title: 'Registro no encontrado',
                text: 'Ocurrió un error',
              });
        });


    });


});



