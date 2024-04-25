"use strict";
$(function () {
  $("#ndc").on("change", function () {
    let ndc = $(this).val();
    // alert (ndc);

    let apiUrl = `${window.location.origin}/esteveza/wp-json/iniciativas/v1/iniciativa/${ndc}`;
    //  console.log(apiUrl);
    $("#coniniciativa").empty();
    $("#coniniciativa").append(
      `<option value='null' selected>Seleccione una iniciativas</option>`
    );
    axios.get(apiUrl).then((res) => {
      if (res.statusText === "OK") {
        res?.data?.forEach((item) => {
          //   console.log("Nombre de iniciativa:",item, item.estado)
          $("#coniniciativa").append(
            `<option value='${item.id}'>${item.nombre}</option>`
          );
        });
      }
    });
  });

  $("#coniniciativa").on("change", function () {
    let id_iniciativa = $(this).val();
    if (id_iniciativa == "null") {
      return;
    }
    let apiUrl = `${window.location.origin}/esteveza/wp-json/iniciativas/v1/iniciativa_por_anio/${id_iniciativa}`;
    $("#selectanio").empty();
   
    axios
      .get(apiUrl)
      .then((res) => {
        //   console.log("estos datos se reflejan",res.data);
        if (res.statusText === "OK") {
          if (res?.data?.length == 0) {
            $("#selectanio").append(
              `<option value="null">No hay años disponibles para esta iniciativa</option>`
            );
          } else {
            $("#selectanio").append(
              `<option value="null">Seleccione un año</option>`
            );
            $("#selectanio").append('<option value="todos">Todos</option>');
            res?.data?.forEach((item) => {
              $("#selectanio").append(
                `<option value="${item.anio}"?>${item.anio}</option>`
              );
            });
          }
        }
      })
      .catch((err) => {
        Swal.close();
        console.error(err);
      });
  });
  $("#reset").on("click", function (e) {
    $("#ndc").val("");
    $("#coniniciativa").empty();
    $("#selectanio").empty();
    $("#consolidacion tbody tr").remove();
    $("#consolidacion tfoot tr").remove();
  });
  var datosFiltrados = [];
  $("#buscar").on("click", function (event) {
    $("#consolidacion tbody tr").remove();
    $("#consolidacion tfoot tr").remove();
    let nombre_iniciativa = $("#coniniciativa").val();
    let anio = $("#selectanio").val();
    if ( anio == 'null') {
        return;
    }
    Swal.fire({
      title: "Consultando",
      html: "Por favor espere...",
      allowEscapeKey: false,
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      },
    });
    
    //  obtenerbuscar.total_emisiones = $("#total_emisiones").val();
    let apiUrl = `${window.location.origin}/esteveza/wp-json/mrv/v1/searchconsolidar/${nombre_iniciativa}/${anio}`;
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
            fila += `<td>${emision.finca}</td>`;
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
          sumaTotal += `<td ><strong>Total</strong></td>`;
          sumaTotal += `<td ><strong> </strong></td>`;  
          sumaTotal += `<td ><strong>${sumaMetanoEnterica.toFixed(2).replace(/\./g, ",")}</strong></td>`;
          sumaTotal += `<td ><strong>${sumaMetanoExcretas.toFixed(2).replace(/\./g, ",")}</strong></td>`;
          sumaTotal += `<td ><strong>${sumaN2OExcretas.toFixed(2).replace(/\./g, ",")}</strong></td>`;
          sumaTotal += `<td><strong>${sumaN2OPasturas.toFixed(2).replace(/\./g, ",")}</strong></td>`;
          sumaTotal += `<td><strong>${sumaTotalEmisiones.toFixed(2).replace(/\./g, ",")}</strong></td>`;
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
});
