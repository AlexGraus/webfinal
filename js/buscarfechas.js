$(buscar());

function buscar(consulta,consulta2,consulta3){
    $.ajax({
        url: '../persistencia/reportesDAO.php',
        type:'GET',
        dataType: 'html',
        data:{consulta:consulta,consulta2:consulta2,consulta3:consulta3}
    }).done(function(respuesta){
        $("#buscandoCodigo").html(respuesta);
    }).fail(function(){
        console.log("error");
    })
}


$('#search').click(function(){
    var tipo = $('#tiporeporte').val();
    var inicio = $('#caja_busqueda').val();
    var fin = $('#caja_busqueda2').val();
    if(inicio != "" || fin !="" || tipo !=""){
        buscar(inicio,fin,tipo);
    }else{
        buscar();
    }

});
