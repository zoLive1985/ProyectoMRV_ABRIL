"use strict";
var datosFiltrados=[];
datosOriginales = datosOriginales.map( item =>{
  item.anio = item.nombre_finca.substring(0,4);
  item.nombreproyecto = item.nombre_finca.substring(4,7);
  item.provincia = item.nombre_finca.substring(8,9);
  item.zona = item.nombre_finca.substring(9,11);
  item.codigofinca = item.nombre_finca.substring(11,14);
  return item;
});
$( document ).ready(function() {
    console.log(datosOriginales);
    datosFiltrados=datosOriginales;
    desplegarDatos();
    $("#reset").click(function (e) { 
      datosFiltrados=datosOriginales;
      desplegarDatos();
      $("#regiones").val("null");
      $("#alimento").val("null");
      $("#min").val("0");
      $("#max").val("0");
      $("#especimen").val("null");
      $("#nom_finca").val("");
      

    });
    $("#buscar").click(function (e) { 
      var condiciones = {};
      datosFiltrados = datosOriginales;
      var texto = $("#nom_finca").val();
      if( $("#nom_finca").val() != ""){
        datosFiltrados = datosFiltrados.filter( finca => {
          var nombreFinca = finca.nombre_finca;
          var textoABuscar = $("#nom_finca").val();
          var posicion = nombreFinca.indexOf(textoABuscar);
          if ( posicion == -1) {
            return false;
          } else {
            return true; 
          }
        });
      }
   
      if( $("#regiones").val() != "null"){
        datosFiltrados = datosFiltrados.filter(finca =>{
          var nombreRegion = finca.region;
          var regionSeleccionada = $("#regiones").val();
          if (nombreRegion == regionSeleccionada) {
            return true;
          } else {
            return false;
          }
        });
      }
      if( $("#alimento").val() !=  "null"){
         datosFiltrados = datosFiltrados.filter( finca =>{
            return  finca.alimento == $("#alimento").val();
         } );
      }
      if( $("#especimen").val() != "null" ){
          var nombreColumna = $("#especimen").val();
          var min = ( $("#min").val()!="" && Number($("#min").val()) > 0 )?$("#min").val():0;
          var max = ( $("#max").val()!="" && Number($("#max").val()) > 0 )?$("#max").val():0;
          datosFiltrados = datosFiltrados.filter( finca =>{
            return finca[nombreColumna] >= min  && finca[nombreColumna] <=max;
          });
      }
      desplegarDatos();
    });
});
function desplegarDatos(){
    var totalTerneras = 0;
    var totalTerneros = 0;
    var totalVaconas = 0;
    var totalVacas = 0;
    var totalToros = 0;
    var totalToretes = 0;
    
    $("#catastro tbody").find("tr").remove();
    datosFiltrados.forEach( finca => {
       totalTerneras += Number(finca.terneras); 
       totalTerneros += Number(finca.terneros);
       totalVaconas += Number(finca.vaconas);
       totalVacas += Number(finca.vacas);
       totalToros += Number(finca.toros);
       totalToretes += Number(finca.toretes);
        var fila = '<tr>';
        fila += `<td>`;
            fila +=`<span class="badge bg-success">Año: </span>${finca.anio} </br>`;
            fila +=`<span class="badge bg-success">Proyecto: </span>${finca.nombreproyecto} </br>` ;
            fila +=`<span class="badge bg-success">Provincia: </span>${finca.provincia} </br>` ;
            fila +=`<span class="badge bg-success">Zona: </span> ${finca.zona}</br>` ;
            fila +=`<span class="badge bg-success">Código finca: </span>${finca.codigofinca} </br>` ;

        fila += `</td>`;
        fila += `<td>${finca.nombre_finca}</td>`;
        fila += `<td>${finca.alimento}</td>`;
        fila += `<td>${finca.region}</td>`;
        fila += `<td><span class="badge bg-success">Longitud:</span> ${finca.longitud}<br/> <span class="badge bg-success">Latitud:</span> ${finca.latitud}</td>`;
        fila += `<td>`;
            fila += `<span class="badge bg-success">Terneras:</span> ${finca.terneras}<br/>`;
            fila += `<span class="badge bg-success">Vaconas:</span> ${finca.vaconas}<br/>`;
            fila += `<span class="badge bg-success">Vacas:</span> ${finca.vacas}<br/>`;
            fila += `<span class="badge bg-warning text-dark">Terneros:</span> ${finca.terneros}<br/>`;
            fila += `<span class="badge bg-warning text-dark">Toretes:</span> ${finca.toretes}<br/>`;
            fila += `<span class="badge bg-warning text-dark">Toros:</span> ${finca.toros}<br/>`;

        fila += `</td>`;


        $("#catastro tbody").append(fila);
    });
    $("#totalTerneras").val(totalTerneras);
    $("#totalVaconas").val(totalVaconas);
    $("#totalVacas").val(totalVacas);
    $("#totalTerneros").val(totalTerneros);
    $("#totalToretes").val(totalToretes); 
    $("#totalToros").val(totalToros); 
    $("#totalRegiones").val(datosFiltrados.length);

    
}


$("#descargar").click(function () { 
  var pdf =new jsPDF('l','mm','a4');  
  pdf.text(20,20,"Catastro");
  
  var columna =["Dato", "Nombre finca", "Tipo de Producción", "Región", "Coordenadas", "Cantidad"];
  var datosReporte = [];
  var totalTerneras = 0;
  var totalTerneros = 0;
  var totalVaconas = 0;
  var totalVacas = 0;
  var totalToros = 0;
  var totalToretes = 0;
  datosFiltrados.forEach( objeto => {
    totalTerneras += Number(objeto.terneras); 
    totalTerneros += Number(objeto.terneros);
    totalVaconas += Number(objeto.vaconas);
    totalVacas += Number(objeto.vacas);
    totalToros += Number(objeto.toros);
    totalToretes += Number(objeto.toretes);
    var itemArreglo = [`Año: ${objeto.anio} \nProyecto: ${objeto.nombreproyecto} \nProvincia: ${objeto.provincia} \nZona: ${objeto.zona}`, objeto.nombre_finca, objeto.alimento, objeto.region,`Longitud: ${objeto.longitud} \nLatitud: ${objeto.latitud}`,`Terneras: ${objeto.terneras} \nVaconas: ${objeto.vaconas} \nVacas: ${objeto.vacas} \n Terneros: ${objeto.terneros} \nToretes: ${objeto.toretes} \n Toros: ${objeto.toros}`  ];
    datosReporte.push(itemArreglo);
  });
  var totales = [`Registros totales: ${datosFiltrados.length}`, "", "", "", "", `Terneras: ${totalTerneras}\nVaconas: ${totalVaconas} \nVacas:${totalVacas} \nTerneros: ${totalTerneros} \nToretes: ${totalToretes}\nToros:${totalToros}`];
  datosReporte.push(totales);
  pdf.autoTable(columna,datosReporte,
    {
      margin:{top:25}
    });
  
    
    pdf.save('documento.pdf');
});

