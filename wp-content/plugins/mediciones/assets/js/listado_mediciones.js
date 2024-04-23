'use strict';
$(function () {
  consultarMediciones();
  $("#buscar").on("click", function () {
    let query = {};
    if ( $("#buscar_text").val().length > 0 ){
      query.texto = $("#buscar_text").val();
    }
    if(($("#desde").val() != null ) && ($("#hasta").val() != null)) {
      query.desde = $("#desde").val();
      query.hasta = $("#hasta").val();
    }
    if(($("#estado").val() == 'V') || $("#estado").val() == 'NV'){
       query.estado = $("#estado").val();
    }

    console.log($("#buscar_text").val());
  
    //let apiUrl = + '';
    $("#listado_mediciones tbody").find("tr").remove();
    const cadena = '?' + new URLSearchParams(query).toString();
    let apiUrl = `${window.location.origin}/esteveza/wp-json/mediciones/v1/mediciones${cadena}`;
    axios
      .get(apiUrl, {})
      .then(res => {
        if (res.statusText == 'OK') {
          console.log(res)
          res?.data?.forEach(medicion => {
            let fila = '<tr>'
            fila += `<td> ${medicion.id}</td>`
            fila += `<td> ${medicion.fecha}</td>`
            fila += `<td> ${medicion.codigo_finca}</td>`
            fila += `<td> ${medicion.emision}</td>`
            fila += `<td>`
            fila += `<button type="button" class="btn btn-primary me-md-2" id="visualizar">Visualizar</button>`
            fila += `<button type="button" class="btn btn-primary me-md-2" id="editar">Editar</button>`
            fila += `<button type="button" class="btn btn-primary me-md-2" id="finalizar">Finalizar</button>`
            fila += `<td>`
            fila += '</tr>'
            $('#listado_mediciones tbody').append(fila)
          })
        }
      })
      .catch(err => {
        console.error(err)
      });
  });


});

function consultarMediciones () {
  // http://localhost/esteveza http://localhost
  // http://localhost/esteveza/wp-json/api_2/cedulas
  let apiUrl = window.location.origin + '/esteveza/wp-json/mediciones/v1/mediciones';
  axios
  .get(apiUrl, {})
  .then(res => {
    if (res.statusText == 'OK') {
      console.log(res)
      res?.data?.forEach(medicion => {
        let fila = '<tr>'
        fila += `<td> ${medicion.id}</td>`
        fila += `<td> ${medicion.fecha}</td>`
        fila += `<td> ${medicion.codigo_finca}</td>`
        fila += `<td> ${medicion.emision}</td>`
        fila += `<td>`
        fila += `<button type="button" class="btn btn-primary me-md-2" id="visualizar">Visualizar</button>`
        fila += `<button type="button" class="btn btn-primary me-md-2" id="editar">Editar</button>`
        fila += `<button type="button" class="btn btn-primary me-md-2" id="finalizar">Finalizar</button>`
        fila += `<td>`
        fila += '</tr>'
        $('#listado_mediciones tbody').append(fila)
      })
    }
  })
  .catch(err => {
    console.error(err)
  });
  
}
