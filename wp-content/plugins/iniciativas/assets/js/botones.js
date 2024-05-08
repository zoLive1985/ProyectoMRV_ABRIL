"use strict";
$(document).ready(function () {
    $("#visualizar").mouseover(function () { 
        $("#txtvisualizar").text("Visualizar");
        $("#txtvisualizar").show();
        
      });
      $("#visualizar").mouseout(function () { 
        $("#txtvisualizar").hide();
      });
    
});

