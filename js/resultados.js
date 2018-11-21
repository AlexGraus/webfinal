function mostrarExamenes() {
    var array = ["VPH", "PAP", "IVAA"];
    addOptions("examenes", array);
}


function addOptions(domElement, array) {
    var selector = document.getElementsByName(domElement)[0];
    for (provincia in array) {
        var opcion = document.createElement("option");
        opcion.text = array[provincia];

        opcion.value = array[provincia];
        selector.add(opcion);
    }
}



function mostrarResultados() {

    var listaResultados = {
      VPH: ["POSITIVO", "NEGATIVO"],
      PAP: ["AGC", "AGC-NOS", "AGC-FN", "ASC", "ASC-H","ASC-US","Carcinoma in situ de cuello uterino","Carcinoma"],
      IVAA: ["IVAA Negativa", "IVAA Positiva", "LIE", "LIE-AG", "LIE-BG","NIC"]
    }
    
    var examenes = document.getElementById('examenes');
    var resultados = document.getElementById('resultados');

    var filaSeleccionada = examenes.value;
    

    resultados.innerHTML = '<option value="">Seleccionar Resultado</option>'
    
    if(filaSeleccionada !== ''){

      filaSeleccionada = listaResultados[filaSeleccionada]
      filaSeleccionada.sort()
    

      filaSeleccionada.forEach(function(result){
        let opcion = document.createElement('option')
        opcion.value = result
        opcion.text = result
        resultados.add(opcion)
      });
    }
    
  }
  
 mostrarExamenes();