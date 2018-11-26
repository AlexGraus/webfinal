$(buscar());

function buscar(consulta,consulta2){
    $.ajax({
        url: '../persistencia/reportesDAO.php',
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
    var inicio = $('#caja_busqueda').val();
    var fin = $('#caja_busqueda2').val();
    if(inicio != "" && fin !=""){
        buscar(inicio,fin);
    }else{
        buscar();
    }

});
