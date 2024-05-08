"use strict";
/*Funcion para mostrar datos en la tabla*/
$(function () {
  //consultarIniciativas();
 });

// Consultamos las iniciativas
function consultarIniciativas() {
  let url =
    window.location.origin + "/esteveza/wp-json/iniciativas/v1/iniciativas";
  axios
    .get(url, {})
    .then((res) => {
      if (res.statusText == "OK") {
        console.log(res);
        res?.data?.forEach((iniciativa) => {
          let fila = "<tr>";
          fila += `<td>${iniciativa.id}</td>`;
          fila += `<td>${iniciativa.nombre}</td>`;
          fila += `<td>${
            iniciativa.escenario == 0 ? "Incondicional" : "Condicional"
          }</td>`;
          fila += `<td>${
            iniciativa.ndc == 0 ? "2020 - 2025" : "2026 - 2035"
          }</td>`;
          fila += `<td>`;
         
          fila += `<a class="btn " id="visualizar"  href="http://localhost/esteveza/ver-inicitiva?id=${iniciativa.id}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="green" class="bi bi-eye-fill" viewBox="0 0 16 16">
          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
        </svg>`;

          fila += `<a class="btn" id="editar"  href="http://localhost/esteveza/editar-iniciativas?id=${iniciativa.id}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="blue" class="bi bi-pen-fill" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                      </svg></a>`;
          fila += `<a class="btn" id="suspender"  href="#" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="red" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                        <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
                      </svg></a>`;
          fila += `<td>`;
          fila += "<tr>";
          $("#listado tbody").append(fila);
        });
      }
    })
    .catch((err) => {
      console.error(err);
    });
   
}
