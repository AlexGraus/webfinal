$(buscar());

function buscar(consulta){
    $.ajax({
        url: '../persistencia/historialpacienteDAO.php',
        type:'GET',
        dataType: 'html',
        data:{consulta:consulta}
    }).done(function(respuesta){
        $("#datosHistorial").html(respuesta);
    }).fail(function(){
        console.log("error");
    })
}


$('#history').click(function(){
    var inicio = $('#caja_busqueda').val();
    if(inicio != ""){
        buscar(inicio);
    }else{
        buscar();
    }

});
