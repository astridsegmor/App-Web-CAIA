//import Swal from 'sweetalert2'

function objetoAjax(){
    var xmlhttp=false;
    try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    alert('Voy 1....');
    } catch (e) {
    alert('Voy e....');
    try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    alert('Voy 2.....');
    } catch (E) {
    xmlhttp = false;
    }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
      }
      alert('Saliendo de ObjetoAjax....');
      return xmlhttp;
}

function eliminarBenef(idbenef){
   //function eliminarBenef(){
      //donde se mostrará el resultado de la eliminacion
      //divResultado = document.getElementById('resultado');
      //usaremos un cuadro de confirmacion
      //var idB="idbenef="+idbenef;
      var idB = idbenef;
      var eliminar = confirm("Seguro de excluir a este Beneficiario ?"+idB );
      //var elimi = 
      //Swal.fire("Seguro de excluir a este Beneficiario ?"+idB );
      if ( eliminar ) {
      //instanciamos el objetoAjax
         //alert('Voy a eliminar...'+idbenef);
         $.ajax({
            type:"PUT",
            url:"../public/eliminaBenef",
            //url: "{{ route('eliminaBenef') }}",
            data: {idbenef:idB},
            success:function(r) {
               alert('Sali de eliminar...');
            }	
         });
      /*ajax=objetoAjax();
      //uso del medotod GET
      //indicamos el archivo que realizará el proceso de eliminación
      //junto con un valor que representa el id del beneficiario
      ajax.open("GET", "../../CaiaIpasme/public/eliminaBenef.php?idbenef="+idbenef);
      alert('Sali de eliminar...');
      ajax.onreadystatechange=function() {
      if (ajax.readyState==4) {
      //mostrar resultados en esta capa
      alert('Mostrar resultado...');
      divResultado.innerHTML = ajax.responseText*/
      }
      }
      //como hacemos uso del metodo GET
      //colocamos null
      //ajax.send(null)*/
      //}
   //}
   
