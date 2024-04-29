"use strict";
$(function(){
    $("#ndc").on("change", function () {
        let ndc = $(this).val();
    
        let apiUrl = `${window.location.origin}/esteveza/wp-json/iniciativas/v1/iniciativa/${ndc}`;
        $("#coniniciativa").empty();
        $("#coniniciativa").append(
          `<option value='null' selected>Seleccione una iniciativas</option>`
        );
        axios.get(apiUrl).then((res) => {
          if (res.statusText === "OK") {
            res?.data?.forEach((item) => {
              $("#coniniciativa").append(
                `<option value='${item.id}'>${item.nombre}</option>`
              );
            });
          }
        });
      });
      $("#reset").on("click", function (e) {
        $("#ndc").val("");
        $("#coniniciativa").val("null");
        $("#consolidacion tbody tr").remove();
        $("#consolidacion tfoot tr").remove();
      });
      
      var datosFiltrados = [];
  $("#buscar").on("click", function (event) {
    $("#consolidacion tbody tr").remove();
    $("#consolidacion tfoot tr").remove();
    let nombre_iniciativa = $("#coniniciativa").val();

    Swal.fire({
      title: "Consultando",
      html: "Por favor espere...",
      allowEscapeKey: false,
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      },
    });
    let apiUrl = `${window.location.origin}/esteveza/wp-json/mrv/v1/reporteconsolidadas/${nombre_iniciativa}`;
    axios
      .get(apiUrl)
      .then((res) => {
        if (res.statusText === "OK") {
          let sumaMetanoEnterica = 0;
          let sumaMetanoExcretas = 0;
          let sumaN2OExcretas = 0;
          let sumaN2OPasturas = 0;
          let sumaTotalEmisiones = 0;

          res?.data?.forEach((emision) => {
            let fila = "<tr>";
            fila += `<td>${emision.anio}</td>`;
            fila += `<td>${emision.metano_enterica.replace(/\./g, ",")}</td>`;
            fila += `<td>${emision.metano_excretas.replace(/\./g, ",")}</td>`;
            fila += `<td>${emision.N2O_excretas.replace(/\./g, ",")}</td>`;
            fila += `<td>${emision.N2O_pasturas.replace(/\./g, ",")}</td>`;
            fila += `<td>${emision.total_emisiones.replace(/\./g, ",")}</td>`;
            fila += `<tr>`;
            $("#consolidacion tbody").append(fila);
            sumaMetanoEnterica += parseFloat(emision.metano_enterica);
            sumaMetanoExcretas += parseFloat(emision.metano_excretas);
            sumaN2OExcretas += parseFloat(emision.N2O_excretas);
            sumaN2OPasturas += parseFloat(emision.N2O_pasturas);
            sumaTotalEmisiones += parseFloat(emision.total_emisiones);
          });
          let sumaTotal = "<tr>";
          sumaTotal += `<td ><strong> </strong></td>`;
          sumaTotal += `<td ><strong>${sumaMetanoEnterica
            .toFixed(2)
            .replace(/\./g, ",")}</strong></td>`;
          sumaTotal += `<td ><strong>${sumaMetanoExcretas
            .toFixed(2)
            .replace(/\./g, ",")}</strong></td>`;
          sumaTotal += `<td ><strong>${sumaN2OExcretas
            .toFixed(2)
            .replace(/\./g, ",")}</strong></td>`;
          sumaTotal += `<td><strong>${sumaN2OPasturas
            .toFixed(2)
            .replace(/\./g, ",")}</strong></td>`;
          sumaTotal += `<td><strong>${sumaTotalEmisiones
            .toFixed(2)
            .replace(/\./g, ",")}</strong></td>`;
          sumaTotal += "</tr>";
          $("#consolidacion tfoot").append(sumaTotal);
          //  console.log(sumaTotal);
        }
        Swal.close();
      })
      .catch((err) => {
        Swal.close();
        console.error(err);
      });
  });



      
})