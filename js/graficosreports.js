
$('#search').click(function(){
    var consulta = $('#caja_busqueda').val();
    var consulta2 = $('#caja_busqueda2').val();
    if(consulta != "" && consulta2 !=""){
        $.ajax({
            url: '../persistencia/reportesestadisticosDAO.php',
            type:'GET',
            dataType: 'html',
            data:{consulta:consulta,consulta2:consulta2},
        }).done(function(respuesta){
            
            //Primer Gráfico
            valores = JSON.parse(respuesta);
    
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
                        'rgb(4, 246, 29)',
                        'rgb(244, 252, 2)',
                        'rgb(255, 139, 0)',
                        'rgb(255, 23, 23)',
                        'rgb(13, 46, 255)',
                        'rgb(0, 240, 221)',
                        'rgb(227, 0, 206)',
    
                    ],
    
                    data: resultado
                }]
            };
    
            var newChar = $('#myChart');
    
            var charGrafico = new Chart(newChar,{
                type: 'doughnut',
                data: datosChart
                
                
            })
    
    
            //Segundo grafico
       
    
            var diagnosticos2 =[];
            var resultado2 = [];
    
            for(var contador in valores){
                if(valores[contador].diag != null){
                    diagnosticos2.push(valores[contador].diag);
                    resultado2.push(valores[contador].result);
                }
            }
    
            var datosChart = {
                labels: diagnosticos2,
                datasets:[{
                    label: 'Resultados',
                    backgroundColor: [
                        'rgb(255, 87, 51)',
                        'rgb(50, 220, 166)',
                        'rgb(150, 23, 222)',
                        'rgb(13, 46, 255)',
    
                    ],
    
                    data: resultado2
                }]
            };
    
            var newChar = $('#myChart2');
    
            var charGrafico = new Chart(newChar,{
                type: 'doughnut',
                data: datosChart
            });

            //TERCER GRÁFICO
            var diagnosticos3 =[];
            var resultado3 = [];
    
            for(var contador in valores){
                if(valores[contador].diagIvaa != null){
                    diagnosticos3.push(valores[contador].diagIvaa);
                    resultado3.push(valores[contador].resuli);
                }
            }
    
            var datosChart = {
                labels: diagnosticos3,
                datasets:[{
                    label: 'Resultados',
                    backgroundColor: [

                        'rgb(150, 23, 222)',
                        'rgb(170, 20, 222)'
    
                    ],
    
                    data: resultado3
                }]
            };
    
            var newChar = $('#myChart3');
    
            var charGrafico = new Chart(newChar,{
                type: 'doughnut',
                data: datosChart,

            });

            //CUARTO GRÁFICO
            var diagnosticos4 =[];
            var resultado4 = [];
    
            for(var contador in valores){
                if(valores[contador].diagVph != null){
                    diagnosticos4.push(valores[contador].diagVph);
                    resultado4.push(valores[contador].resulV);
                }
            }
    
            var datosChart = {
                labels: diagnosticos4,
                datasets:[{
                    label: 'Resultados',
                    backgroundColor: [
                        'rgb(13, 46, 255)',
                        'rgb(0, 240, 221)',
                    ],
    
                    data: resultado4
                }]
            };
    
            var newChar = $('#myChart4');
    
            var charGrafico = new Chart(newChar,{
                type: 'doughnut',
                data: datosChart,

            });

    
        }).fail(function(){
            console.log("error");
        })
    }else{
       
    }

});
/*
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
});*/
