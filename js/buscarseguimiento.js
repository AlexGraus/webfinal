$(buscar());

function buscar(consulta){
    $.ajax({
        url: '../persistencia/seguimiento_ecm.php',  
        type:'GET',
        dataType: 'html',
        data:{consulta:consulta}
    }).done(function(respuesta){
        $("#buscandoCodigo").html(respuesta);
    }).fail(function(){
        console.log("error");
    })
} 


$(document).on('keyup','#caja_busqueda',function(){
    var valor = $(this).val();
    if(valor != ""){
        buscar(valor);
    }else{
        buscar();
    }

});
