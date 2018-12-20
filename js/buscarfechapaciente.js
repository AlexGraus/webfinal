$(buscar());

function buscar(consulta,consulta2){
    $.ajax({
        url: '../persistencia/examenfecha_mamografia.php',
        type:'GET',
        dataType: 'html',
        data:{consulta:consulta,consulta2:consulta2}
    }).done(function(respuesta){
        $("#buscandoCodigo").html(respuesta);
    }).fail(function(){
        console.log("error");
    })
}


$('#search').click(function(){
    var dni = $('#caja_busqueda').val();
    var annio = $('#annio').val();
    if(dni != "" || annio !=0){
        buscar(dni,annio);
    }else{
        buscar();
    }

});