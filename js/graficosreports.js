$(document).ready(function(){
    $.ajax({
        url:"../entidades/reportesestadisticos.php",
        method:"GET",
        success: function(data){
            console.log(data);

            valores = JSON.parse(data);

            var diagnosticos =[];
            var resultado = [];

            for(var contador in valores){
                if(valores[contador].diagnostico != null){
                    diagnosticos.push(valores[contador].diagnostico);
                    resultado.push(valores[contador].resultados);
                }
            }

            var datosChart = {
                labels: diagnosticos,
                datasets:[{
                    label: 'Resultados',
                    backgroundColor: [
                        'rgb(89, 17, 245)',
                        'rgb(255, 205, 17)',
                        'rgb(255, 107, 17)',
                        'rgb(255, 55, 55,0.6)',
                        'rgb(153,102,255,0.6)',
                        'rgb(255,159,64,0.6)',
                        'rgb(24, 255, 1,0.6)'
                    ],
                  /*  borderColor: 'rbga(200,200,200,0.75)',
                    hoverBackgraoundColor:'rbga(200,200,200,0.75)',
                    hoverBorderColor: 'rbga(200,200,200,0.75)',
                    */
                    data: resultado
                }]
            };

            var newChar = $('#myChart');

            var charGrafico = new Chart(newChar,{
                type: 'pie',
                data: datosChart
            })

        },
        error: function(data){
            console.log(data);
        }
    })
});

$(document).ready(function(){
    $.ajax({
        url:"../entidades/reportesestadisticos.php",
        method:"GET",
        success: function(data){
            console.log(data);

            valores = JSON.parse(data);

            var diagnosticos =[];
            var resultado = [];

            for(var contador in valores){
                if(valores[contador].diag != null){
                  diagnosticos.push(valores[contador].diag);
                    resultado.push(valores[contador].result);
                }
            }

            var datosChart = {
                labels: diagnosticos,
                datasets:[{
                    label: 'Resultados',
                    backgroundColor: [
                        'rgb(255, 87, 51)',
                        'rgb(50, 220, 166)',
                        'rgb(150, 23, 222)',
                        'rgb(170, 20, 222)'

                    ],
                  /*  borderColor: 'rbga(200,200,200,0.75)',
                    hoverBackgraoundColor:'rbga(200,200,200,0.75)',
                    hoverBorderColor: 'rbga(200,200,200,0.75)',
                    */
                    data: resultado
                }]
            };

            var newChar = $('#myChart2');

            var charGrafico = new Chart(newChar,{
                type: 'doughnut',
                data: datosChart
            })

        },
        error: function(data){
            console.log(data);
        }
    })
});
