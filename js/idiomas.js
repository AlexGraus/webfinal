$(document).ready(function() {
    $('#myTable').DataTable( {
        responsive: true,
        dom: 'Bfrtip',
        'rowCallback': function(row, data, index){

            switch(data[3]){

                case 'IVAA Negativa': case 'NEGATIVO': 
                     $(row).find('td:eq(3)').css('background-color', '#26FB3C');
                     break;
                case 'IVAA Positiva': case 'POSITIVO':
                     $(row).find('td:eq(3)').css('background-color', '#FF0000');
                     break;
                default :
                     $(row).find('td:eq(3)').css('background-color', '#FF6800');

            }
            /*
            if(data[index] != 'sa'){
                $(row).find('td:eq(0)').css('background-color', 'green');
            }
            if(data[2].toUpperCase() == 'EE'){
                $(row).find('td:eq(2)').css('color', 'blue');
            }*/
          },
        buttons: [
            
             {
                extend: 'excel',
                text: 'Exportar a Excel',
              /*  exportOptions: {
                    //Exportar columnas específicas
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                    
                }*/
               
            }

      ],
      
      "language": {
             "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "bFilter": false,
        
    } );
} );