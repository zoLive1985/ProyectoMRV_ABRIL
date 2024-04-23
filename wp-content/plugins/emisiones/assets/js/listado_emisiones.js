"use strict";

$(function () {
  consultarEmisiones();
  consultarFincas();
  $(document).on("click", "#validar", function (event) {
    let identificador = $(this).data("id");
    //console.log(identificador);
    Swal.fire({
      title: "Esta seguro que desea Aprobar",
      showCancelButton: true,
      confirmButtonText: "Confirmar",
    }).then((result) => {
      if (result.isConfirmed) {
        let url = `${window.location.origin}/esteveza/wp-json/mrv/v1/aprobarEmision/${identificador}`;
        axios
          .post(url, {})
          .then((res) => {
            Swal.fire(res.data).then((accion) => {
              if (accion.isConfirmed) {
                consultarEmisiones();
              }
            });
            //console.log(res.data)
          })
          .catch((err) => {
            console.error(err);
          });
      }
    });
  });

  $("#validar_todo").on("click", function () {
    let apiUrl = `${window.location.origin}/esteveza/wp-json/emision/v1/contarregistros`;
    axios
      .get(apiUrl, {})
      .then((response) => {
        const data = response.data;
        const numeroRegistros = data[0]['COUNT(*)']
        //console.log(numeroRegistros);
        Swal.fire({
          title: "¿Esta seguro que desea validar?",
          text:  `Los ${numeroRegistros} de registros.`,
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si,validar!",
        }).then((result) => {
          if (result.isConfirmed) {
            let url = `${window.location.origin}/esteveza/wp-json/mrv/v1/validarTodo`;
            axios
              .post(url, {})
              .then((res) => {
                Swal.fire({
                  title: "Validado!",
                  text: "Todos los registros han sido validado",
                  icon: "success",
                });
                consultarEmisiones();
              })

              .catch((err) => {
                console.error(err);
              });
          }
        });
      })
      .catch((error) => {
        console.error(error);
      });
  });

  $("#selectfinca").on("change", function () {
    let finca = $(this).val();
    $("#listado tbody tr").remove();
    Swal.fire({
      title: "Consultado",
      html: "Por favor espere...",
      allowEscapeKey: false,
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      },
    });
    let url = `${window.location.origin}/esteveza/wp-json/emision/v1/consultarEmisiones/${finca}`;
    axios
      .get(url, {})
      .then((res) => {
        if (res.statusText == "OK") {
          res?.data?.forEach((emision) => {
            if (emision.estado === "ED") {
              let fila = "<tr>";
              fila += `<td>${emision.id}</td>`;
              fila += `<td>${emision.anio}</td>`;
              fila += `<td>${emision.finca}</td>`;
              fila += `<td>${emision.metano_enterica.replace(/\./g, ",")}</td>`;
              fila += `<td>${emision.metano_excretas.replace(/\./g, ",")}</td>`;
              fila += `<td>${emision.N2O_excretas.replace(/\./g, ",")}</td>`;
              fila += `<td>${emision.N2O_pasturas.replace(/\./g, ",")}</td>`;
              fila += `<td>${emision.total_emisiones.replace(/\./g, ",")}`;
              fila += `<td>Edición</td>`;
              fila += `<td>`;
              fila += `<a class="btn me-md-2" id="visualizar"  href="http://localhost/esteveza/mostrar_emisiones?id=${emision.id}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="green" class="bi bi-eye-fill" viewBox="0 0 16 16">
              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
            </svg></a>`;
              fila += `<a class="btn me-md-2" id="editar"  href="http://localhost/esteveza/editar-emisiones?id=${emision.id}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="blue" class="bi bi-pen-fill" viewBox="0 0 16 16">
              <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
            </svg></a>`;
              fila += `<button class="btn me-md-2" data-id=${emision.id} id="validar" name="Validar"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="orange" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
              <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
            </svg></button>`;
              fila += `<td>`;
              fila += "<tr>";
              $("#listado tbody").append(fila);
            }
          });
        }
        Swal.close();
      })
      .catch((err) => {
        Swal.close();
        console.err(err);
      });
  });

  $("#validarFinca").on("click", function (event) {
    let finca = $("#selectfinca option:selected").val();
    $("#listado tbody tr").remove();
    Swal.fire({
      title: "¿Esta seguro que desea Aprobar la finca?",
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: "Confirmar",
      denyButtonText: `No validar`,
    })
      .then((result) => {
        if (result.isConfirmed) {
          let url = `${window.location.origin}/esteveza/wp-json/emision/v1/validarEmisionesPorFinca/${finca}`;
          axios.post(url, {}).then((respuesta) => {
            // console.log("esta respuesta",respuesta);
            Swal.fire("La finca ha sido aprobada", "", "success");
            consultarEmisiones();
            // $("#selectfinca").val('');
            $("#selectfinca").val($("#selectfinca option:first").val());
          });
        } else if (result.isDenied) {
          consultarEmisiones();
          $("#selectfinca").val($("#selectfinca option:first").val());
          Swal.fire(
            "La validación de la finca ha sido cancelada.",
            "",
            "error"
          );
        }
      })
      .catch((error) => {
        console.log(error);
      });
  });
});

