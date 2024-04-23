"use strict";
$(function () {
  getMapa();
});
function getMapa() {
  let mapOptions = {
    center: [$("#latitud").val(),$("#longitud").val()],
    zoom: 10,
  };
  let map = L.map("mapa", mapOptions);

  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  
  //let finca = res.data[0];
  //let id = finca.id;
  let coorX = $("#latitud").val();
  let coorY = $("#longitud").val();
  //console.log("esta es la coordenada X: ", coorX);
  //console.log("y el ID de la finca: ", id);
  // Crea el marcador
  if (coorX !== 0 && coorY !== 0) {
    L.marker([parseFloat(coorX), parseFloat(coorY)])
      .addTo(map)
      .bindPopup($("#nombre_predio").val())
      .openPopup();
  } else {
    alert("Las coordenadas son cero, no se creará un marcador.");
  }
}
