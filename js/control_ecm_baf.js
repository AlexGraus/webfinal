$(document).ready(function() {
    $('#ecm_baaf').DataTable( {
        responsive: true,
        dom: 'Bfrtip',
       /* buttons: [

            /* {
                extend: 'excel',
                text: 'Exportar a Excel',
                exportOptions: {
                    //Exportar columnas específicas
                    columns: [ 0,1,2]

                }

            }*/

   //   ]*/


      "language": {
             "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "bFilter": false,

    } );
} );
