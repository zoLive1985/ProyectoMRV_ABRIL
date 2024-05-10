"use strict";
var datosFiltrados=[];
$( document ).ready(function() {
    console.log(datosOriginales);
    datosFiltrados=datosOriginales;
    desplegarDatos();
    $("#reset").click(function (e) { 
      datosFiltrados=datosOriginales;
      desplegarDatos();
      $("#nom_finca").val("");
      $("#anio").val("");
      $("#min").val("0");
      $("#max").val("0");
      $("#h_emisiones").val("null");
    
      

    });
    $("#buscar").click(function (e) { 
      var condiciones = {};
      datosFiltrados = datosOriginales;
      
      //busqueda por texto
      var texto = $("#nom_finca").val();
      if( $("#nom_finca").val() != ""){
        datosFiltrados = datosFiltrados.filter( finca => {
          // Aquí va el indexof
          var nombreFinca = finca.nombre_finca.toUpperCase();
          var textoABuscar = $("#nom_finca").val().toUpperCase();
          var posicion = nombreFinca.indexOf(textoABuscar);
          if ( posicion == -1) {
            return false;
          } else {
            return true; 
          }
          
        });
      }

      var textoaño= $("#anio").val();
      if($("#anio").val() !=  ""){
        datosFiltrados = datosFiltrados.filter(finca =>{
          var seleccionarAño = finca.anio;
          var textoBusqueda = $("#anio").val();
          var posicion =  seleccionarAño.indexOf(textoBusqueda);
          if(posicion == -1){
              return false;
          } else{
            return true;
          }
        });

      }
    
      desplegarDatos();
    }); 
});
/**
 * Función que muestra los datos en la tabla
 */
function desplegarDatos(){
    var totalEmisiones = 0;
    var totalExcretas_pasturas = 0;
    var totalManejo_Excretas = 0;
    
    $("#catastro tbody").find("tr").remove();
    datosFiltrados.forEach( finca => {
      var numeroemision = finca.emision_total;
      var numeropasturas = finca.N2O_Excretas_en_pasturas;
      var numeromanejoE = finca.N2O_Manejo_de_Excretas;

       if(parseFloat(numeroemision) == numeroemision) {
        
          totalEmisiones = Number.parseFloat(totalEmisiones) + Number.parseFloat(numeroemision);
       }
       if(parseFloat(numeropasturas) == numeropasturas ){
          totalExcretas_pasturas = Number.parseFloat(totalExcretas_pasturas) + Number.parseFloat(numeropasturas);
       }
       
       if(parseFloat(numeromanejoE) == numeromanejoE){
          totalManejo_Excretas = Number.parseFloat(totalManejo_Excretas) + Number.parseFloat(numeromanejoE);
       }

        var fila = '<tr>';
        fila += `<td>`;
            fila +=`${finca.anio}`;

        fila += `</td>`;
        fila += `<td>${finca.nombre_finca}</td>`;
        if(parseFloat(finca.emision_total) == finca.emision_total){
          fila += `<td>${parseFloat(finca.emision_total)}</td>`;
        } else {
          fila += `<td>${finca.emision_total}</td>`;
        }
        if(parseFloat(finca.N2O_Excretas_en_pasturas) == finca.N2O_Excretas_en_pasturas){
          fila += `<td>${parseFloat(finca.N2O_Excretas_en_pasturas)}</td>`;
        } else {
          fila += `<td>${finca.N2O_Excretas_en_pasturas}</td>`;
        }
        fila += `<td>${finca.N2O_Manejo_de_Excretas}</td>`;
       


        $("#catastro tbody").append(fila);
    });
    $("#totalEmisiones").val(totalEmisiones);
    $("#totalExcretasPasturas").val(totalExcretas_pasturas);
    $("#totalManejoExcretas").val(totalManejo_Excretas);
    $("#totalRegistros").val(datosFiltrados.length);

}


$("#descargar").click(function () { 
  var pdf =new jsPDF('l','mm','a4');  
  pdf.text(20,20,"Historial de Emisiones");
  
  var columna =["Año", "Nombre finca", "Emisión Total", "N2O Excretas en pasturas", "N2O Manejo de Excretas"];
  var datosReporte = [];
  var totalEmisiones = 0;
  var totalExcretas_pasturas = 0;
  var totalManejo_Excretas = 0;
 
  datosFiltrados.forEach( objeto => {

    var numeroemision = objeto.emision_total;
    var numeropasturas = objeto.N2O_Excretas_en_pasturas;
    var numeromanejoE = objeto.N2O_Manejo_de_Excretas;

     if(parseFloat(numeroemision) == numeroemision) {
        totalEmisiones = Number.parseFloat(totalEmisiones) + Number.parseFloat(numeroemision);      
     }
     if(parseFloat(numeropasturas) == numeropasturas ){
        totalExcretas_pasturas = Number.parseFloat(totalExcretas_pasturas) + Number.parseFloat(numeropasturas);
     }
     
     if(parseFloat(numeromanejoE) == numeromanejoE){
        totalManejo_Excretas = Number.parseFloat(totalManejo_Excretas) + Number.parseFloat(numeromanejoE);
     }
 
   
    var itemArreglo = [`${objeto.anio}`,`${objeto.nombre_finca}`,` ${objeto.emision_total}`,`${objeto.N2O_Excretas_en_pasturas}`,` ${objeto.N2O_Manejo_de_Excretas}` ];
    datosReporte.push(itemArreglo);
  });
  var totales = [`Registros totales:`,`${datosFiltrados.length}`,``,``,`Emisiones: ${totalEmisiones}\nExcretas en pasturas: ${totalExcretas_pasturas} \nManejo de Excretas:${totalManejo_Excretas}`];
  datosReporte.push(totales);
  
  pdf.autoTable(columna,datosReporte,
    {
      margin:{top:25}
    });
  
    
    pdf.save('documento.pdf');
});

