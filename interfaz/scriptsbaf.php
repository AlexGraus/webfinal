<script >
  function mostrar(){
    document.getElementById("probando").style.display="block";
  }
  function ocultar(){
    document.getElementById("probando").style.display="none";
  }

function aplicar_referencia(){
  var caja=document.getElementById("probando");
  if (caja.style.display=="none") {
    mostrar();
    document.getElementById("btn").value="NO";
  }
  else {
    ocultar();
    document.getElementById("btn").value="SI";
  }
}
  function myFunction() {
      var x = document.getElementById("xd");
      x.value = x.value.toUpperCase();
  }

  function solonumeros(e){
       key=e.keyCode || e.which;
       teclado=String.fromCharCode(key);
       numeros="0123456789";
       especiales="8-37-38-46";
       teclado_especial=false;

    for(var i in especiales){
      if (key==especiales[i]) {
        teclado_especial=true;
      }
    }
    if (numeros.indexOf(teclado)==-1 && !teclado_especial) {
      return false;
    }

  }
</script>