function consultarEmisiones() {
  $("#listado tbody tr").remove();
  Swal.fire({
    title: "Consultado",
    html: "Por favor espere...",
    allowEscapeKey: false,
    allowOutsideClick: false,
    didOpen: () => {
      Swal.showLoading();
    },
  });
  let url = window.location.origin + "/esteveza/wp-json/mrv/v1/emisiones";
  //console.log(url);
  axios
    .get(url, {})
    .then((res) => {
      if (res.statusText == "OK") {
        res?.data?.forEach((emision) => {
          if (emision.estado === "ED") {
            let fila = "<tr>";
            fila += `<td>${emision.id}</td>`;
            fila += `<td>${emision.anio}</td>`;
            fila += `<td>${emision.finca}</td>`;
            fila += `<td>${emision.metano_enterica.replace(/\./g, ",")}</td>`;
            fila += `<td>${emision.metano_excretas.replace(/\./g, ",")}</td>`;
            fila += `<td>${emision.N2O_excretas.replace(/\./g, ",")}</td>`;
            fila += `<td>${emision.N2O_pasturas.replace(/\./g, ",")}</td>`;
            fila += `<td>${emision.total_emisiones.replace(/\./g, ",")}`;
            fila += `<td>Edición</td>`;
            fila += `<td>`;
            fila += `<a class="btn" id="visualizar"  href="http://localhost/esteveza/mostrar_emisiones?id=${emision.id}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="green" class="bi bi-eye-fill" viewBox="0 0 16 16">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
          </svg></i></a>`;
            fila += `<a class="btn" id="editar"  href="http://localhost/esteveza/editar-emisiones?id=${emision.id}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="blue" class="bi bi-pen-fill" viewBox="0 0 16 16">
            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
          </svg></a>`;
            fila += `<button class="btn" data-id=${emision.id} id="validar" name="Validar"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="orange" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
            <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
          </svg></button>`;
            fila += `<td>`;
            fila += "<tr>";
            $("#listado tbody").append(fila);
          }
        });
      }
      Swal.close();
    })
    .catch((err) => {
      Swal.close();
      console.err(err);
    });
}

function consultarFincas() {
  let url =
    window.location.origin + "/esteveza/wp-json/emision/v1/consultarFincas";
  axios.get(url).then((res) => {
    if (res.statusText === "OK") {
      res?.data?.forEach((item) => {
        //   console.log(item);
        let valorFinca = item.finca;
        $("#selectfinca").append(
          `<option value='${valorFinca}'>${valorFinca}</option>`
        );
      });
    }
  });
}
