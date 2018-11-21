$(buscar());

function buscar(consulta,tipo){
    $.ajax({
        url: '../persistencia/reportesDAO.php',
        type:'GET',
        dataType: 'html',
        data:{consulta:consulta,tipo:tipo}
    }).done(function(respuesta){
        $("#buscandoCodigo").html(respuesta);
    }).fail(function(){
        console.log("error");
    })
}


$(document).on('keyup','#caja_busqueda',function(){
    var valor = $(this).val();
    if(valor != ""){
        buscar(valor," ");
    }else{
        buscar();
    }

});

$('#seleccionar').change(function(){ 
    var datos = $(this).val();
    if(datos != ""){
        buscar(" ",datos);
    }else{
        buscar();
    }
});
